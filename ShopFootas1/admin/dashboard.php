<?php
include '../db.php';

$total_pendings = 0;
$select_pendings = "SELECT * FROM `orders` WHERE order_phase = 'pending'";
$result_pendings = mysqli_query($conn, $select_pendings);
if ($result_pendings) {
    while ($fetch_pendings = mysqli_fetch_assoc($result_pendings)) {
        if (isset($fetch_pendings['total_amt'])) {
            $total_pendings += $fetch_pendings['total_amt'];
        }
    }
} else {
    // Handle the error
    echo "Error executing query: " . mysqli_error($conn);
}

$total_completes = 0;
$select_completes = "SELECT * FROM `orders` WHERE order_phase = 'pending'"; // Assuming 5 is the ID for 'delivered'
$result_completes = mysqli_query($conn, $select_completes);
if ($result_completes) {
    while ($fetch_completes = mysqli_fetch_assoc($result_completes)) {
        $total_completes += $fetch_completes['total_amt'];
    }
} else {
    // Handle the error
    echo "Error executing query: " . mysqli_error($conn);
}

$select_orders = "SELECT * FROM `orders`";
$result_orders = mysqli_query($conn, $select_orders);
$number_of_orders = mysqli_num_rows($result_orders);

$select_products = "SELECT * FROM `product_design`";
$result_products = mysqli_query($conn, $select_products);
$number_of_products = mysqli_num_rows($result_products);

$select_feedback = "SELECT * FROM `feedback`";
$result_feedback = mysqli_query($conn, $select_feedback);
$number_of_feedback = mysqli_num_rows($result_feedback);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Dashboard</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>


<section class="dashboard">

   <h1 class="heading">Admin Dashboard</h1>

   <div class="box-container">
    
        <div class="box">
            <h3><span>₱</span><?= number_format($total_pendings, 2); ?><span></span></h3>
            <p>Total Amount of pending orders</p>
        </div>
    </div>

    <div class="box-container">
        <div class="box">
            <h3><span>₱</span><?= number_format($total_completes, 2); ?><span></span></h3>
            <p>Total Sales</p>
        </div>
    </div>
</div>

<div class="box-container">
    
        <div class="box">
            <h3><?= $number_of_orders; ?></h3>
            <p>Orders Placed</p>
            <a href="placed_orders.php" class="btn">View Orders</a>
        </div>
    </div>

    <div class="box-container">
        <div class="box">
            <h3><?= $number_of_products; ?></h3>
            <p>Products Added</p>
            <a href="admin_items.php" class="btn">View Products</a>
        </div>
    </div>

    <div class="box-container">
        <div class="box">
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
