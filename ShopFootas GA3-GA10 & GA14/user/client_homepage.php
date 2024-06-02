<!DOCTYPE html><?php include "../db.php";?>
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
        <ul class="nav navbar-nav">
            <li><a href="cart.php" style="color: white; margin-left: 700px; margin-top: 30px; font-size: 40px;">Cart</a></li>
        </ul>
        <ul class="nav navbar-nav">
            <li><a href="" style="color: white; margin-left: 200px; margin-top: 30px;font-size: 40px">Profile</a></li>
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
<div action="cart.php" method="GET">
<div style="margin-left: 350px;">
<?php
  $sql_get_items = "SELECT * FROM `product_design` order by prdct_dsgn_id DESC";
  $get_result = mysqli_query($conn, $sql_get_items);
  
  while ( $row = mysqli_fetch_assoc($get_result) )
  {?>
    <div class="col col col col" action="cart.php" method="get" style="display: inline-block; width: 20%; max-width: 20%;">
        <div class="card border-secondary mb-3" style="width: 300;">
            <img src="../product_pictures/<?php echo $row['item_photo'];?>" width="250px" class="img">
            <div class="card-body" style="width: 300px;">
            <h5 class="card-title"><?php echo $row['item_name'];?></h5>
            <p class="card-text" style="color: green;">Php <?php echo $row['item_price'];?></p>
            <button type="submit" name="cart" class="btn btn-primary">Add to Cart</button>
            </div>
        </div>
    </div>
  <?php }?>
  </div>
  <?php
  $sql_get_items = "SELECT * FROM `product_design` WHERE `prdct_dsgn_id` = '$item_id'";
                $get__result = mysqli_query($conn, $sql_get_items);?>
            
              <div id="productPopup" class="popup active">
              <span class="close" onclick="closePopup()">&times;</span>
              <img src="../product_pictures/<?php echo $row['item_photo'];?>" width="250px" class="img">
              <h2><?php echo $row['item_name'];?></h2>
              <p><?php echo $row['item_description'];?></p>
              <p>Price: $10.00</p>
              <button>Add to Cart</button>
              </div>
              <?php  ?>
</div>

</body>
</html>

<script>
function openPopup() {
    document.getElementById("productPopup").style.display = "block";
}

function closePopup() {
    document.getElementById("productPopup").style.display = "none";
}
</script>