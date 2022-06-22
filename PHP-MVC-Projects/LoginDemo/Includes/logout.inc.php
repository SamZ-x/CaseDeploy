<?php
    //log out current user
    //redirect to login page
    //distroy the current seesion
    if(isset($_SESSION["userid"]))
    {
        session_start();
        session_unset();
        session_destroy();
        header("location: ../Views/login.php?error=logout");
        die();
    }