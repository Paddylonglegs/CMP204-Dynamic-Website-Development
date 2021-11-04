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

if(!isset($_SESSION['username'])){ //checking is user has session set
    header("location: index.php"); //kick to home page if no session
}
else
{
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
        $Username=test_input($_POST["Old"]); 
        $newName=test_input($_POST["New"]);
        $check = $_SESSION['username'];
    }

    if($Username == $check) //Checking that the Current Username entered matches the account logged into.
    {
        //prepared statement getting the username in the database that the user would like to change, and setting it as the new username.
        $update = mysqli_prepare($conn, "UPDATE Users SET Username = ? WHERE Username = ?");

        //dealing with the parameters
        mysqli_stmt_bind_param($update, "ss", $newName, $Username);
        mysqli_stmt_execute($update);
        echo "Username Changed successfully";
        
        // remove all session variables as old Username no longer exists
        session_unset();

        // destroy the session as User shouldn't be logged into non-existing account
        session_destroy();
        
        //closing connections
        mysqli_stmt_close($update);
        mysqli_close($conn);
        header("location: login.php"); //makes user log in again after destroying session
    }
    else
    {
        echo "Something went wrong";
    }
}

?>