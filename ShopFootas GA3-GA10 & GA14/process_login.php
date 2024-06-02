<?php
include_once "db.php";
if(isset($_POST['f_username'])){
    $uname = $_POST['f_username'];
    $pword = $_POST['f_password'];
    
    $sql_check_user_info = "SELECT user_info_id
                                 , user_type
                                 , user_status
                                 , full_name
                                 , add_ress
                                 , e_mail
                                 , contact_no
                                 , birth_day
                              FROM `user_info`
                            WHERE `user_name` = '$uname'
                              AND `pass_word` = '$pword'
                            ";
    $sql_result = mysqli_query($conn,$sql_check_user_info);
    $count_result = mysqli_num_rows($sql_result);
    
    if($count_result == 1){
        //existing user
        $row = mysqli_fetch_assoc($sql_result);
        echo $row['user_type'];
        if($row['user_type'] == 'A'){
            //admin
            header("location: admin/dashboard.php");
        }
        else if($row['user_type'] == 'U'){
            //common user
            header("location: user/client_homepage.php");
        }
        else{
            header("location: login.php?error=user_not_found");
        }
    }
    else{
        //username and password does not exist
        header("location: sign_up.php?error=user_not_exist");
    }
}

?>