<?php
    
    //import helper function
    require_once "../blog_functions.php";
    $status = "";

    error_log("checkpoint1");

    //check local input
    if(isset($_POST['submit']) && $_POST['submit']=="Sign in")
    {
        if(isset($_POST['userid_email']) && strlen($_POST['userid_email']) > 0
            && isset($_POST['password']) && strlen($_POST['password']) > 0)
        {
            //construct login info array
            $userinfo = array();
            $userinfo['userid_email'] = strip_tags(trim($_POST['userid_email']));
            $userinfo['password'] = strip_tags(trim($_POST['password']));
            $userinfo['response'] = "";
            $userinfo['status'] = false;

            $secretPassword = password_hash($userinfo['password'], PASSWORD_DEFAULT);
            error_log($secretPassword);
            
            //call validation function 
            $userinfo = LoginValidation($userinfo);
            error_log($userinfo['userid_email'].$userinfo['password']);
            
            //redirection if succeed
            if($userinfo['status'])
            {
                header("Location: blog_userpage.php");
                die();
            }
            
            ////////////////////////////////////////////////
            //need to fix.
            //if failed keep the previous input in the box

            $status = $userinfo['response'];
        }
        else
            $status = "Login information cannot be empty.";
    }
       
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Login</title>
    <link rel="stylesheet" href="../blogstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../blog_login.js"></script>
</head>
<body class = "blogsite">
    <div class="header">
        <header>
           <h1>Console.Blog</h1>
        </header>
    </div>
    <div class = "navbar">
        <ul>
            <li><a href="../../home.php">home</a></li>
            <li><a href="blog_index.php">search</a></li>
            <li><a href="">Login</a></li>
        </ul>
    </div>
    <div class="main" >
        <form  class="blog_login" action="blog_login.php" method="post">
            <label class="blog_login_title">Sign in</label>
            <label class="blog_login_status"><?php echo $status; ?>  </label>  
            <div class="blog_login_input">
                <input type="text" name="userid_email" placeholder="UserId/Email">
            </div>
            <div class="blog_login_input">
                <input  class="blog_login_input_pwd" type="password" name="password" placeholder="Password" >
                <span class="blog_login_input_pwdshow">Show</span>
            </div>
            <input class = "blog_login_submit_button" type="submit" name="submit" value="Sign in">
            <div class="blog_login_link">
                <a href="">Reset Password?</a>
                <a href="blog_Signup.php">Join</a>
            </div>

        </form>
    </div>
    <div class="footer">
        <footer>
            &#174; Xiaobin Zhu <br>
            <script>document.write('Last Modified: '+document.lastModified);</script>
        </footer>
    </div>

</body>
</html>