<?php
    require_once "head.view.php";

    session_start();

    $uid = "";
    $prompt = "";
    if(isset($_SESSION['loginInput']))
    {
        $uid = $_SESSION['loginInput']['uid'];
    }

    if(isset($_GET['message']))
    {
        $message = $_GET['message'];
        switch($message ){
            case "InvalidUid":
                $prompt = "Invalid UserId or Email. Please try again.";
                break;

            case "InvalidPassword":
                $prompt = "Invalid Password. Please try again.";
                break;

            case "emptyinput":
                $prompt = "Login information can not be empty.";
                break;
        }
    }
?>

<!-- login section -->
<section class="bg-light p-5">
    <div class="container p-5">
        <div class="text-center m-5">
            <h1 >Sign In</h1>
            <label style="color:red"><?=$prompt?></label>
        </div>
        <form action="../Route/route.php" method="post" class="d-flex flex-column form-floating justify-content-center align-items-center">
            <!-- determine the route -->
            <input type="hidden" name="action" value="select">
            <input type="hidden" name="endpoint" value="userlogin">

            <div class="form-floating mb-2 w-40">
                <input type="email" class="form-control" id="floatingInput" name="userid_email" placeholder="UserId/Email" required value=<?=$uid?>>
                <label for="floatingInput">ID/Email address</label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <button class = "btn btn-primary btn-md" type="submit" name="submit">Sign in</button>
            <div>
                <a href="">Reset Password?</a>
                <a href="user_signup.php">Join</a>
            </div>
        </form>
    </div>
</section>

<?php     require_once "foot.view.php"; ?>
