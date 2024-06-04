<?php
include '../db.php';

$user_id = $_SESSION['user_info_id'];?>

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
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<section class="orders">

   <h1 class="heading">All Orders</h1>

   <div class="box-container"> 

<?php
$ref_sql = "SELECT orders.order_ref, orders.date_added, user_info.full_name, user_info.e_mail, user_info.contact_no, user_info.add_ress, orders.order_phase
            FROM orders
            INNER JOIN user_info ON orders.user_info_id = user_info.user_info_id
            WHERE orders.user_info_id = '$user_id'
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
            $total_price += $order_row['item_price']; // Assuming product price column name is 'product_price'
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
            <p>Order Status: <span style="color:<?php if($row['order_phase'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $row['order_phase']; ?></span></p>
        </div>
        <?php
    }
}else{
    echo '<p class="empty">No orders yet!</p>';
 }
?>
</body>
</html>
