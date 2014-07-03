<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
echo phpversion();
include '../class/encrypt.php'; 
$username = $_POST['username'];
$password = $_POST['password'];
$passwordfile = fopen("password.txt", "r") or die("Error");
$name = trim(fgets($passwordfile));
$pw = trim(fgets($passwordfile));
$converter = new Encryption;
$name = $converter->decode($name);
$pw = $converter->decode($pw);

if( $username != $name ) die(header('Location:index.html?m=1'));
if( $password != $pw ) die(header('Location:index.html?m=2'));
header('Location:../upload_news.php');
?>