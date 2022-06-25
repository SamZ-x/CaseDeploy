<?php
    if(isset($_POST['submit'])){
        //get form data
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $nname=$_POST['nickname'];
        $password = $_POST['password'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $region=$_POST['Region'];

        //Instantiate SignupContr class
        include "../Classes/Dbh.class.php";
        include "../Classes/Signup.class.php";
        include "../Classes/SignupContr.class.php";
        $signup = new SignupContr($fname,$lname,$nname,$email,$password,$phone,$region);

        //Running Error handlers and user signup
        $signup->signupUser();
        
        //going back to front page
        header("location:../Views/index.php?error=none");
    }