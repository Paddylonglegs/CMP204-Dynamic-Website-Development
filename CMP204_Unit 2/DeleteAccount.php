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
}

//prepared statement - Getting user data
$gUser = mysqli_prepare($conn, "SELECT Username, Password FROM Users WHERE Username=?");

//dealing with the parameters
mysqli_stmt_bind_param($gUser, "s", $Username);
mysqli_stmt_execute($gUser);
mysqli_stmt_bind_result($gUser, $U, $P);

while (mysqli_stmt_fetch($gUser)) {
	//printf ("%s %s <br />", $U, $P);
}

if(password_verify($Password, $P)) 
{
    //password is correct

    if($Username == $U) //User has entered correct details that match database row, proceed to deletion statements 
    {
        //prepared statement - Deleting
        $Wipe = mysqli_prepare($conn, "DELETE FROM Users WHERE Username=?");

        //dealing with the parameters
        mysqli_stmt_bind_param($Wipe, "s", $U);
        mysqli_stmt_execute($Wipe);
        mysqli_stmt_close($Wipe);

        // remove all session variables as User shouldn't be logged into non-existing account
        session_unset();

        // destroy the session as User shouldn't be logged into non-existing account
        session_destroy();
        header("location: index.php"); //transfer user to home page
       
    }
    else //User has entered incorrect details that don't match database row.
    {
         echo "Something went wrong, please try again";
    }    
} 
else //User has entered incorrect details that don't match database row.
{
    echo "Something went wrong, please try again";
}

mysqli_stmt_close($gUser);
      
mysqli_close($conn);

?>