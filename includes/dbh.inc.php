<?php
//making connection to server
$servername = "localhost";
$dBUsername = "harshit";
$dBPassword = "test1234";
$dbName = "loginsystem";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dbName);

if(!$conn){

   //display message
   die("Connection failed: ". mysqli_connect_error());
}