<!--
Author: Patrick Collins
©️license MIT
https://github.com/Paddylonglegs/
-->

<?php
    session_start();
    ob_start();

    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
    
    header("location: index.php"); //user is brought back to home page

?>