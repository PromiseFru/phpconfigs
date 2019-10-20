<?php
if(isset($_REQUEST['signup-btn'])){

    require 'dbh.inc.php';

    // connect fields from frontend
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['pwd'];

    // check if any empty fields
    if(empty($username) || empty($email) || empty($password)){
        header('location: ../signup.php?error=emptyfields&username='.$username.'&email='.$email);
        exit();
    }
    // test for email validity
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('location: ../signup.php?error=invalidemail&username='.$username);
        exit();
    }
    // test validity of username
    elseif(!preg_match('/^[a-zA-Z0-9]*$/', $username)){
        header('location: ../signup.php?error=invalidusername&email='.$email);
        exit();
    }
    // test validity of username and email
    elseif(!preg_match('/^[a-zA-Z0-9]*$/', $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('location: ../signup.php?error=invalidusername&email');
        exit();
    }
    // password check here... if needed
}