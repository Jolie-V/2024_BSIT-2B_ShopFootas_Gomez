<!DOCTYPE html>
<?php include "db.php";
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShopFootas</title>
  <link rel="stylesheet" href="visitor_homepage.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
</head>
<body>
    <header>
      <nav class="navbar">
        <div class="nav-logo">
          <h1>ShopFootas</h1>
        </div>

           <div class="btn">
            <a href="login.php" class="btn">
              <button class="button">Login</button>
            </a>
           </div>

           <div class="btn">
             <a href="sign_up.php" class="btn">
               <button class="button">Signup</button>
             </a>
           </div>
          </div>
      </nav>
    </header>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}


@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
</head>
<body>

  <center>
   
<div class="container-fluid">

<div class="mySlides fade">
  <img src="banner/SHOE BANNER 1.png" style="width:100%">  
</div>

<div class="mySlides fade">
  <img src="banner/SHOE BANNER 2.png" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="banner/SHOE BANNER 3.png" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="banner/SHOE BANNER 4.png" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="banner/SHOE BANNER 5.png" style="width:100%">
</div>

</div>
<br>

<div>
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

</center>
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
  setTimeout(showSlides, 2000);
}
</script>
</body>
</html> 

  <?php
  $sql_get_items = "SELECT * FROM `product_design` order by prdct_dsgn_id DESC";
  $get_result = mysqli_query($conn, $sql_get_items);
  
  while ( $row = mysqli_fetch_assoc($get_result) )
  {?>
  <div class="col-md-3 col-md-3 col-md-3 col-md-3">
    <section class="cards">
      <div class="card">
        <img src="product_pictures/<?php echo $row['item_photo'];?>" width="100px" class="img">
        <div class="card-content">
          <h2><?php echo $row['item_name'];?></h2>
          <p class="price">Php <?php echo $row['item_price'];?></p>
          <a href="login.php">
            <button class="open-popup-btn">Login to View Details</button>
          </a>
        </div>
        </div>
      </section>
    </div>
  <?php }?>
</body>
</html>
