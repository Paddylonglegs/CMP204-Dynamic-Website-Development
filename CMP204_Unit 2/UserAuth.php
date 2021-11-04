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

if($_SERVER["REQUEST_METHOD"] == "POST") //Setting Variables from form
{
    $Username=test_input($_POST["username"]); 
    $Password=test_input($_POST["password"]);
}


//prepared statement getting Account info from database
$gUser = mysqli_prepare($conn, "SELECT Username, Password FROM Users WHERE Username=?");

//dealing with the parameters
mysqli_stmt_bind_param($gUser, "s", $Username);
mysqli_stmt_execute($gUser);
mysqli_stmt_bind_result($gUser, $U, $P);

while (mysqli_stmt_fetch($gUser)) {
	//printf ("%s %s <br />", $U, $P);
}

///VALIDATING USER
if($Username!="" && $Username!='"' && $Username!="'" && $Username!="=") //Making sure fields aren't left blank
{
    if($Password!="" && $Password!='"' && $Password!="'" && $Password!="=") //Making sure fields aren't left blank
    {
        if(password_verify($Password, $P)) //Password is correct
        {
            if($Username == $U) //Checking if there is a result back from sql query
            {
                session_start();
                ob_start();
                $_SESSION['username'] = $Username; //username is correct, log on.
                
                header("location: welcome.php"); //transfer user to logged in page
            }
            else
            {
                echo "Something went wrong, please try again";
            } 
        }
        else
        {
            echo "Something went wrong, please try again";
        }   
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

//close statement and connection
mysqli_stmt_close($gUser);
mysqli_close($conn);

?>