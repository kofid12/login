<?php

$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "login_with_booking";

// create connection
$conn = mysqli_connect($localhost, $username, $password, $dbname);

// check connection
if (!$conn) {
   die("Connection failed");
}