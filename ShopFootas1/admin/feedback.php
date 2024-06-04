<?php
include '../db.php';

session_start();

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];

   $delete_message = "DELETE FROM `feedback` WHERE feedback_id = ?";
   $stmt = $conn->prepare($delete_message);
   $stmt->bind_param("i", $delete_id);
   $stmt->execute();

   header('location:feedback.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>messages</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<section class="contacts">

<h1 class="heading">Feedbacks</h1>

<div class="box-container">

   <?php
      $select_messages = $conn->prepare("SELECT * FROM `feedback`");
      $stmt = $conn->prepare("SELECT * FROM feedback");
      $stmt->execute();
      $result = $stmt->get_result();
      if($result->num_rows > 0){
         while($fetch_message = $result->fetch_assoc()){
   ?>
   <div class="box">
   <p> User id : <span><?= $fetch_message['user_info_id']; ?></span></p>
   <p> Message : <span><?= $fetch_message['com_ment']; ?></span></p>
   <form action="feedback.php" method="get">
        <input type="hidden" name="delete" value="<?= $fetch_message['feedback_id'];?>">
        <button type="submit" class="btn btn-button">delete</button>
    </form>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">you have no messages</p>';
      }
   ?>

</div>

</section>

<script src="../js/admin_script.js"></script>
   
</body>
</html>
