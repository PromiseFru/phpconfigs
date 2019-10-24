<?php
    if(isset($_GET['error'])){
        if($_GET['error'] == 'emptyfields'){
            echo '<div class="alert alert-danger text-center">Fill all Feilds</div>';
        }
        elseif($_GET['error'] == 'invalidemail'){
            echo '<div class="alert alert-danger text-center">Fill in a valid Email</div>';
        }
        elseif($_GET['error'] == 'invalidusername'){
            echo '<div class="alert alert-danger text-center">Fill in a valid Username</div>';
        }
        elseif($_GET['error'] == 'invalidusername&email'){
            echo '<div class="alert alert-danger text-center">Fill in a valid Username and Email</div>';
        }
        elseif($_GET['error'] == 'usertaken'){
            echo '<div class="alert alert-danger text-center">Username taken</div>';
        }
    } elseif($_GET['signup'] == 'success'){
        echo '<div class="alert alert-success text-center">Successful</div>';
    }
