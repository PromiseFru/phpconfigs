<?php
    session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Test</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
            <a class="navbar-brand" href="#">MyTest</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation"></button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
            <?php
                if(isset($_SESSION['username'])){
                echo '<form action="includes/logout.inc.php" method="post" class="ml-auto">
                        <button class="btn btn-success my-2 my-sm-0" type="submit">logOut</button>
                        </form';
                }else {
                    echo '<a href="login.php" class="btn btn-success my-2 my-sm-0 ml-auto" type="button">Login</a>
                    <a href="signup.php" class="btn btn-success my-2 my-sm-0" type="button">Signup</a>';
                    }
            ?>
            </div>
        </nav>
    </header>