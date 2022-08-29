<?php
    //if no user login, back to login page
    session_start();
    if(!isset($_SESSION['loginRes'])){
        header("location: user_login.php");
        exit();
    }
    
    if(isset($_GET['articleId'])&&strlen($_GET['articleId'])>0){
        $articleId = $_GET['articleId'];
    }

    if(isset($_GET['status'])&&$_GET['status']=="new")
        $_SESSION['inputRecord'] = null;


    if(isset($_GET['status'])&&$_GET['status']=="failed")
    {
        $message = $_GET['message'];
        
        if($message=="InputEmpty")
            echo "<script>alert('Input can not be empty!');</script>";

        if($message=="InteralError")
            echo "<script>alert('Interal Error! Try again later.');</script>";
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
    <script src='../Js/article_edit.js'></script>
  </head>

  <?php require_once "./nav.view.php"; ?>

    <!-- section1: user menu section -->
    <section class="pt-5 bg-primary pb-1">
      <div class="container p-3">
        <div class="d-flex align-items-center justify-content-center">
            <a href="./account.view.php" class="mx-2 btn btn-md btn-outline-success text-white border border-white">Back</a>
            <a href="#" class="mx-2 btn btn-md btn-outline-info text-white border border-white">Setting</a>
            <a href="account.view.php?status=logout" class="mx-2 btn btn-md btn-outline-info text-white border border-white">LogOut</a>
        </div>
      </div>  
    </section>

    <section class="p-3">
        <div class="container bg-secondary text-white">
            <form class="p-2" action="../Route/route.php" method="post">
                <!-- determine the route -->
                <input type="hidden" name="action" value="editArticle">
                <input type="hidden" name="articleid" value=<?=$articleId?>>
                <!-- <input type="hidden" name="endpoint" value="article"> -->
                
                <?php require_once "_form_field.php"; ?>
            </form>

        </div>
    </section>

<?php require_once "footer.view.php"; ?>