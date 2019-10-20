<?php

require 'connectinfo.inc.php';

$conn = mysqli_connect($servername,$db_username,$db_password,$db_name);

if(!$conn){
    die('CONNECTION FAILED: '.mysqli_connect_error());
}