<?php
    //index page (home page of the blog)
    //display search bar for searching specific user's blog or blog articles base on title key words
    session_start();

    $status = "";
    $error = "";
    
    if(isset($_GET['status']))
    {
        $status = $_GET['status'];
        $message = $_GET['message'];
        
        if($message=="inputEmpty")
            echo "<script>alert('Please Input a keyword!');</script>";
        
        if($message=="databaseError")
            echo "<script>alert('System Error!');</script>";

        if($message=="dataEmpty")
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
    <link rel="stylesheet" href="../../css/blog.style.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" 
        crossorigin="anonymous"
    >
    </script>
  </head>
<!-- <body  class = "blogsite"> -->
<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
        <div class="container">
            <a href="./index.php" class="navbar-brand site-title">Console.Blog</a>

            <!-- open button for collapsed menu display less then breakpoint md(768px) -->
            <button 
                class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navmenu"
            >
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                        <a href="./index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="../../" class="nav-link">CaseDeploy</a>
                    </li>
                    <li class="nav-item">
                        <a href="#searchbar" class="nav-link">Search</a>
                    </li>
                    <li class="nav-item">
                      <?php
                          if(isset($_SESSION['userid']))
                              echo "<a class=\"nav-link\" href=\"Views/user_show.php\">ID: ".$_SESSION['nickname']."</a>";
                          else
                              echo "<a class=\"nav-link\" href=\"Views/user_login.php\">Login / Join</a>";
                      ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php
    require_once "Views/article_search.php";
    require_once "Views/foot.view.php";
?>


    <!-- <div class="header">
        <header>
           <h1>Console.Blog</h1>
        </header>
    </div> -->

<!-- 
    <div class = "navbar">
    <ul>
        <li><a href="../home.php">home</a></li>
        <li><a href="index.php">search</a></li>
        <?php
            // if(isset($_SESSION['userid']))
            //     echo "<li><a href=\"Views/user_show.php\">ID: ".$_SESSION['nickname']."</a></li>";
            // else
            //     echo "<li><a href=\"Views/user_login.php\">Login</a></li>";
        ?>

    </ul>
</div> -->
<!-- <div class="main">
    <div class="content">
        <div class="search-title">
            <label>Search</label>
            <img src="images/search.png" alt="searchicon">
        </div>
        <div class="search-bar">
            <form action="Route/route.php" method="get">

                <input type="hidden" name="action" value="select">
                <input type="hidden" name="endpoint" value="globalsearch">

                <select name="searchCategory" id="searchCategory">
                    <option value="username">User Name</option>
                    <option value="articletitle">Article Title</option>
                </select>
                <input  type="text" name="searchInfo" id="searchInfo" placeholder="Input a keyword...">
                <button  type="submit" name="submit" value="search">Go</button>
            </form>
        </div>
    </div>
</div> -->
<!-- contain html footer
<div class="footer">
        <footer>
            &#174; CaseDeploy <br>
            <script>document.write('Last Modified: '+document.lastModified);</script>
        </footer>
    </div> -->

     <!-- *** Footer *** -->    
     <!-- <footer class="p-5 bg-dark text-white text-center position-relative">
        <div class="container">
            <p class="lead">Copyright &copy; CaseDeploy<br>
            &#174; CaseDeploy  
            <script>document.write('Last Modified: '+document.lastModified);</script>
            </p>
            <a href="#" class="position-absolute bottom-0 end-0 p-5">
                <i class="bi bi-arrow-up-circle h1"></i>
            </a>
        </div>
    </footer>
</body>
</html> -->


