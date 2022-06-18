<?php
    //1. invoke create database connection php file to export the database connection variables  
    //1.1 import database connection variables



    //2. invoke database query php file to export the data object
    //2.1 use data object to initialize the index page content

    //3. use in text php script to display the content to the target div.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
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
            <li><a href="../../home.php">home</a></li>
            <li><a href="">search</a></li>
            <li><a href="./blog_login.php">Login</a></li>
        </ul>
    </div>
    <div class="main">
        <div class = "leftbar" >
            <div class="personal_pic">
                <img src="./images/pic_self.jpg" alt="profile photo">
            </div>
            <ul class="personal_info">
                <li style="font-size: larger;"><b>Xiaobin Zhu</b></li>
                <li>Always Do My Best!</li>
                <li><a href="https://www.nait.ca/nait/home">NAIT (Northern Alberta Institute of Technology)</a></li>
                <li><a class="personal_info_contact"  style="color: aliceblue; " href="../../about.php">Contact info</a></li>
                <li>other info</li>
            </ul>
        </div>
        <div class="content">
            <?php
                //require_once 
            ?>
            <div class = "acticlecontent" >
                <h2>Title...</h2>
                <label>author, date</label>
                <p>
                content...content...content...content...content...content...
                content...content...content...content...content...content...
                content...content...content...content...content...content...
                </p>
                <p>
                content...content...content...content...content...content...
                content...content...content...content...content...content...
                content...content...content...content...content...content...
                </p>
            </div>
            <div class = "acticlecontent">
                <h2>Title2...</h2>
                <label>author, date</label>
                <p>
                content...content...content...content...content...content...
                content...content...content...content...content...content...
                content...content...content...content...content...content...
                </p>
                <p>
                content...content...content...content...content...content...
                content...content...content...content...content...content...
                content...content...content...content...content...content...
                </p>
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