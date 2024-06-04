<?php 
include "../db.php";
session_start();
$user_id = $_SESSION['user_info_id'];

if(isset($_GET['delete_item'])){
    $item_id = $_GET['delete_item'];
    $sql_delete_item = "DELETE FROM `cart` WHERE `cart_id` = '$item_id'";
    mysqli_query($conn, $sql_delete_item);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShopFootas</title>
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
            <li><a href="profile.php" style="color: white; margin-left: 200px; margin-top: 30px;font-size: 40px">Profile</a></li>
        </ul>
    </nav>  

<h2 style="font-size: 70px">Shopping Cart</h2>  
<div class="col-md-8">  
    <?php 
    $sql_get_cart = "SELECT * FROM cart
                    INNER JOIN product_design
                    ON cart.prdct_dsgn_id = product_design.prdct_dsgn_id
                    WHERE cart.user_info_id = $user_id";
    $cartresult = mysqli_query($conn, $sql_get_cart);
    ?>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($cartresult)) {
                    ?>
                    <tr>
                        <td> <img src="../product_pictures/<?php echo $row['item_photo']; ?>" alt="" class="img-fluid" width="100px"> </td>
                        <td><?php echo $row['item_name']; ?></td>
                        <td><?php echo "Php " . number_format($row['item_price'], 2); ?></td>
                        <td><a href="cart.php?delete_item=<?php echo $row['cart_id']; ?>" class="btn btn-danger">Delete</a> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <form action="order-form.php" method="get">
        <input type="hidden" name="checkout" value="<?php echo $user_id; ?>">
        <button class="btn btn-button" style="margin-left: 500px; width: 200px; height: 50px; color: white; background-color: #146361;">Checkout</button>
    </form>
</div>
</body>
</html>
