<?php
//check if sent form data via submit button
if(isset($_POST['submit'])){

    $uid = $_POST['userid_email'];
    $pwd = $_POST['password'];

    //Instantiate loginContr class
    include "../Classes/Dbh.class.php";
    include "../Classes/Login.class.php";
    include "../Classes/LoginContr.class.php";

    
    $login = new LoginContr($uid, $pwd);

    //Running Error handlers and user login
    $login->userLogin();   //if login successfully, scripte will continue

    //redirect
    header("location: ../Views/index.php?error=none");
}