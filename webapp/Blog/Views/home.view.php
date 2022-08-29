<!--  simple introduction seciton  -->         
<section class="bg-dark text-light pd-2  pb-md-2 pt-5 pt-md-5 text-center text-lg-start" id="intro">
      <div class="container">
        <div class="d-md-flex align-items-center justify-content-between">
            <div>
                <h1><span class="text-warning">MarkDown</span> Blog </h1>
                <p class="lead my-4">
                    A simple Blog using <b>PHP</b> scripts, with <b>Markdown</b> as content input language.<br>
                    Using <b>LAMP Stack</b> and <b>MVC</b> design pattern. 
                </p>
                <!-- <button 
                    class="btn btn-primary btn-lg m-1"
                    data-bs-toggle="modal" 
                    data-bs-target="#enroll"
                >
                    Start To Deploy
                </button> -->
            </div>
            <img class="img-fluid w-25 mx-auto d-none d-sm-block" src="./images/markdown.png" alt="sign">
        </div>
      </div>  
    </section>

<!--  desc section   -->    
<section class="bg-white text-black p-5" >
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h3 class="mb-md-0">home page desc section...</h3>
        </div>
    </div>
</section>

   <!--  Demo access section  ** -->    
   <section class="bg-primary text-light p-3" >
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="mb-md-0">Demo Roles Access</h3>
            </div>
        </div>
    </section>

    <!-- access section  -->
    <section class="bg-secondary p-5">
        <div class="container">
            <div class="row text-center gy-4 d-flex">
                <div class="col-md">
                <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-people"></i>
                            </div>
                            <h3 class="card-title mb-3">
                                Manager
                            </h3>
                            <p class="card-text">
                                Login as manager account
                            </p>
                            <form action="./Route/route.php" method="post">
                                <!-- determine the route -->
                                <input type="hidden" name="action" value="select">
                                <input type="hidden" name="endpoint" value="userlogin">
                                <input type="hidden" name="userid_email" value="demo_manager_ad@gmail.com">
                                <input type="hidden" name="password" value="ad">
                                <button type="submit" class="btn btn-primary">Go</button>
                            </form>
                            <!-- <a href="#" class="btn btn-primary" id="demo_manager_login">Go</a> -->
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <i class="bi bi-people"></i>
                            </div>
                            <h3 class="card-title mb-3">
                                User
                            </h3>
                            <p class="card-text">
                                Login as user account
                            </p>
                            <form action="./Route/route.php" method="post">
                                <!-- determine the route -->
                                <input type="hidden" name="action" value="select">
                                <input type="hidden" name="endpoint" value="userlogin">
                                <input type="hidden" name="userid_email" value="demo_user_jm@gmail.com">
                                <input type="hidden" name="password" value="jm">
                                <button type="submit" class="btn btn-primary">Go</button>
                            </form>
                            <!-- <a href="#" class="btn btn-primary">Go</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
