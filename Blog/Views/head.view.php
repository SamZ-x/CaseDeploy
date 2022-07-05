<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <!-- <link rel="stylesheet" href="Views/CSS/blogstyle.css"> -->
    <!-- <link rel="stylesheet" href="Views/CSS/substyle-signup.css">
    <link rel="stylesheet" href="Views/CSS/substyle-article.css"> -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
        crossorigin="anonymous"
    >
    <link 
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    >
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
            <a href="../index.php" class="navbar-brand h1">Console.Blog</a>

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
                        <a href="../index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://www.casedeploy.com" class="nav-link">CaseDeploy</a>
                    </li>
                    <li class="nav-item">
                        <a href="../index.php" class="nav-link">Search</a>
                    </li>
                    <li class="nav-item">
                      <?php
                          if(isset($_SESSION['userid']))
                              echo "<a class=\"nav-link\" href=\"./user_show.php\">ID: ".$_SESSION['nickname']."</a>";
                          else
                              echo "<a class=\"nav-link\" href=\"./user_login.php\">Login / Join</a>";
                      ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>