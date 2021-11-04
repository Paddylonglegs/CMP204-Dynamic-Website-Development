<!--
Author: Patrick Collins
©️license MIT
https://github.com/Paddylonglegs/
-->

<?php
session_start();
ob_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Connection details
$servername = "";
$dbusername = "";
$dbpassword = "";
$dbname = "";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if(!$conn) //checking if connection made
{
	die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['username'])){

   $Username = $_POST['username']; //Setting User input

   //prepared statement getting Username from database
   $DBUser = mysqli_prepare($conn, "SELECT count(*) as Avail FROM Users WHERE Username=?"); //counts number of users with username and storing result as Avail

   //dealing with the parameters
   mysqli_stmt_bind_param($DBUser, "s", $Username);
   mysqli_stmt_execute($DBUser);
   mysqli_stmt_bind_result($DBUser, $Result);

   while (mysqli_stmt_fetch($DBUser)) {
	   //;
   }

   $response = "<span style='color: green;'>Available.</span>";
   if($Result>0) //Username Taken
   {
    $response = "<span style='color: red;'>Taken.</span>";
    echo $response;
    mysqli_stmt_close($DBUser);
   }
   else //Username Unique, tell User
   {
        echo $response;
        mysqli_stmt_close($DBUser);
   }

    mysqli_close($conn);
}