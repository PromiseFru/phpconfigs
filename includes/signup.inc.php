<?php
if(isset($_REQUEST['signup-btn'])){

    require 'dbh.inc.php';

    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['pwd'];

    if(empty($username) || empty($email) || empty($password)){
        header('location: ../signup.php?error=emptyfields&username='.$username.'&email='.$email);
        exit();
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('location: ../signup.php?error=invalidemail&username='.$username);
        exit();
    }elseif(!preg_match('/^[a-zA-Z0-9]*$/', $username)){
        header('location: ../signup.php?error=invalidusername&email='.$email);
        exit();
    }
}