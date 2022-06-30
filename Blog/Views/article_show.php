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
<div class = "navbar">
    <ul>
        <li><a href="../../home.php">home</a></li>
        <li><a href="../index.php">search</a></li>
        <?php
            if(isset($_SESSION['userid']))
                echo "<li><a href=\"user_show.php\">ID: ".$_SESSION['nickname']."</a></li>";
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
