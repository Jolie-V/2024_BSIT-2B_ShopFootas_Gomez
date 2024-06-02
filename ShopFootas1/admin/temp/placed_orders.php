<?php

include '../components/connect.php';

if(isset ($_POST['update_order'])){
   $order_id = $_POST['order_id'];
   $order_status = $_POST['order_phase'];
   $order_status = filter_var($order_status, FILTER_SANITIZE_STRING);
   $update_payment = $conn->prepare("UPDATE `orders` SET order_phase = ? WHERE id = ?");
   $update_payment->execute([$order_phase, $order_id]);
   $message[] = 'Order status updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_order = $conn->prepare("DELETE FROM `order` WHERE id = ?");
   $delete_order->execute([$delete_id]);
   header('location:placed_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Placed Orders</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>


<section class="orders">

<h1 class="heading">Placed Orders</h1>

<div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `order`");
      $select_orders->execute();
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> Date added : <span><?= $fetch_orders['date_added']; ?></span> </p>
      <p> Full Name : <span><?= $fetch_orders['full_name']; ?></span> </p>
      <p> Address : <span><?= $fetch_orders['add_ress']; ?></span> </p>
      <p> Number : <span><?= $fetch_orders['contact_no']; ?></span> </p>
      <p>Total Products: <span><?= $fetch_orders['order_placed']; ?></span></p>
      <p>Total Price: <span>₱<?= number_format($fetch_orders['total_amt'], 2); ?></span></p>
      <p> Payment: <span><?= $fetch_orders['pay_id']; ?></span>GCash</p>
      <form action="" method="post">
         <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
         <select name="order_phase" class="select">
            <option selected disabled><?= $fetch_orders['order_phase']; ?></option>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
           
         </select>
        <div class="flex-btn">
         <input type="submit" value="update" class="option-btn" name="update_order">
         <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">Delete</a>
        </div>
      </form>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">No orders placed yet!</p>';
      }
   ?>

</div>

</section>

</section>

<script src="../js/admin_script.js"></script>
   
</body>
</html>