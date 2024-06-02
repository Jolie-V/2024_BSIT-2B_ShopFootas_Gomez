<html>
    <?php include '../db.php';
    session_start();
    
    $user_id=$_SESSION['user_info_id'];?>
<head>
<link rel="stylesheet" href="order-form.css">
<div class="container">
    <div class="title">
        <h2>Product Order Form</h2>
    </div>
</head>
<body>
  <?php
  if(isset($_GET['order'])){
    $order_id=$_GET['order'];
        $sql_delete_cart = "DELETE FROM `cart`"; 
        mysqli_query($conn, $sql_delete_cart);
    }
?>
  <div class="d-flex">
    <form action="" method="">
      <label>
        <span class="fname">Full Name <span class="required">*</span></span>
        <input type="text" name="fname" placeholder="Enter full name" value="<?php echo $_SESSION['user_info_fullname'];?>">
      </label>
      <label>
        <span>Address <span class="required">*</span></span>
        <input type="text" name="address" placeholder="Enter full address " value="<?php echo $_SESSION['user_info_address'];?>" required>
      </label>
      <label>
        <span>Phone <span class="required">*</span></span>
        <input type="tel" name="contact" placeholder="Enter contact number" value="<?php echo $_SESSION['user_info_contact_no'];?>"> 
      </label>
      <label>
        <span>Email Address <span class="required">*</span></span>
        <input type="email" name="email" placeholder="Enter e-mail" value="<?php echo $_SESSION['user_info_email'];?>"> 
      </label>
      <label>
        <span>Scan to pay</span>
      </label>
      <img src="gcash.jpg" alt="" class="center" width="400">
    </form>

    <div class="Yorder">
      <table>
        <tr>
          <th colspan="2">Your order</th>
        </tr>
        <?php  
        $total = 0;
        $sql_order= "SELECT * FROM cart 
        inner JOIN product_design
        ON cart.prdct_dsgn_id = product_design.prdct_dsgn_id";
        $orderresult = mysqli_query($conn, $sql_order);      

      while ( $row = mysqli_fetch_assoc($orderresult)){ ?>
        <tr>
          <td><img src="../product_pictures/<?php echo $row['item_photo'];?>" width="40px"></td>
          <td><?php echo $row['item_name'];?></td>
          <td>Php <?php echo $row['item_price'];?></td>
        </tr>
        <?php 
        $total = $total + $row['item_price']; } ?>
        <tr>
          <td>Subtotal</td>
          <td>Php <?php echo $total ?>.00</td>
        </tr>
        <tr>
          <td>Shipping</td>
          <td>Free shipping</td>
        </tr>
      </table><br>
     
      <form action="order-form.php" method="get">
        <input type="hidden" name="order" value="<?php echo $row['order_id'];?>">
        <a href="client_homepage.php">
        <button type="submit">Place Order</button></a>
    </form>
      
    </div>
   </div>
  </div>
</body>
</html>