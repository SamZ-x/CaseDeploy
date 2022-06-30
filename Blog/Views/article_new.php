<?php
    //if no user login, back to login page
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location: user_login.php");
        exit();
    }

    if(isset($_GET['status'])&&$_GET['status']=="new")
        $_SESSION['input'] = null;

    //log out
    if(isset($_GET['status'])&&$_GET['status']=="logout")
    {
        session_unset();
        session_destroy();
        header("location: blog_index.php");
        exit();
    }

    if(isset($_GET['status'])&&$_GET['status']=="failed")
    {
        $error = $_GET['error'];
        
        if($error=="inputEmpty")
            echo "<script>alert('Input can not be empty!');</script>";

        if($error=="databaseError")
            echo "<script>alert('System Error!');</script>";
    }

    require_once "head.view.php";
    
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../Styles/blogstyle.css">
    <link rel="stylesheet" href="../Styles/substyle-article.css">
</head>
<body class = "blogsite">
    <div class="header">
        <header>
           <h1>Console.Blog</h1>
        </header>
    </div> -->
    <div class = "navbar">
        <ul>
            <li><a href="">Back</a></li>
            <li><a href="blog_index.php">search</a></li>
            <li><a href="../../home.php">home</a></li>
            <li><a href="blog_userpage.php?status=logout">Log Out: <?php echo $_SESSION['userid'];?></a></li>
        </ul>
    </div>
    <div class="main">
        <div class="content">
            <form class="artarticle-new" action="../Route/route" method="post">
                <!-- determine the route -->
                <input type="hidden" name="action" value="insert">
                <input type="hidden" name="endpoint" value="article">

                <?php
                    require_once "_form_field.php";
                ?>
            </form>
        </div>
    </div>
    <?php     require_once "foot.view.php"; ?>
    <!-- <div class="footer">
        <footer>
            &#174; Xiaobin Zhu <br>
            <script>document.write('Last Modified: '+document.lastModified);</script>
        </footer>
    </div>

</body>
</html> -->