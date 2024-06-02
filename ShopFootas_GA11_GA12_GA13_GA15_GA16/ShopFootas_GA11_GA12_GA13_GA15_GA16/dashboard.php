<?php

include '../components/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>


<section class="dashboard">

   <h1 class="heading">Admin Dashboard</h1>

   <div class="box-container">
    
        <div class="box">
            <?php
                $total_pendings = 0;
                $select_pendings = $conn->prepare("SELECT * FROM `order` WHERE order_phase = ?");
                if ($select_pendings) {
                    $select_pendings->execute([3]); // Assuming 3 is the ID for 'pending'
                    while ($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)) {
                        if (isset($fetch_pendings['total_price'])) {
                            $total_pendings += $fetch_pendings['total_price'];
                        } else {
                            // Handle the case where 'total_price' is not set
                            // This could be logging an error, setting a default value, or other appropriate action
                        }
                    }
                } else {
                    // Handle the error
                    echo "Error executing query: " . $conn->error;
                }
            ?>
            <h3><span>₱</span><?= number_format($total_pendings, 2); ?><span></span></h3>
            <p>Total Amount of pending orders</p>
        </div>
    </div>

    <div class="box-container">
        <div class="box">
            <?php
                $total_completes = 0;
                $select_completes = $conn->prepare("SELECT * FROM `order` WHERE order_phase = ?");
                if ($select_completes) {
                    $select_completes->execute([5]); // Assuming 5 is the ID for 'delivered'
                    while ($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)) {
                        $total_completes += $fetch_completes['total_price'];
                    }
                } else {
                    // Handle the error, such as displaying an error message or logging it.
                    echo "Error executing query: " . $conn->error;
                }
            ?>
            <h3><span>₱</span><?= number_format($total_completes, 2); ?><span></span></h3>
            <p>Total Sales</p>
        </div>
    </div>
</div>

<div class="box-container">
    
        <div class="box">
            <?php
            $select_orders = $conn->prepare("SELECT * FROM `order`");
            $select_orders->execute();
            $number_of_orders = $select_orders->rowCount();
            ?>
            <h3><?= $number_of_orders; ?></h3>
            <p>Orders Placed</p>
            <a href="placed_orders.php" class="btn">View Orders</a>
        </div>
    </div>

    <div class="box-container">
        <div class="box">
            <?php
            $select_products = $conn->prepare("SELECT * FROM `product_design`");
            $select_products->execute();
            $number_of_products = $select_products->rowCount();
            ?>
            <h3><?= $number_of_products; ?></h3>
            <p>Products Added</p>
            <a href="../admin/product_inventory/admin_items.php" class="btn">View Products</a>
        </div>
    </div>

    <div class="box-container">
        <div class="box">
            <?php
            $select_users = $conn->prepare("SELECT * FROM `user_info`");
            $select_users->execute();
            $number_of_users = $select_users->rowCount();
            ?>
            <h3><?= $number_of_users; ?></h3>
            <p>Users</p>
            <a href="users_accounts.php" class="btn">View Users</a>
        </div>
    </div>

    <div class="box-container">
        <div class="box">
            <?php
            $select_feedback = $conn->prepare("SELECT * FROM `feedback`");
            $select_feedback->execute();
            $number_of_feedback = $select_feedback->rowCount();
            ?>
            <h3><?= $number_of_feedback; ?></h3>
            <p>New messages</p>
            <a href="feedback.php" class="btn">See feedback</a>
        </div>
    </div>
</div>



   </div>

</section>

<script src="../js/admin_script.js"></script>
   
</body>
</html>