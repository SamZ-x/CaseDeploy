<?php
    // require_once "head.view.php";

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

<?php  require_once "footer.view.php"; ?>
