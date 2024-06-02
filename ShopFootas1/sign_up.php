<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign-up|ShopFootas</title>
   <link rel="stylesheet" href="sign_up.css">
</head>
<body>
    <div class="signup">
        <div class="container" overflow: auto;>
            <div class="content-right">
                <form action="process_signup.php" method="POST">
                    <h1>ShopFootas</h1>
                    <div class="content-right">
                        <div class="input-group">
                        <input name="r_fullname" type="text" placeholder="Full name" required>
                    </div>
            
                    <div class="form-group">
                        <input name="r_username" type="text" placeholder="Username" required>
                    </div>
            
                    <div class="form-group">
                        <input name="r_password" type="password" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <input name="r_conf_password" type="password" placeholder="Confirm Password" required>
                    </div>
            
                    <div class="form-group">
                        <input name="r_email" type="text" placeholder="Email" required>
                    </div>
            
                    <div class="form-group">
                        <input name="r_contact" type="text" placeholder="Contact number" required>
                    </div>
            
                    <div class="form-group">
                        <input name="r_address" type="text" placeholder="Address" required>
                    </div>
            
                    <label>Birthdate:</label><br>
                    <input name="r_birthday" type="date" id="Date of Birth" required><br>
                   
                    <div class="btn">
                        <a href="sign_up.php" class="btn">
                         <button class="button">Signup</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</body>