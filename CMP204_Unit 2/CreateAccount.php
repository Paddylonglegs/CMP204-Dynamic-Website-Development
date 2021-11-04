<!--
Author: Patrick Collins
©️license MIT
https://github.com/Paddylonglegs/
-->

<?php

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

//SETTING USER SUBMITTED DATA

function test_input($data) //trimming data incase malicious input
{
   $data = trim($data); $data = stripslashes($data); $data = htmlspecialchars($data); 
   return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $Username=test_input($_POST["username"]); 
    $Password=test_input($_POST["password"]);
    $hash = password_hash($Password, PASSWORD_DEFAULT); //hashing password securely
}


//prepared statement getting Username from database
$DBUser = mysqli_prepare($conn, "SELECT count(*) as Avail FROM Users WHERE Username=?"); //counts number if users with username and storing result as Avail

//dealing with the parameters
mysqli_stmt_bind_param($DBUser, "s", $Username);
mysqli_stmt_execute($DBUser);
mysqli_stmt_bind_result($DBUser, $Result);

while (mysqli_stmt_fetch($DBUser)) {
	//printf ("%s <br />", $Result);
}

if($Result>0) //Making sure User doesn't ignore Username Availability message
{
    echo "Check the Availability when typing a Username";
}
else if($Result==0) //Unique Username, continue
{
    if($Username!=""  && $Username!='"' && $Username!="'" && $Username!="=") //Field not empty
    {
        if($Password!="" && $Password!='"' && $Password!="'" && $Password!="=") //Field not empty
        {
            //prepared statement inserting User account into database
            $gUser = mysqli_prepare($conn, "INSERT INTO Users (Username, Password) VALUES (?,?)");

            //dealing with the parameters
            mysqli_stmt_bind_param($gUser, "ss", $Username, $hash);
            mysqli_stmt_execute($gUser);

            echo "Created User successfully";
            header("location: login.php"); //transfer user to logged in page

            //Close connections
            mysqli_stmt_close($gUser);
        }
        else
        {
            echo "Please enter a Username and Password.";
        }

    }
    else
    {
        echo "Please enter a Username and Password.";
    }
}

//Close connections
mysqli_close($conn);

?>