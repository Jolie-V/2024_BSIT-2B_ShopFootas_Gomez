<?php

include '../db.php';

$user_id = $_SESSION['user_info_id'];

// Ensure the database connection is established
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

try {

$select_profile = $conn->prepare("SELECT * FROM `user_info` WHERE user_info_id = ?");

    // Bind the parameter
    $select_profile->bind_param("i", $user_id);

    // Execute the statement
    $select_profile->execute();

    // Get the result
    $result = $select_profile->get_result();

    // Fetch the result
    if ($fetch_profile = $result->fetch_assoc()) {
        // Use $fetch_profile as needed
        // For example, print the user profile information
    } else {
        echo "Profile not found.";
    }

    // Close the statement
    $select_profile->close();
} catch (mysqli_sql_exception $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Profile</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>


<section class="profile-container">
   <div class="profile-box">
      <h2>User Profile</h2>
      <div class="profile-details">
         <p><strong>User ID:</strong> <?= $fetch_profile['user_info_id']; ?></p>
         <p><strong>Name:</strong> <?= $fetch_profile['full_name']; ?></p>
         <p><strong>Email:</strong> <?= $fetch_profile['e_mail']; ?></p>
         <!-- Add more user details here if needed -->
      </div>
   </div>
</section>

</body>
</html>
