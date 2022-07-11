    <!-- *** simple introduction seciton *** -->         
    <section class="bg-dark text-light pd-2  pb-md-2 pt-5 pt-md-5 text-center text-lg-start">
      <div class="container">
        <div class="d-md-flex align-items-center justify-content-between">
            <div>
                <h1><span class="text-warning">MarkDown</span> Blog </h1>
                <p class="lead my-4">
                    A simple blog with markdown as input content. 
                </p>
                <!-- <button 
                    class="btn btn-primary btn-lg m-1"
                    data-bs-toggle="modal" 
                    data-bs-target="#enroll"
                >
                    Start To Deploy
                </button> -->
            </div>
            <img class="img-fluid w-25 mx-auto d-none d-sm-block" src="images/markdown.png" alt="sign">
        </div>
      </div>  
    </section>

    <!-- main section -->
    <section class="bg-light p-5" id="searchbar">
        <div class="container p-5">
            <div class="d-flex justify-content-center mb-4">
                <h1>Article Search</h1>
                <img src="images/search.png" alt="searchicon">
            </div>
            <form action="Route/route.php" method="get" class="d-flex justify-content-center">
                <!-- determine the route -->
                <input type="hidden" name="action" value="select">
                <input type="hidden" name="endpoint" value="globalsearch">
                
                <select name="searchCategory" id="searchCategory" class="form-select search-option">
                    <option value="username">User Name</option>
                    <option value="articletitle">Article Title</option>
                </select>

                <input  class="form-contol w-50 mr-2" type="text" name="searchInfo" id="searchInfo" placeholder="Input a keyword...">
                <button class="btn btn-primary btn-md" type="submit" name="submit" value="search">Go</button>
            </form>
        </div>
    </section>

    <!-- *** Demo access section  *** -->    
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
                            <a href="#" class="btn btn-primary">Go</a>
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
                            <a href="#" class="btn btn-primary">Go</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
