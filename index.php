<!-- 
    homepage 
    navigation page to each cases/projects
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CaseDeploy</title>
    <link rel="shortcut icon" href="./images/favicon_io/favicon.ico" type="image/x-icon" />
    <!-- CSS only -->
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
<body>
    <!-- a collapse navbar -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
        <div class="container">
            <a href="./" class="navbar-brand h1">CaseDeploy</a>
            
            <!-- open button for collapsed menu display less then breakpoint md(768px) -->
            <button 
                class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navmenu"
            >
            <span class="navbar-toggler-icon"></span>
            </button>

            <!-- menu content -->
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="./" class="nav-link">Home</a>
                    </li>
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
                            Category
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#category-webapp">Web Application</a></li>
                            <li><a class="dropdown-item" href="#category-winform">Win Form Application</a></li>
                            <li><a class="dropdown-item" href="#category-api">APIs</a></li>
                            <!-- <li><a class="dropdown-item" href="#">IOTs</a></li> -->
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="./webapp/Blog" class="nav-link">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                </ul>
                <!-- search bar for in page text search -->
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>    
    </nav>

    <!-- *** simple introduction seciton *** -->         
    <section class="bg-dark text-light pd-3 pb-md-0 pt-5 pt-md-5 text-center text-lg-start">
      <div class="container">
        <div class="d-md-flex align-items-center justify-content-between">
            <div>
                <h1>My <span class="text-warning">projects</span> deploy center </h1>
                <p class="lead my-4">
                    A place for demonstrating the learning projects. 
                </p>
                <!-- <button 
                    class="btn btn-primary btn-lg m-1"
                    data-bs-toggle="modal" 
                    data-bs-target="#enroll"
                >
                    Start To Deploy
                </button> -->
            </div>
            <img class="img-fluid w-25 mx-auto d-none d-sm-block" src="images/sign.png" alt="sign">
        </div>
      </div>  
    </section>


    <!-- *** Web application section  *** -->    
    <section class="bg-primary text-light p-3" id="category-webapp">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="mb-md-0">Web Application</h3>
            </div>
        </div>
    </section>

    <!-- *** content *** -->   
     <!-- display as card style -->
    <section class="p-4">
        <div class="container">
            <div class="row text-center gy-4 d-flex">
                <!-- column change break point md -->
                <!-- bg: drak/light -->
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-people"></i>
                            </div>
                            <h3 class="card-title mb-3">
                                MarkDown Blog
                            </h3>
                            <p class="card-text">
                                Use MVC and OOP to build a simple blog
                            </p>
                            <a href="#" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                <div class="card bg-secondary text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-laptop"></i>
                            </div>
                            <h3 class="card-title mb-3">
                                Defect/Bug Tracker
                            </h3>
                            <p class="card-text">
                                Defect tracking system for projects ffgd
                            </p>
                            <a href="#" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md d-none">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-people"></i>
                            </div>
                            <h3 class="card-title mb-3">
                                what
                            </h3>
                            <p class="card-text">
                                just some wired text what do tyou 
                                poT4dfsjj wheh
                                ajisjdif
                            </p>
                            <a href="#" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- web application text -->    
     <section id="learn" class="p-5 bg-light">
        <div class="container">
            <div class="row align-items-center justify-content-bewteen">
                <div class="col-md p-5">
                    <img src="images/coding.jpg" alt="coding" class="img-fluid">
                </div>
                <div class="col-md p-5">
                    <h2 class="mb-5">Techniques in Web App projects</h2>
                    <p class="lead"><span class="fw-bold"> Language: </span>  HTML, CSS, JavaScript, PHP, MarkDown</p>
                    <p class="lead"><span class="fw-bold"> Deploy:</span>  (Azure) Ubuntu 22.04, Apache 2.4.29</p>
                    <p class="lead"><span class="fw-bold"> Datebase: </span> MySQL MongoDB</p>
                    <p class="lead"><span class="fw-bold"> Framework: </span> Bootstrap, Node.js, express</p>
                </div>
            </div>
        </div>
    </section>


        <!-- *** APIs section  *** -->    
    <section class="bg-primary text-light p-3" id="category-api">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="mb-md-0"> APIs</h3>
            </div>
        </div>
    </section>

    <!-- *** content *** -->   
     <!-- display as card style -->
    <section class="p-4">
        <div class="container">
            <div class="row text-center gy-4 d-flex">
                <!-- column change break point md -->
                <!-- bg: drak/light -->
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-collection"></i>
                            </div>
                            <h3 class="card-title mb-3">
                                WorldCoutry API
                            </h3>
                            <p class="card-text">
                                Provide basic country information 
                            </p>
                            <a href="./APIs/index.php" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-collection"></i>
                            </div>
                            <h3 class="card-title mb-3">
                                Other API
                            </h3>
                            <p class="card-text">
                                upcoming....
                            </p>
                            <a href="" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- web application text -->    
     <section id="learn" class="p-5 bg-light">
        <div class="container">
            <div class="row align-items-center justify-content-bewteen">
                <div class="col-md p-5">
                    <h2 class="mb-5">Techniques in API projects</h2>
                    <p class="lead"><span class="fw-bold"> Language: </span> JavaScript, PHP</p>
                    <p class="lead"><span class="fw-bold"> Design Pattern:</span> MVC </p>
                    <p class="lead"><span class="fw-bold"> Datebase: </span> MySQL, MongoDB</p>
                    <p class="lead"><span class="fw-bold"> Framework: </span> Node.js, express</p>
                </div>
                <div class="col-md p-5">
                    <img src="images/coding.jpg" alt="coding" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- *** Win Form application section *** -->  
    <section class="bg-primary text-light p-3" id="category-winform">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="mb-md-0">Win Form Application</h3>
            </div>
        </div>
    </section>

    <!-- content -->
    <section class="p-4">
        <div class="container">
            <div class="row text-center gy-4 d-flex">
                <!-- column change break point md -->
                <!-- bg: drak/light -->
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-people"></i>
                            </div>
                            <h3 class="card-title mb-3">
                                Serial Port Terminal
                            </h3>
                            <p class="card-text">
                                A data reciever for MCU and PC via serial port protacol.
                            </p>
                            <a href="./wfapp/sci" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                <div class="card bg-secondary text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-laptop"></i>
                            </div>
                            <h3 class="card-title mb-3">
                                upcoming...
                            </h3>
                            <p class="card-text">
                                upcoming...
                            </p>
                            <a href="#" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Win Form application text -->    
    <section id="learn" class="p-5 bg-dark">
        <div class="container">
            <div class="row align-items-center justify-content-bewteen text-light">
            <div class="col-md p-5">
                    <img src="images/coding.jpg" alt="coding" class="img-fluid">
                </div>
                <div class="col-md p-5">
                    <h2 class="mb-5">Techniques in WFA projects</h2>
                    <p class="lead"><span class="fw-bold"> Language: </span> C#</p>
                    <p class="lead"><span class="fw-bold"> Platform:</span>  Windows</p>
                    <p class="lead"><span class="fw-bold"> Datebase: </span> MySQL, SQL server</p>
                    <p class="lead"><span class="fw-bold"> Framework: </span> .NET</p>
                </div>
            </div>
        </div>
    </section>  

    <!-- *** About section *** -->  
    <section class="bg-primary text-light p-3" id="about">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="mb-md-0">About</h3>
            </div>
        </div>
    </section>

    <!-- *** content *** --> 
    <section class="p-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <img src="images/pic_profile.jpg" class="rounded-circle mb-3" alt="pic">
                            <h3 class="card-title mb-3">Xiaobin Zhu</h3>
                            <p class="card-text">
                                Computer Engineering Technology
                            </p>
                            <a href="www.linkedin.com/in/xiaobin-zhu-82a177152"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                            <a href="https://github.com/SamZ-x"><i class="bi bi-github text-dark mx-1"></i></a>
                            <!-- <a href=""><i class="bi bi-facebook text-dark mx-1"></i></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <h2 class="ms-3 mb-4">Contact</h2>
                    <ul class="list-group list-group-flush lead">
                        <li class="list-group-item">
                            <span class="fw-bold"> Main location: </span>  Edmonton, AB
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold"> phone: </span>  (780)-708-6648
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold"> Email: </span>  sam.zhu992@gmail.com
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
       
     <!-- *** Footer *** -->    
    <footer class="p-5 bg-dark text-white text-center position-relative">
        <div class="container">
            <p class="lead">Copyright &copy; CaseDeploy<br>
            <!-- &#174; CaseDeploy  -->
            <script>document.write('Last Modified: '+document.lastModified);</script>
            </p>
            <a href="./home.php" class="position-absolute bottom-0 end-0 p-5">
                <i class="bi bi-arrow-up-circle h1"></i>
            </a>
        </div>
    </footer>


    <!-- Sign up Modal (not finish) -->
    <!-- <div class="modal fade" id="enroll" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="enroll">Sign Up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form >
                        <div class="mb-3">
                            <label for="first-name" class='col-form-label'> Username: </label>
                            <input type="text" class="form-control" id="first-name">
                        </div>
                        <div class="mb-3">
                            <label for="first-name" class='col-form-label'> Password: </label>
                            <input type="text" class="form-control" id="first-name">
                        </div>
                        <div class="mb-3">
                            <label for="first-name" class='col-form-label'> re-Password: </label>
                            <input type="text" class="form-control" id="first-name">
                        </div>
                        <div class="mb-3">
                            <label for="first-name" class='col-form-label'> Email: </label>
                            <input type="text" class="form-control" id="first-name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">submit</button>
                </div>
            </div>
        </div>
    </div> -->

</body>
</html>