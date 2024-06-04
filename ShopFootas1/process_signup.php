<?php
include_once "db.php";

$uname =  $_POST['r_username'];
$full_name = $_POST['r_fullname'];
$email = $_POST['r_email'];
$passwd = $_POST['r_password'];
$conf_passwd = $_POST['r_conf_password'];
$address =  $_POST['r_address'];
$contact = $_POST['r_contact'];
$date = $_POST['r_birthday'];

  function chk_pass($p1, $p2) {
    return ($p1 == $p2) ? 1:0;
  }
   
      if(!chk_pass($passwd, $conf_passwd)){
          header("location: sign_up.php?error=password_mismatch");
          die;
      }
  
  //This will check if the username is already existing
  $sql_chk_user = "SELECT user_info_id FROM user_info
                    WHERE `user_name` = '$uname'";
  //this will execute the SQL above.
  $sql_result = mysqli_query($conn, $sql_chk_user);
  //This will count the result of the above SQL
  $count_result = mysqli_num_rows($sql_result);
  
  if($count_result > 0){
      //user already exists
      header("location: sign_up.php?error=user_already_exist");
  }
  else {
      //user can register
      $sql_new_user = "INSERT INTO user_info (full_name, user_name, pass_word, e_mail, contact_no, add_ress, birth_day)
                        VALUES ('$full_name', '$uname', '$passwd', '$email','$contact', '$address', '$date')";
      $execute_query = mysqli_query($conn,$sql_new_user);
      
      if(!$execute_query){
         header("location: sign_up.php?error=Insert_Failed");
      }
      else{
         header("location: login.php?msg=successfully_registered");
      }
      
  }
                        ?>