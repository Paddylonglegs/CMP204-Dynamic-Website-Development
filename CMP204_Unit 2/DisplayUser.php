<!--
Author: Patrick Collins
©️license MIT
https://github.com/Paddylonglegs/
-->

<?php
    session_start();
    ob_start();
    if(!isset($_SESSION['username'])){ //making sure user has session set
        header("location: index.php"); //if not kick to home.
    }
    else
    {
        echo "Welcome back, " . $_SESSION["username"] . ".<br>";
    }
?>