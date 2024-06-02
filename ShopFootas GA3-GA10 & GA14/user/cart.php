<!DOCTYPE html><?php include "../db.php";?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShopFootas</title>
  <!-- <link rel="stylesheet" href="visitor_page.css"> -->
  <link rel="stylesheet" href="cart.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
   <nav class="navbar navbar-custom" style="background-color: #136461; min-width: 1366px">
        <nav class="navbar-header">
            <a href="client_homepage.php"><p style="margin-left: 40px; font-size: 70px; color: white;">ShopFootas</p></a>
        </nav>
        <ul class="nav navbar-nav">
            <li><a href="cart.php" style="color: white; margin-left: 700px; margin-top: 30px; font-size: 40px;">Cart</a></li>
        </ul>
        <ul class="nav navbar-nav">
            <li><a href="" style="color: white; margin-left: 200px; margin-top: 30px;font-size: 40px">Profile</a></li>
        </ul>
    </nav>  
<center>
<div class="col-md-4">
  <div class="container">
    <h2 style="font-size: 70px">Shopping Cart</h2>
   <?php
    if(isset($_GET['cart']))
        {
            $item_id = $_GET['cart'];
            
            $sql_get_item_info = "SELECT * FROM `product_design`
                                    WHERE prdct_dsgn_id = '$item_id'";
            $result = mysqli_query($conn, $sql_get_item_info);
            $data_row = mysqli_fetch_assoc($result);
            $asize = array();
            $asize[] = "0";
            
            $sql_get_sizes = "SELECT * FROM product 
            inner JOIN product_sizes 
            ON product.sizes_id = product_sizes.sizes_id where product.prdct_dsgn_id = '$item_id'";
            $sizeresult = mysqli_query($conn, $sql_get_sizes);
            while( $sizerow = mysqli_fetch_assoc( $sizeresult ) ) {
                $asize[] = $sizerow['size_name'];
            } ?>
            <?php
        while ( $row = mysqli_fetch_assoc($get_result) ){ 
            $asize = array();
            $asize[] = "0";
            $strsize = "";
            $prodctid = $row['prdct_dsgn_id'];
            $pi=$row['product_id']; 
            $sql_get_sizes = "SELECT * FROM product 
            inner JOIN product_sizes 
            ON product.sizes_id = product_sizes.sizes_id where product.prdct_dsgn_id = $prodctid";
            $sizeresult = mysqli_query($conn, $sql_get_sizes);
            while( $sizerow = mysqli_fetch_assoc( $sizeresult ) ) {
                $strsize = $strsize . $sizerow['size_name'] . "<br>";
                $asize[]= $sizerow['size_name'];
            }
        $sql_cart = "INSERT INTO `cart`(`product_id`) VALUES ('$pi')";
        if($conn->query($sql_cart)===TRUE){
            header("location:client_homepage.php?cart_insert=1");
        }
        $show_cart = "SELECT * FROM cart ORDER BY cart_id DESC";
        $conn->query($show_cart);
    ?>
        <tr>
            <td> <img src="../product_pictures/<?php echo $row['item_photo'];?>" alt="" class="img-fluid" width="100px"> </td>
            <td><?php echo $row['item_name'];?></td>
            <td><?php echo $row['item_description'];?></td>
            <td><?php echo "Php " . number_format($row['item_price'],2);?></td>
            <td><?php echo $row['item_qty'];?></td>
            <td><?php echo $row['item_color'];?></td>
            <td><?php echo $row['item_type'];?></td>
            <td><?php echo $row['item_brand'];?></td>
            <td><?php echo $strsize;
                                    ?></td>
                        

            <td> <a href="admin_items.php?update_item=<?php echo $row['prdct_dsgn_id'];?>" class="btn btn-success">Update</a>
            <a href="admin_items.php?delete_item=<?php echo $row['prdct_dsgn_id'];?>" class="btn btn-danger">Delete</a> </td>
        </tr>     
        <?php }}
    ?>

    </div>
    <a href="orders.php">
        <button class="btn btn-button"style="margin-left: 500px; width: 200px; height: 50px; color: white; background-color: #146361;">Checkout</button>
    </a>
    </div>
    </div>
    </center>
 
      
    
</body>
</html>