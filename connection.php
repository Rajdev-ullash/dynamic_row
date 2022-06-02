<?php
$username="root";
$password="";
$hostname="localhost";
$db="ajax_dg";

$conn = mysqli_connect($hostname,$username,$password,$db);

if(!$conn){
    die("Could not connect: " . mysqli_connect_error());

}

?>