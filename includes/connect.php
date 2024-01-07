<?php
$localhost = 'localhost';
$user = 'root';
$password = '';
$db_name = 'mystore';


$con = mysqli_connect($localhost, $user, $password, $db_name);
if (!$con) {
    die(mysqli_connect_error($con));
}
