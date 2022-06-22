<?php
    session_start();
    //log out current user
    //redirect to login page
    //distroy the current seesion
    if(isset($_SESSION["userid"]))
    {
        session_unset();
        session_destroy();
        header("location: ../Views/login.php?error=logout");
        die();
    }