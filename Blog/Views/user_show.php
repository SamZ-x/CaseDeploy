<?php
    //if no user login, back to login page
    session_start();

    if(!isset($_SESSION['userid'])){
        header("location: user_login.php");
        exit();
    }

    //log out
    if(isset($_GET['status'])&&$_GET['status']=="logout")
    {
        session_unset();
        session_destroy();
        header("location: ../index.php");
        exit();
    }

    //if login successfully
    $userData = "";
    if(isset($_SESSION['userdata'])){
        $userData = $_SESSION['userdata'];
    }

    if(isset($_GET['status'])&&$_GET['status']=="failed")
    {
        $error = $_GET['error'];
        
        if($error=="databaseError")
            echo "<script>alert('Update article list error!');</script>";
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
            <li><a href="aticle_new.php?status=new">New Article</a></li>
            <li><a href="blog_index.php">search</a></li>
            <li><a href="../../home.php">home</a></li>
            <li><a href=".?status=logout">Log Out: <?=$_SESSION['nickname'];?></a></li>
        </ul>
    </div>
    <div class="main">
        <div class="content">
        <?php
            //iterate all retrieved article
            //fill into the template
            if(!empty($userData)){
                foreach($userData as $article)
                {
                    //display title
                    echo "<div class=\"articles\"><div class=\"article-body\"><h1 class=\"article-title\">".$article['title']."</h1>";
                    //display subtitle
                    echo "<div class=\"article-subtitle\">".$article['createdAt']."<a class=\"article-link\" href=\"\">".$article['Firstname']."</a></div>";
                    //display description
                    echo "<div class=\"article-text\">".$article['description']."<br></div>";
                    //display the button and close tag
                    echo "<a class = \"article-link-button\" href=\"\">Read More</a><a class = \"article-link-button\" href=\"\">Edit</a></div></div>";
                }
            }
            else
             echo "<div class=\"search-title\"><h1>Oop! No articles!</h1></div>"
            ?>
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