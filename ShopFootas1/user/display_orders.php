<?php

include '../db.php';

$user_id = $_SESSION['user_info_id'];

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
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<section class="orders">

   <h1 class="heading">All Orders</h1>

   <div class="box-container">

   <?php
      if($user_id == ''){
         echo '<p class="empty">please login to see your orders</p>';
      }else{
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_info_id = ?");
         $select_orders->execute();
         if($select_orders->num_rows() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p>Placed on : <span><?= $fetch_orders['placed_on']; ?></span></p>
      <p>Full Name : <span><?= $fetch_orders['full_name']; ?></span></p>
      <p>Email : <span><?= $fetch_orders['e_mail']; ?></span></p>
      <p>Number : <span><?= $fetch_orders['contact_no']; ?></span></p>
      <p>Address : <span><?= $fetch_orders['add_ress']; ?></span></p>
      <p>Payment : <span><?= $fetch_orders['payment']; ?></span>GCash</p>
      <p>Your Orders : <span><?= $fetch_orders['total_products']; ?></span></p>
      <p>Total Price : <span>₱<?= $fetch_orders['total_price']; ?></span></p>
      <p> Order Status : <span style="color:<?php if($fetch_orders['order_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['order_status']; ?></span> </p>
   </div>
   <?php
      }
      }else{
         echo '<p class="empty">No orders yet!</p>';
      }
      }
   ?>

   </div>

</section>


<script src="js/script.js"></script>

</body>
</html>