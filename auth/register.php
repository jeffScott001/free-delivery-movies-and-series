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

    // Get the data form the form
    $fName = !empty($_POST['fName']) ? $_POST['fName'] : '';
    $lName = !empty($_POST['lName']) ? $_POST['lName'] : '';
    $email = !empty($_POST['email']) ? $_POST['email'] : '';
    $phoneNumber = !empty($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '';
    $password = !empty($_POST['password']) ? true : '';
    $password2 = !empty($_POST['password2']) ? true : '';
    $town = !empty($_POST['town']) ? $_POST['town'] : '';
    $street = !empty($_POST['street']) ? $_POST['street'] : '';
    $building = !empty($_POST['building']) ? $_POST['building'] : '';
    
    if(empty($_POST['fName']) || empty($_POST['lName']) || empty($_POST['email']) || empty($_POST['phoneNumber']) || empty($_POST['password']) || empty($_POST['password2'])){
        header('Location: http://localhost/online_freedelivery_movies_series/user/register.php?' . 'fName=' . $fName . '&lName=' . $lName . '&email=' . $email . '&phoneNumber=' . $phoneNumber . '&password=' . $password . '&password2=' . $password2 . '&town=' . $town . '&street=' . $street . '&building=' . $building);
        die();
    }

    if($_POST['password'] !== $_POST['password2']) {
        header('Location: http://localhost/online_freedelivery_movies_series/user/register.php?' . 'fName=' . $fName . '&lName=' . $lName . '&email=' . $email . '&phoneNumber=' . $phoneNumber . '&password=' . $password . '&password2=' . $password2 . '&town=' . $town . '&street=' . $street . '&building=' . $building . '&pwdmatcherror=1');  
        die();
    }

    $hashPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    

    $user->fName = $fName;
    $user->lName = $lName;
    $user->email = $email;
    $user->phoneNumber = $phoneNumber;
    $user->password = $hashPassword;
    $user->town = $town;
    $user->street = $street;
    $user->building = $building;

    if($user->checkEmail()) {
        header('Location: http://localhost/online_freedelivery_movies_series/user/register.php?' . 'fName=' . $fName . '&lName=' . $lName . '&email=' . $email . '&phoneNumber=' . $phoneNumber . '&password=' . $password . '&password2=' . $password2 . '&town=' . $town . '&street=' . $street . '&building=' . $building . '&msg=registration_failed&email_error_msg=exits');
        die();
    }

    if($user->register()) {
        header('Location: http://localhost/online_freedelivery_movies_series/user/login.php?registration_msg=success');
    } else {
        header('Location: http://localhost/online_freedelivery_movies_series/user/register.php?' . 'fName=' . $fName . '&lName=' . $lName . '&email=' . $email . '&phoneNumber=' . $phoneNumber . '&password=' . $password . '&password2=' . $password2 . '&town=' . $town . '&street=' . $street . '&building=' . $building . '&msg=registration_failed');
    }