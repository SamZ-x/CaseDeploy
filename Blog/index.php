<?php
    //index page (home page of the blog)
    //display search bar for searching specific user's blog or blog articles base on title key words
    session_start();

    $status = "";
    $error = "";
    
    if(isset($_GET['status']))
    {
        $status = $_GET['status'];
        $error = $_GET['error'];
        
        if($error=="inputEmpty")
            echo "<script>alert('Please Input a keyword!');</script>";
        
        if($error=="databaseError")
            echo "<script>alert('System Error!');</script>";

        if($status=="dataEmpty")
            echo "<script>alert('No relative article!');</script>";
    }
?>
<!DOCTYPE html>
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
    </div>
<?php
    require_once "Views/article_search.php";
    require_once "Views/foot.view.php";
?>
