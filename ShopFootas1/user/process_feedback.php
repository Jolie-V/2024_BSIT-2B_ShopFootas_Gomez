<?php
include '../db.php';
session_start();

if(isset($_POST['send'])){

    $user_id = $_SESSION['user_info_id'];
    $msg = mysqli_real_escape_string($conn, $_POST['msg']); // Sanitize input

    $sql = "INSERT INTO `feedback` (user_info_id, com_ment) VALUES ('$user_id', '$msg')"; // Fixed SQL syntax
    if(mysqli_query($conn, $sql)){
       header("Location: feedback.php?feedback_inserted"); // Fixed typo in location
       exit; // It's a good practice to exit after redirecting
    } else {
       echo "Error: " . mysqli_error($conn); // Print error message for debugging
    }
}
?>
