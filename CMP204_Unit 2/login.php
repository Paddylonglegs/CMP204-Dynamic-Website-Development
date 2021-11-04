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
                <p id="account">Log In!</h1>
                <form action="UserAuth.php" method="post">
                    Username: <input type="text" name="username"><br>
                    Password: <input type="password" name="password"><br>
                <input type="submit" name="submit" value="submit">
                </form>
            </div>
        </div>
    </div>
    
</body>