<?php
    require_once "../Lib/Oauth.php";

    session_start();

    //Login with Github
    if(isset($_GET["code"]) && strlen($_GET["code"])>0)
    {
        //get code from Authorization server
        $code = $_GET["code"];
        
        //get token from Authorization server and extract info
        $tokenStr = GetToken($code);
        $accesstoken = explode('&', $tokenStr)[0];
        //(bad code) failed to get token
        if(!str_starts_with($accesstoken, 'access_token')){
            header("location: ./user_login.php");
            die();
        }
        $token = explode('=', $accesstoken)[1];
        //get resource from Resource server
        $user = json_decode(GetOauthUser($token), true);


        //redirection
        if($user){
            //create user if not exist in database
            //or pull user info from database
            $oAuth_uid = $user['id'];
            $nickname = $user['login'];
            $user = json_decode(loginUser($oAuth_uid, $nickname), true)['data'];
            $Response = array(
                "userid" => $user['UserId'],
                "nickname" => $user['NickName'],
                "roleid" => $user['RoleId'],
                "loginstatus" => "login"
            );
            $_SESSION['loginRes'] = $Response;
            header("location: ./account.view.php");
            die();
        }
    }
   
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
    <link 
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    >
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
                <input type="hidden" name="action" value="login">
                <input type="hidden" name="endpoint" value="user">

                <div class="form-floating mb-2 w-40">
                    <input type="email" class="form-control" id="floatingInput" name="useremail" placeholder="Email" required value=<?=$uid?>>
                    <label for="floatingInput">Email address</label>
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
            <div class="d-flex flex-row justify-content-center p-2">
                <a  href="https://github.com/login/oauth/authorize?client_id=4890993edc61fa32aaca"><i class="bi bi-github"></i></a>
            </div>
        </div>
    </section>

<?php  require_once "footer.view.php"; ?>
