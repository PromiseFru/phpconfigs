<?php
    if(isset($_GET['error'])){
        if($_GET['error'] == 'emptyfields'){
            echo '<div class="alert alert-danger text-center">Fill all Feilds</div>';
        }
        elseif($_GET['error'] == 'wrongpwd'){
            echo '<div class="alert alert-danger text-center">Invalid email or password</div>';
        }
        elseif($_GET['error'] == 'invalidusername'){
            echo '<div class="alert alert-danger text-center">Fill in a valid Username</div>';
        }
        elseif($_GET['error'] == 'nouser'){
            echo '<div class="alert alert-danger text-center">User does not exist</div>';
        }
    } elseif(isset($_GET['login'])){
        if($_GET['login'] == 'success'){
            echo '<div class="alert alert-success text-center">Successful</div>';
        }
    }
