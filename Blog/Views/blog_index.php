<?php
    //blog_index page (home page of the blog)
    //display search bar for searching specific user's blog or blog articles base on title key words
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
    <link rel="stylesheet" href="../Styles/blogstyle.css">
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
            <div class="search-title">
                <label>Search</label>
                <img src="../images/search.png" alt="searchicon">
            </div>
            <div class="search-bar">
                <form action="../Includes/search.inc.php" method="get">
                    <select name="searchCategory" id="searchCategory">
                        <option value="username">User Name</option>
                        <option value="articletitle">Article Title</option>
                    </select>
                    <input  type="text" name="searchInfo" id="searchInfo" placeholder="Input a keyword...">
                    <button  type="submit" name="submit" value="search">Go</button>
                </form>
            </div>
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