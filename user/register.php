<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/be994c5cbf.js" crossorigin="anonymous"></script>
    <title>ScottMovies</title>
</head>
<body class="body-register">
    <?php
    include ("../inc/navbar.php");
    ?>
 <div class="background-register">
        <div class="register-container">
          <h2 class="register"><i class="fas fa-user-plus"></i> Register</h2>
          <div class="form-group-register-container">
            <form method="POST" action="../auth/register.php" class="form-group-register">
              <label class="fname">First Name *</label>
              <input class="fname-input <?php if(isset($_GET['fName'])) { echo empty($_GET['fName']) ? 'box-error' : '';} ?>" type="text" value="<?php if(isset($_GET['fName'])) { echo !empty($_GET['fName']) ? $_GET['fName'] : '';} ?>" name="fName" placeholder="Enter your first name"/>
              <?php if(isset($_GET['fName'])) { echo empty($_GET['fName']) ? '<p class="error-msg">* Must input first name</p>' : '';} ?>
              <label class="lname">Last Name *</label>
              <input class="lname-input <?php if(isset($_GET['lName'])) { echo empty($_GET['lName']) ? 'box-error' : '';} ?>" type="text" value="<?php if(isset($_GET['lName'])) { echo !empty($_GET['lName']) ? $_GET['lName'] : '';} ?>" name="lName" placeholder="Enter your last name"/>
              <?php if(isset($_GET['lName'])) { echo empty($_GET['lName']) ? '<p class="error-msg">* Must input last name</p>' : '';} ?>
              <div class="contacts-container">
                <div class="contact-contianer">
                  <label class="email">Email *</label>
                  <input class="email-input <?php if(isset($_GET['email'])) { echo empty($_GET['email']) ? 'box-error' : '';} ?><?php if(isset($_GET['email_error_msg'])) { echo 'box-error';} ?>" type="email" value="<?php if(isset($_GET['email'])) { echo !empty($_GET['email']) ? $_GET['email'] : '';} ?>" name="email"  placeholder="Enter your email"/>
                  <?php if(isset($_GET['email'])) { echo empty($_GET['email']) ? '<p class="error-msg">* Must input email</p>' : '';} ?>
                  <?php if(isset($_GET['email_error_msg'])) { echo '<p class="error-msg">Email already exits</p>';} ?>
                   
                    
                </div>
                <div class="contact-contianer">
                  <label class="phone-number">Phone Number *</label>
                  <input class="phone-input <?php if(isset($_GET['phoneNumber'])) { echo empty($_GET['phoneNumber']) ? 'box-error' : '';} ?>" type="text" value="<?php if(isset($_GET['phoneNumber'])) { echo !empty($_GET['phoneNumber']) ? $_GET['phoneNumber'] : '';} ?>" name="phoneNumber" placeholder="Enter mobile number"/>
                  <?php if(isset($_GET['phoneNumber'])) { echo empty($_GET['phoneNumber']) ? '<p class="error-msg">* Must input phone number</p>' : '';} ?> 
                </div>
              </div>

              <div class="passwords-container">
                <div class="password-container">
                  <label class="password">Password *</label>
                  <input class="password-input <?php if(isset($_GET['password'])) { echo empty($_GET['password']) ? 'box-error' : '';} ?>" type="password" value="" name="password" placeholder="Enter password"/>
                  <?php if(isset($_GET['password'])) { echo empty($_GET['password']) ? '<p class="error-msg">* Must input password</p>' : '';} ?>  
                </div>

                <div class="password-container">
                  <label class="password2"> confirm Password *</label>
                  <input class="password2-input <?php if(isset($_GET['password2'])) { echo empty($_GET['password2']) ? 'box-error' : '';} if(isset($_GET['pwdmatcherror'])) { echo 'box-error';} ?>" type="password" value="" name="password2" placeholder="Confirm password"/>
                   <?php if(isset($_GET['password2'])) { echo empty($_GET['password2']) ? '<p class="error-msg">* Must input confirm password</p>' : '';} ?> 
                   <?php if(isset($_GET['pwdmatcherror'])) { echo  '<p class="error-msg">* Password don\'t match</p>';} ?> 
                </div>
              </div>

              <label class="county">Town/Area</label>
              <input class="county-input" type="text" value="<?php if(isset($_GET['town'])) { echo !empty($_GET['town']) ? $_GET['town'] : '';} ?>" name="town" placeholder="Enter your current county"/>

              <label class="region">Street</label>
              <input class="region-input" type="text" value="<?php if(isset($_GET['street'])) { echo !empty($_GET['street']) ? $_GET['street'] : '';} ?>" name="street" placeholder="Enter your current region"/>

              <label class="street">Building & Room no</label>
              <input class="street-input" type="text" name="building" value="<?php if(isset($_GET['building'])) { echo !empty($_GET['building']) ? $_GET['building'] : '';} ?>" placeholder="e.g Annex - G5"/>
              <input type="submit" value="Sign Up" class="btn-submit" />
            </form>
            <div class="links">
              <a class="link" href="http://localhost/online_freedelivery_movies_series/user/login.php">Already have an account?</a>
            </div>
          </div>
        </div>
      </div>
      <script src="../js/register.js"></script>
</body>
</html>