<?php
    require_once "head.view.php";
?>

<!-- login section -->
<section class="bg-light p-5">
    <div class="container p-5">
        <div class="text-center m-5">
            <h1 >Sign In</h1>
        </div>
        <form action="../Route/route.php" method="post" class="d-flex flex-column form-floating justify-content-center align-items-center">
            <!-- determine the route -->
            <input type="hidden" name="action" value="select">
            <input type="hidden" name="endpoint" value="userlogin">

            <div class="form-floating mb-2 w-40">
                <input type="email" class="form-control" id="floatingInput" name="userid_email" placeholder="UserId/Email">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
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
