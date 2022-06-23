<?php
    //blog_index page (home page of the blog)
    //display search bar for searching specific user's blog or blog articles base on title key words
    $data="";
    //resume the session;
    session_start();
    if(isset($_SESSION['data'])){
        $data = $_SESSION['data'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../blogstyle.css">
    <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
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
            <li><a href="blog_login.php">Login</a></li>
        </ul>
    </div>
    <div class="main">
        <div class="content">
            <?php
                if(!empty($data)){
                    //for test, display the data
                    foreach($data as $article)
                    {
                        echo "<div>".$article['sanitizedHtml']."</div>";
                    }
                }
                else
                {
                    echo "<div>No resource!</div>";
                }
            ?>
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