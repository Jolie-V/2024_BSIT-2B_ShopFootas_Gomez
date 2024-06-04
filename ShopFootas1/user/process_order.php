<?php
include '../db.php';

session_start();
$user_id=$_SESSION['user_info_id'];

if(isset($_GET['order'])){
    $item_id=$_GET['order'];
    $o_ref=$_GET['ref'];
    $sql_order_= "SELECT * FROM cart 
                  inner JOIN product_design
                  ON cart.prdct_dsgn_id = product_design.prdct_dsgn_id
                  WHERE cart.user_info_id = $user_id";
    $order_result = mysqli_query($conn, $sql_order_);      

    while ( $row = mysqli_fetch_assoc($order_result)){
    $uid=$row['user_info_id'];
    $pdi=$row['prdct_dsgn_id'];
    $phase="pending";

      $sql_insert_order = "INSERT INTO `orders`(order_ref, user_info_id, prdct_dsgn_id, order_phase) VALUES ('$o_ref', '$uid', '$pdi', '$phase')";
      if($conn->query($sql_insert_order)){
        header("location:client_homepage.php?order_inserted");
      }}
    }
?>