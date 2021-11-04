<!--
Author: Patrick Collins
©️license MIT
https://github.com/Paddylonglegs/
-->

<!Doctype HTML>
<html lang="en">

<head>
    <title>Ol' Blue Eyes</title>
    <?php include('head.php'); ?>
</head>

<body>
    <?php include('navbar-LI.php'); ?>  <!--Session Navbar-->
    
    <div class="container p-3 my-3 bg-dark text-white">
        <p>Your Account information:</p>
        <div>
            <p><?php session_start(); ob_start(); if(!isset($_SESSION['username'])) { header("location: index.php");} else { echo "Username: " . $_SESSION["username"] . ".<br>";}?>
        </div>
    </div>

    <div class="container p-3 my-3 bg-dark text-white">
        <p>Would you like to change your Username?</p>
        <div id="Change">
            <button id="changeName">Change Username</button> <!--if user clicks show div with on click event-->
        </div>
    </div>

    
    <div class="container p-3 my-3 bg-dark text-white">
        <p>Would you like to delete your account?</p>
        <div id="Confirm">
            <button id="deleteUser">Delete User Account</button> <!--if user clicks show div with on click show event-->
        </div>
    </div>

    <script type="text/javascript" src="ConfirmAjax.js"></script>
    <script type="text/javascript" src="ChangeAjax.js"></script>
</body>