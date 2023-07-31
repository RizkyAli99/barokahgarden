<?php
require 'koneksi.php';
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$query = "INSERT INTO tbl_users VALUES('$username','$email','$password')";

?>