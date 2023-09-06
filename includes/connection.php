<?php
session_start();
$b_connect = mysqli_connect('localhost', 'root', '', 'business_market') or die("Connection failed: " . mysqli_connect_error());

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} 
?>
