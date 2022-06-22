<?php
    include '../Includes/class-autoloader.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Login</title>
    <link rel="stylesheet" href="../blogstyle.css">
</head>
<body class = "blogsite">
    <div class="header">
        <header>
           <h1>Console.Blog</h1>
        </header>
    </div>
    <div class = "navbar">
        <ul>
            <li><a href="">home</a></li>
            <li><a href="">search</a></li>
            <li><a href="">Login</a></li>
        </ul>
    </div>
    <div class="main" >
        <form  class="blog_login" action="../Includes/login.inc.php" method="post">
            <label class="blog_login_title">Sign in</label>
            <label class="blog_login_status"><?php echo $status; ?>  </label>  
            <div class="blog_login_input">
                <input type="text" name="userid_email" placeholder="UserId/Email">
            </div>
            <div class="blog_login_input">
                <input  class="blog_login_input_pwd" type="password" name="password" placeholder="Password" >
                <span class="blog_login_input_pwdshow">Show</span>
            </div>
            <button class = "blog_login_submit_button" type="submit" name="submit">Sign in</button>
            <!-- <input class = "blog_login_submit_button" type="submit" name="submit" value="Sign in"> -->
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