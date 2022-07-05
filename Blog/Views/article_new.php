<?php
    //if no user login, back to login page
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location: user_login.php");
        exit();
    }

    if(isset($_GET['status'])&&$_GET['status']=="new")
        $_SESSION['inputRecord'] = null;

    //log out
    if(isset($_GET['status'])&&$_GET['status']=="logout")
    {
        session_unset();
        session_destroy();
        header("location: blog_index.php");
        exit();
    }

    if(isset($_GET['status'])&&$_GET['status']=="failed")
    {
        $error = $_GET['error'];
        
        if($error=="inputEmpty")
            echo "<script>alert('Input can not be empty!');</script>";

        if($error=="databaseError")
            echo "<script>alert('System Error!');</script>";
    }

    require_once "head.view.php";
?>

    <!-- section1: user menu section -->
    <section class="pt-5 bg-primary pb-1">
      <div class="container p-3">
        <div class="d-flex align-items-center justify-content-center">
            <a href="./user_show.php" class="mx-2 btn btn-md btn-outline-success text-white border border-white">Back</a>
            <a href="#" class="mx-2 btn btn-md btn-outline-info text-white border border-white">Setting</a>
            <a href="user_show.php?status=logout" class="mx-2 btn btn-md btn-outline-info text-white border border-white">LogOut</a>
        </div>
      </div>  
    </section>

    <section class="p-3">
        <div class="container bg-secondary text-white">
            <form class=" p-2"action="../Route/route.php" method="post">
                <!-- determine the route -->
                <input type="hidden" name="action" value="insert">
                <input type="hidden" name="endpoint" value="article">
                
                <?php require_once "_form_field.php"; ?>
            </form>

        </div>

    </section>


<?php require_once "foot.view.php"; ?>