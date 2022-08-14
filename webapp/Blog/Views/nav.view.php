<body class="d-flex flex-column min-vh-100" >
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top ">
        <div class="container">
            <a href="../index.php" class="navbar-brand site-title">Console.Blog</a>

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
                        <a href="https://www.casedeploy.com" class="nav-link">CaseDeploy</a>
                    </li>
                    <li class="nav-item">
                        <a href="./article_search.php" class="nav-link">Search</a>
                    </li>
                    <li class="nav-item">
                      <?php
                          if(isset($_SESSION['loginRes']))
                              echo "<a 
                                    class=\"nav-link\" 
                                    href=\"account.view.php\" 
                                    id = \"loginId\" 
                                    value = \"".$_SESSION['loginRes']['userid']."\">
                                        <span class=\"text-warning\">User: "
                                        .$_SESSION['loginRes']['nickname']
                                        ."</span>
                                    </a>";
                          else
                              echo "<a 
                                    class=\"nav-link\" 
                                    href=\"user_login.php\">
                                        <span class=\"text-warning\">Login / Join</span>
                                    </a>";
                      ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>