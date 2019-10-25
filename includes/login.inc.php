<?php
if(isset($_REQUEST['login-btn'])){

    require 'dbh.inc.php';

    // connect fields from frontend
    $email_or_username = $_REQUEST['email_or_username'];
    $password = $_REQUEST['pwd'];

    // check if any empty fields
    if(empty($email_or_username) || empty($password)){
        header('location: ../signup.php?error=emptyfields&email_or_username='.$email_or_username);
        exit();
    }
    // check for username and password in database
    else{
        $sql = 'SELECT * FROM users WHERE username = ? OR email = ?;';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('location: ../login.php?error=sqlerror');
            exit();    
        } else{
            mysqli_stmt_bind_param($stmt, 'ss', $email_or_username, $email_or_username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['password']);
                if($pwdCheck == false){
                    header('location: ../login.php?error=wrongpwd');
                    exit();
                }
                // log user in
                elseif($pwdCheck == true){
                    session_start();
                    $_SESSION['id']= $row['id'];
                    $_SESSION['username']= $row['username'];

                    header('location: ../index.php?login=success');
                    exit();
                }else {
                    header('location: ../login.php?error=wrongpwd');
                    exit();
                }
            }else{
                    header('location: ../login.php?error=nouser');
                    exit();
                }
            }
        }
    }   
    // stop direct url access
    else{
        header('location:../login.php');
        exit();
    }