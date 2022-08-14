<?php
    //index page (home page of the blog)
    session_start();

    // $status = "";
    // $error = "";
    
    // if(isset($_GET['status']))
    // {
    //     $status = $_GET['status'];
    //     $message = $_GET['message'];
        
    //     if($message=="inputEmpty")
    //         echo "<script>alert('Please Input a keyword!');</script>";
        
    //     if($message=="databaseError")
    //         echo "<script>alert('System Error!');</script>";

    //     if($message=="dataEmpty")
    //         echo "<script>alert('No relative article!');</script>";
    // }
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
    <script 
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    >
    </script>
    

  </head>
<!-- <body  class = "blogsite"> -->
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
        <div class="container">
            <a href="./index.php" class="navbar-brand site-title">Console.Blog</a> -->

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
                        <a href="./Views/article_search.php" class="nav-link">Search</a>
                    </li>
                    <li class="nav-item">
                      <?php
                          if(isset($_SESSION['loginRes']))
                              echo "<a 
                                    class=\"nav-link\" 
                                    href=\"Views/account.view.php\">
                                        <span class=\"text-warning\">User: "
                                        .$_SESSION['loginRes']['nickname']
                                        ."</span>
                                    </a>";
                          else
                              echo "<a 
                                    class=\"nav-link\" 
                                    href=\"Views/user_login.php\">
                                        <span class=\"text-warning\">Login / Join</span>
                                    </a>";
                      ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<?php
    require_once "Views/home.view.php";
    require_once "Views/footer.view.php";
?>

