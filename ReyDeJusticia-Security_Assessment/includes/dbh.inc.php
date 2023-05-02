<?php

$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName= "church";

$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);
 // $conn = mysqli_connect("localhost", "root", "", "church");

if(!$conn){
    die("Connection Failed: " .mysqli_connect_error());
}
