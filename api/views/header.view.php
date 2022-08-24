<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Country API</title>
    <link rel="stylesheet" href="../css/api.style.min.css">
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
            <a href="../index.php" class="navbar-brand site-title">APIs</a>

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
                    <!-- dropdown menu item -->
                    <li class="nav-item dropdown">
                        <a 
                            class="nav-link dropdown-toggle" 
                            href="#" 
                            id="navbarDropdown" 
                            role="button" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false"
                        >
                            API
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#api-worldcountry">World Country</a></li>
                            <li><a class="dropdown-item" href="#">other 1</a></li>
                            <li><a class="dropdown-item" href="#">other 2</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="../" class="nav-link">CaseDeploy</a>
                    </li>
                    <li class="nav-item">
                        <a href="../webapp/Blog" class="nav-link">Console.Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Search</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
     <!-- *** simple introduction seciton *** -->         
    <section class="shortdesciption text-white pd-2  pb-md-2 p-4 pt-md-5 text-center text-lg-start">
      <div class="container">
        <div class="d-md-flex align-items-center justify-content-between">
            <div>
                <h2><span class="text-warning">Mulitple APIs </span>  </h2>
                <p class="lead my-2">
                Include: world country API - <a class="text-white" href="https://github.com/SamZ-x/worldcountryAPI">GitHub</a> 
                </p>
            </div>
            <img class="img-fluid mx-auto d-none d-sm-block" src="images/APIsign.png" alt="sign">
        </div>
      </div>  
    </section>