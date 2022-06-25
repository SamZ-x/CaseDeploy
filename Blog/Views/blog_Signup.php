<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Login</title>
    <link rel="stylesheet" href="../Styles/blogstyle.css">
    <link rel="stylesheet" href="../Styles/substyle_signup.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../blog_Signup.js"></script>
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
            <li><a href="blog_login.php">Login</a></li>
        </ul>
    </div>
    <div class="main" >
        <div class="blog_signin_container">
            <div class="blog_signin_title">
                <label class="blog_signin_title_main">Provide some details for your blog</label>
                <label  class="blog_signin_title_sub">You can always change this later on.</label>
                <hr size="1" width="100%" color="grey">
            </div>
            <form action="../Includes/signup.inc.php" method="post">
                <div class="blog_signup_item">
                    <label >Firstname</label>
                    <input type="text" name="firstname" placeholder="First Name">
                </div>
                <div class="blog_signup_item">
                    <label >Lastname</label>
                    <input type="text" name="lastname" placeholder="Last Name">
                </div>
                <div class="blog_signup_item">
                    <label >Nickname</label>
                    <input type="text" name="nickname" placeholder="NickName">
                </div>
                <div class="blog_signup_item">
                    <label >E-mail</label>
                    <input type="email" name="email" placeholder="E-mail">
                </div>
                <div class="blog_signup_item">
                    <label >Password</label>
                    <input type="password" name="password" placeholder="password">
                </div>
                <div class="blog_signup_item">
                    <label >Phone</label>
                    <input type="tel" name="phone" placeholder="000-000-0000">
                </div>
                <div class="blog_signup_item">
                    <label>Region</label>
                    <select name="Region">
                        <option value="none">Please Select</option>
                        <option value="1">CA</option>
                        <option value="2">USA</option>
                    </select>
                </div>
                <div class="blog_signup_submit">
                    <hr size="1" width="100%" color="grey">
                    <input type="checkbox" name="agreement"><label>I agree to <a href="">terms of service.</a></label>
                    <button type="submit" name="submit">Join</button>
                </div>
            </form>
            <label ></label>

        </div>
    </div>
    <div class="footer">
        <footer>
            &#174; Xiaobin Zhu <br>
            <script>document.write('Last Modified: '+document.lastModified);</script>
        </footer>
    </div>

</body>
</html>