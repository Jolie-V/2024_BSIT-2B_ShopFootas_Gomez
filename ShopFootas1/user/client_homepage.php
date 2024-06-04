<!DOCTYPE html><?php include "../db.php";
session_start();
$user_id = $_SESSION['user_info_id'];
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShopFootas</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="client_homepage.css">
</head>
<body>
    <nav class="navbar navbar-custom" style="background-color: #136461; min-width: 1366px">
        <nav class="navbar-header">
          <a href="client_homepage.php"><p style="margin-left: 40px; font-size: 70px; color: white;">ShopFootas</p></a>
        </nav>
        <ul>
        <form action="search.php" method="GET" style="margin-top:35px; margin-left: 20px">
              <input type="text" name="q" placeholder="Search products..." style="width:500px; height:40px;">
              <button name="items" type="submit" class="btn btn-success" style="background-color:blue; width: 200px">Search in Inventory</button>
              <button name="orders" type="submit" class="btn btn-success" style="background-color:blue; width: 200px">Search in orders</button>
          </form>
        </ul>
        <ul class="nav navbar-nav">
            <li><a href="cart.php" style="color: white; margin-left: 900px; margin-top: -800x; font-size: 40px;">Cart</a></li>
        </ul>
        <ul class="nav navbar-nav">
            <li><a href="profile.php" style="color: white; margin-left: 0px; margin-top: -800x;font-size: 40px">Profile</a></li>
        </ul>
    </nav>
    <div class="container-fluid">
    
      <div class="mySlides fade">
        <img src="../banner/SHOE BANNER 1.png" style="width:100%">
      </div>

      <div class="mySlides fade">
        <img src="../banner/SHOE BANNER 2.png" style="width:100%">
      </div>

      <div class="mySlides fade">
        <img src="../banner/SHOE BANNER 3.png" style="width:100%">
      </div> 

      <div class="mySlides fade">
        <img src="../banner/SHOE BANNER 4.png" style="width:100%">
      </div>

      <div class="mySlides fade">
        <img src="../banner/SHOE BANNER 5.png" style="width:100%">
      </div>

      <div class="mySlides fade">
        <img src="../banner/SHOE BANNER 6.png" style="width:100%">
      </div>

      <div class="mySlides fade">
        <img src="../banner/SHOE BANNER 7.png" style="width:100%">
      </div>

      <div class="mySlides fade">
        <img src="../banner/SHOE BANNER 8.png" style="width:100%">
      </div>

      <div class="mySlides fade">
        <img src="../banner/SHOE BANNER 9.png" style="width:100%">
      </div>

      <div class="mySlides fade">
        <img src="../banner/SHOE BANNER 10.png" style="width:100%">
    </div>

    </div>
    <br>

    <div style="text-align:center">
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
    </div>

    <script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
    </script>
</body>
</html>

<?php 
include "../db.php";
if(isset($_GET['add_to_cart'])){
    $item_id = $_GET['add_to_cart'];
    
    $sql_cart = "INSERT INTO cart(`user_info_id`, `prdct_dsgn_id`) VALUES ('$user_id', '$item_id')";
    mysqli_query($conn, $sql_cart);
}?>
    <div style="margin-left: 350px;">
    <?php
      $sql_get_items = "SELECT * FROM `product_design` order by prdct_dsgn_id DESC";
      $get_result = mysqli_query($conn, $sql_get_items);
      
      while ( $row = mysqli_fetch_assoc($get_result) )
      {?>
        <div class="col col col col" style="display: inline-block; width: 20%; max-width: 20%;">
            <div class="card border-secondary mb-3" style="width: 300px;">
                <img src="../product_pictures/<?php echo $row['item_photo'];?>" width="250px" class="img">
                <div class="card-body" style="width: 300px;">
                <h5 class="card-title"><?php echo $row['item_name'];?></h5>
                <p class="card-text" style="color: green;">Php <?php echo $row['item_price'];?></p>
                <form action="client_homepage.php" method="get">
                    <input type="hidden" name="add_to_cart" value="<?php echo $row['prdct_dsgn_id'];?>">
                    <button type="submit" class="btn btn-success">Add to Cart</button>
                </form>
                </div>
            </div>
        </div>
      <?php }?>
    </div>
</body>
</html>