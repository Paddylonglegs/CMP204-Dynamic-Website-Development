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
    <?php include('navbar.php'); ?> <!--Regular Navbar-->

    <div class="container p-3 my-3 bg-dark text-white">
        <div class="row">
            <div class="col-sm-4">
            
            </div>
            <div class="col-sm-4">
                <p id="account">Create An Account!</p>
                <form action="CreateAccount.php" method="post">
                    Username: <input type="text" id="username" name="username" minlength="4" placeholder="Enter 4 characters+"><br> <!-- Minimum Username length has to be 4 characters-->
                    <div id="Availability" ></div>  <!-- Response from Username Availability goes here-->
                    Password: <input type="password" name="password" minlength="6" placeholder="Enter 6 characters+"><br> <!-- Minimum password length has to be 6 characters-->
                    <input type="submit" name="submit" value="submit">
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="CheckUsername.js"></script>

</body>