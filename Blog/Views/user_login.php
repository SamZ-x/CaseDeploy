<?php
    require_once "head.view.php";
?>
<div class = "navbar">
    <ul>
        <li><a href="../../home.php">home</a></li>
        <li><a href="../index.php">search</a></li>
        <li><a href="">Login</a></li>
    </ul>
</div>
<div class="main" >
    <form  class="blog_login" action="../Route/route" method="post">
        <!-- determine the route -->
        <input type="hidden" name="action" value="select">
        <input type="hidden" name="endpoint" value="userlogin">

        <label class="blog_login_title">Sign in</label>
        <div class="blog_login_input">
            <input type="text" name="userid_email" placeholder="UserId/Email">
        </div>
        <div class="blog_login_input">
            <input  class="blog_login_input_pwd" type="password" name="password" placeholder="Password" >
            <span class="blog_login_input_pwdshow">Show</span>
        </div>
        <button class = "blog_login_submit_button" type="submit" name="submit">Sign in</button>
        <div class="blog_login_link">
            <a href="">Reset Password?</a>
            <a href="user_signup.php">Join</a>
        </div>
    </form>
</div>
<?php     require_once "foot.view.php"; ?>
