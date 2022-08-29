<?php
 //   require_once "head.view.php";
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
    <script src="../Js/signup.js"></script>
  </head>

  <?php require_once "./nav.view.php"; ?>

<section class = "p-5">
    <div class="container text-center mx-auto">
        <div class="d-flex flex-column ">
                <label class="text-lg-center md-2 site-subtitle">Provide some details for your blog</label>
                <label  class="text-md-center mt-2">You can always change this later on.</label>
        </div>
        <hr size="1" width="100%" color="grey">
        <div class="d-flex flex-row ">
            <form action="../Route/route.php" method="post">
                <!-- determine the route -->
                <input type="hidden" name="action" value="register">
                <!-- <input type="hidden" name="endpoint" value="user"> -->

                <div class="blog_signup_item">
                    <label  >Firstname</label>
                    <input class="form-control" type="text" name="firstname" placeholder="First Name">
                </div>
                <div class="blog_signup_item">
                    <label >Lastname</label>
                    <input class="form-control" type="text" name="lastname" placeholder="Last Name">
                </div>
                <div class="blog_signup_item">
                    <label >Nickname</label>
                    <input class="form-control" type="text" name="nickname" placeholder="NickName">
                </div>
                <div class="blog_signup_item">
                    <label >E-mail</label>
                    <input class="form-control" type="email" name="email" placeholder="E-mail">
                </div>
                <div class="blog_signup_item">
                    <label >Password</label>
                    <input class="form-control" type="password" name="password" placeholder="password">
                </div>
                <div class="blog_signup_item">
                    <label >Phone</label>
                    <input class="form-control" type="tel" name="phone" placeholder="000-000-0000">
                </div>
                <div class="blog_signup_item">
                    <label>Region</label>
                    <select class="form-select " name="Region">
                        <option value="none">Please Select</option>
                    </select>
                </div>
                <div class="text-center mt-5">
                    <input class="me-2" type="checkbox" name="agreement" required><label>I agree to <a href="">terms of service.</a></label>
                </div>    
                <button class="btn btn-primary w-100 mt-2 " type="submit" name="submit">Join</button>

            </form>
            <div class="d-flex justify-content-center align-items-center">
                <img src="../images/welcome.jpg" alt="welcome" class="img-fluid d-none d-md-block ms-5">
            </div>
        </div>
        <hr size="1" width="100%" color="grey">
    </div>

    </section>
   
            <label ></label>

        </div>
    </div>
    <?php require_once "footer.view.php"; ?>
