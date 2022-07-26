<?php

$username = "root";
$password = "";
$server = 'localhost';
$db = 'pench';

$con = mysqli_connect($server,$username,$password,$db);

if(!$con){
    echo "No connection";
}

?>