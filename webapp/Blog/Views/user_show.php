<?php
    //if no user login, back to login page
    session_start();

    if(!isset($_SESSION['userid'])){
        header("location: user_login.php");
        exit();
    }

    //log out
    if(isset($_GET['status'])&&$_GET['status']=="logout")
    {
        session_unset();
        session_destroy();
        header("location: ../index.php");
        exit();
    }

    //if login successfully
    $userData = "";
    if(isset($_SESSION['userdata'])){
        $userData = $_SESSION['userdata'];
    }

    // if(isset($_GET['status'])&&$_GET['status']=="failed")
    // {
    //     $error = $_GET['error'];
        
    //     if($error=="databaseError")
    //         echo "<script>alert('Update article list error!');</script>";
    // }
    
    require_once "head.view.php";
?>

    <!-- section1: user menu section -->
    <section class="pt-5 bg-primary pb-1">
      <div class="container p-3">
        <div class="d-flex align-items-center justify-content-center">
            <a href="./article_new.php" class="mx-2 btn btn-md btn-outline-success text-white border border-white">Create</a>
            <a href="#" class="mx-2 btn btn-md btn-outline-info text-white border border-white">Setting</a>
            <a href="user_show.php?status=logout" class="mx-2 btn btn-md btn-outline-info text-white border border-white">LogOut</a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-info text-white border border-white" type="submit">Search</button>
            </form>
        </div>
      </div>  
    </section>

    <!-- section2: user's acticles section -->
    <section class="p-3">
        <div class="container">
            <div class="row row-cols-2 g-2 text-center">
            <?php
            //iterate all retrieved article
            //fill into the template
            if(!empty($userData)){
                foreach($userData as $article)
                {
                    //style head
                    echo "<div class=\"col-md-6 \"><div class=\"card bg-light h-100\"><div class=\"card-body text-start\"><h2 class=\"card-title mb-2\">";
                    //display title
                    echo $article['title']."</h2>";
                    //display subtitle
                    echo "<p class=\"card-text\">".$article['createdAt']."<a class=\"mx-2\"href=\"\">".$article['Firstname']."</a></p>";
                    //display description
                    echo "<p class=\"card-text\">".$article['description']."</p>";
                    //display the button and close tag
                    echo "<a class = \"btn btn-primary mx-1\" href=\"\">Read More</a><a class = \"btn btn-primary mx-1\" href=\"\">Edit</a></div></div></div>";
                }
            }
            else
                echo "<div class=\"col-md-12 p-5\"><h1>Oop! No articles!</h1></div>"
            ?>

        </div>
    </section>

<?php require_once "foot.view.php"; ?>
