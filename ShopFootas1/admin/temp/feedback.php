<?php

include '../components/connect.php';


if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_message = $conn->prepare("DELETE FROM `feedback` WHERE id = ?");
   $delete_message->execute([$delete_id]);
   header('location: feedback.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Feedback</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>



<section class="contacts">

<h1 class="heading">Feedback</h1>

<div class="box-container">

   <?php
      $select_feedback = $conn->prepare("SELECT * FROM `feedback`");
      $select_feedback->execute();
      if($select_feedback->rowCount() > 0){
         while($fetch_message = $select_feedback->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
   <p> User id : <span><?= $fetch_message['user_id']; ?></span></p>
   <p> Full Name : <span><?= $fetch_message['full_name']; ?></span></p>
   <p> Username : <span><?= $fetch_message['user_name']; ?></span></p>
   <p> Contact Number : <span><?= $fetch_message['contact_no']; ?></span></p>
   <p> Feedback : <span><?= $fetch_message['com_ment']; ?></span></p>
   <a href="feedback.php?delete=<?= $fetch_message['id']; ?>" onclick="return confirm('Are you sure you want to delete this message?');" class="delete-btn">Delete</a>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">No feedback!</p>';
      }
   ?>

</div>

</section>

<script src="../js/admin_script.js"></script>
   
</body>
</html>