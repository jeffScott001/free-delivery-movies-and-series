<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    require_once '../models/user.php';
    require_once '../config/Database.php';

    // Instatiate DB and connect to DB
    $database = new Database();
    $db = $database->connect();

    // Instantiate the user class
    $user = new User($db);

    // Get user data
      // Get the data form the form
      $email = htmlspecialchars(!empty($_POST['email']) ? $_POST['email'] : '');
      $password = htmlspecialchars(!empty($_POST['password']) ? $_POST['password'] : '');

      // Check if user has input all fields
      if(empty($_POST['email']) || empty($_POST['password'])) {
        header('Location: http://localhost/online_freedelivery_movies_series/user/login.php?email=' . $email . '&null_fields=1');
        die();
    }

    // Check if the user exists
    $user->email = $email;
    if(!$user->checkEmail()) {
        header('Location: http://localhost/online_freedelivery_movies_series/user/login.php?email=' . $email . '&email_error_msg=does_not_exist');
        die();
    }

    // Verify user
    $data = $user->logIn();
    $row = $data->fetch(PDO::FETCH_ASSOC);

    if(password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['verified'] = true;
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['lName'];
        $_SESSION['street'] = $row['street'];
        $_SESSION['building'] = $row['building'];
        $_SESSION['phone_number'] = $row['phoneNumber'];
        header('Location: http://localhost/online_freedelivery_movies_series/index.php');  
        die();
    } else {
        header('Location: http://localhost/online_freedelivery_movies_series/user/login.php?email=' . $email . '&password_error=1');
    }
