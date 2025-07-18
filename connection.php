<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "auto";

$connect = mysqli_connect($hostname,$username,$password,$db_name);

if(!$connect)
{
    echo"connection failed";
}


?>