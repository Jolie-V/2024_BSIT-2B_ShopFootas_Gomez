<?php

include '../db.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<section class="contact">

   <form action="process_feedback.php" method="post">
      <h3>Send your feedback</h3>
      <input type="text" name="name" placeholder="Enter Your Name" value="<?php echo $_SESSION['user_info_fullname'] ?>"required maxlength="20" class="box">
      <input type="email" name="email" placeholder="Enter Your Email"  value="<?php echo $_SESSION['user_info_email'] ?>"required maxlength="50" class="box">
      <input type="tel" name="number" placeholder="Enter Your number"  value="<?php echo $_SESSION['user_info_contact_no'] ?>" required class="box">
      <textarea name="msg" class="box" placeholder="Enter Your Message" cols="30" rows="10"></textarea>
      <input type="submit" placeholder="send message" name="send" class="btn">
   </form>
</section>

<script src="js/script.js"></script>

</body>
</html>