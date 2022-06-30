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
<div class = "navbar">
    <ul>
        <li><a href="">Back</a></li>
        <li><a href="../index.php">search</a></li>
        <li><a href="../../home.php">home</a></li>
        <li><a href="user_show.php?status=logout">Log Out: <?= $_SESSION['nickname'];?></a></li>
    </ul>
</div>
<div class="main">
    <div class="content">
        <form class="artarticle-new" action="../Route/route.php" method="post">
            <!-- determine the route -->
            <input type="hidden" name="action" value="insert">
            <input type="hidden" name="endpoint" value="article">

            <?php
                require_once "_form_field.php";
            ?>
        </form>
    </div>
</div>
<?php     require_once "foot.view.php"; ?>