<?php
    //resume the session;
    session_start();
    //blog_index page (home page of the blog)
    //display search bar for searching specific user's blog or blog articles base on title key words
    
    $data = "";

    if(isset($_SESSION['data'])){
        $data = $_SESSION['data'];
    }

    if(!$data){
        header("Location: ../index.php");
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
    <link rel="stylesheet" href="Views/CSS/blogstyle.css">
    <link rel="stylesheet" href="Views/CSS/substyle-signup.css">
    <link rel="stylesheet" href="Views/CSS/substyle-article.css">
</head>
<body class = "blogsite">
    <div class="header">
        <header>
           <h1>Console.Blog</h1>
        </header>
    </div> -->
    <div class = "navbar">
        <ul>
            <li><a href="../../home.php">home</a></li>
            <li><a href="../index.php">search</a></li>
            <?php
                if(isset($_SESSION['userid']))
                    echo "<li><a href=\"blog_userpage.php\">ID: ".$_SESSION['userid']."</a></li>";
                else
                    echo "<li><a href=\"user_login.php\">Login</a></li>";
            ?>
        </ul>
    </div>
    <div class="main">
        <div class="content">
            <?php
            //iterate all retrieved article
            //fill into the template  
                foreach($data as $article)
                {
                    //display title
                    echo "<div class=\"articles\"><div class=\"article-body\"><h1 class=\"article-title\">".$article['title']."</h1>";
                    //display subtitle
                    echo "<div class=\"article-subtitle\">".$article['createdAt']."<a class=\"article-link\" href=\"\">".$article['Firstname']."</a></div>";
                    //display description
                    echo "<div class=\"article-text\">".$article['description']."<br></div>";
                    //display the button and close tag
                    echo "<a class = \"article-link-button\" href=\"\">Read More</a></div></div>";
                }
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