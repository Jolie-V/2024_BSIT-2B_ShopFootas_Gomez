<?php
include '../db.php';

// Function to sanitize input
function sanitize($data) {
   return filter_var($data, FILTER_SANITIZE_STRING);
}

if(isset($_POST['delete'])){
   $delete_id = $_POST['order_id']; // Corrected to use $_POST instead of $_GET
   $order_ref = $_POST['order_ref']; // Retrieve order_ref
   
   // Prepare delete query
   $delete_order = $conn->prepare("DELETE FROM `orders` WHERE order_ref = ?");
   if (!$delete_order) {
       die('Error preparing delete query: ' . $conn->error);
   }
   
   // Bind parameters and execute query
   $delete_order->bind_param("s", $order_ref);
   $result = $delete_order->execute();
   if ($result) {
       header('Location: placed_orders.php?order_deleted');
       exit(); // Ensure no further code execution after redirect
   } else {
       die('Error executing delete query: ' . $delete_order->error);
   }
}

// Check if update_order form is submitted
if(isset($_POST['update'])){
   $order_id = $_POST['order_id'];
   $order_status = sanitize($_POST['order_status']);
   $order_ref = $_POST['order_ref']; // Retrieve order_ref
   
   // Prepare update query
   $update_order = $conn->prepare("UPDATE `orders` SET order_phase = ? WHERE order_ref = ?");
   if (!$update_order) {
       die('Error preparing update query: ' . $conn->error);
   }
   
   // Bind parameters and execute query
   $update_order->bind_param("ss", $order_status, $order_ref);
   $result = $update_order->execute();
   if (!$result) {
       die('Error executing update query: ' . $update_order->error);
   } else {
       $message = 'Order status updated!';
   }
   
   // Close statement
   $update_order->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Orders</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<div class="box">
    <form action="dashboard.php" method="get">
        <input type="hidden" name="database">
        <button class="btn">Back</button>
    </form> 
</div>

<section class="orders">

    <h1 class="heading">Placed Orders</h1>

    <div class="box-container">

    <?php
    $ref_sql = "SELECT orders.order_id, orders.order_ref, orders.date_added, user_info.full_name, user_info.e_mail, user_info.contact_no, user_info.add_ress, orders.order_phase
                FROM orders
                INNER JOIN user_info ON orders.user_info_id = user_info.user_info_id
                GROUP BY orders.order_ref";

    $ref_sql_result = mysqli_query($conn, $ref_sql);

    if(mysqli_num_rows($ref_sql_result) > 0){
        while($row = mysqli_fetch_assoc($ref_sql_result)){
            $order_ref = $row['order_ref'];

            // Fetch individual order details
            $order_sql = "SELECT * FROM orders
                            INNER JOIN product_design ON orders.prdct_dsgn_id = product_design.prdct_dsgn_id
                            WHERE orders.order_ref = '$order_ref'";

            $order_result = mysqli_query($conn, $order_sql);

            // Calculate total products and total price
            $total_products = mysqli_num_rows($order_result);

            $total_price = 0;
            while($order_row = mysqli_fetch_assoc($order_result)){
                $total_price += $order_row['item_price']; // Assuming product price column name is 'item_price'
            }
            ?>
            <div class="box">
                <p>Order Reference No: <span><?= $row['order_ref']; ?></span></p>
                <p>Placed on: <span><?= $row['date_added']; ?></span></p>
                <p>Full Name: <span><?= $row['full_name']; ?></span></p>
                <p>Email: <span><?= $row['e_mail']; ?></span></p>
                <p>Number: <span><?= $row['contact_no']; ?></span></p>
                <p>Address: <span><?= $row['add_ress']; ?></span></p>
                <p>Payment: GCash</p>
                <p>Your Orders: <span><?= $total_products; ?></span></p>
                <p>Total Price: <span>₱<?= $total_price ?></span></p>
                <form action="" method="post">
                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>"/>
                    <input type="hidden" name="order_ref" value="<?php echo $row['order_ref']; ?>"/> <!-- Include order_ref -->
                    <select name="order_status" class="select">
                        <option selected disabled><?php echo $row['order_phase']; ?></option>
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                    </select>
                    <div class="flex-btn">
                        <button name="update" type="submit" class="option-btn">Update</button>
                    </div>
                    <div class="flex-btn">
                        <button name="delete" type="submit" class="delete-btn" onclick="return confirm('Delete this order?');">Delete</button>
                    </div>
                </form>
            </div>
            <?php
        }
    } else {
        echo '<p class="empty">No orders yet!</p>';
    }
    ?>
    </div>
</section>

<script src="../js/admin_script.js"></script>

</body>
</html>
