<!--
Author: Patrick Collins
©️license MIT
https://github.com/Paddylonglegs/
-->

<?php
        session_start();
        ob_start();
        if(!isset($_SESSION['username']))
        {
            header("location: index.php");
        }
        else
        {
            //ok
        }
        
    ?>