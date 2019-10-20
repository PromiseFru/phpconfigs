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
    // check for duplicate username in database
    else{
        $sql = 'SELECT username FROM users WHERE username=?';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('location: ../signup.php?error=sqlerror');
            exit();    
        } else{
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header('location: ../signup.php?error=usertaken&email='.$email);
                exit();        
            }
            // create user in database
            else{
                $sql = 'INSERT INTO users (username, email, password) VALUES (?,?,?)';
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header('location: ../signup.php?error=sqlerror');
                    exit();    
                } else{
                    // hash password
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header('location: ../signup.php?signup=success');
                    exit();    
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    // stop direct url access
    else{
        header('location:../signup.php');
        exit();
    }