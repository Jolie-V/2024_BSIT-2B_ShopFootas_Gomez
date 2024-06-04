<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Data</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="../css/bootstrap.css">

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
<?php include '../db.php';
session_start();
if(isset($_GET['logout'])){
   session_destroy();
}

include 'user_profile.php';
?>


<form action="feedback.php" method="get">
        <input type="hidden" name="feedback">
        <button class="btn btn-success">Feedback</button>
    </form> 

    <form action="../login.php" method="get">
        <input type="hidden" name="logout">
        <button class="btn btn-danger">Log out</button>
    </form>
    
<?php
include 'display_orders.php';
?>

    

</body>
</html>
