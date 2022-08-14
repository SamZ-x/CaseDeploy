<?php
    //if no user login, back to login page
    session_start();

    if(!isset($_SESSION['loginRes'])){
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
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../../../css/blog.style.min.css">
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
    <script src='../Js/account.js'></script>
  </head>

  <?php require_once "./nav.view.php"; ?>

    <!-- section1: user menu section -->
    <section class="pt-5 bg-primary pb-1">
      <div class="container p-3">
        <div class="d-flex align-items-center justify-content-center">
            <a href="./article_new.php?status=new" class="mx-2 btn btn-md btn-outline-info text-white border border-white">Create</a>
            <a href="#" class="mx-2 btn btn-md btn-outline-info text-white border border-white">Setting</a>
            <a href="account.view.php?status=logout" class="mx-2 btn btn-md btn-outline-info text-white border border-white">LogOut</a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-info text-white border border-white" type="submit">Search</button>
            </form>
        </div>
      </div>  
    </section>

<?php
    require_once "./_articles.php";
    require_once "./footer.view.php";
?>

