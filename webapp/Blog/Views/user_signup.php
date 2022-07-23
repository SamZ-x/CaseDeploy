<?php
    require_once "head.view.php";
?>
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
                <input type="hidden" name="action" value="insert">
                <input type="hidden" name="endpoint" value="user">

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
                        <option value="1">CA</option>
                        <option value="2">USA</option>
                    </select>
                </div>
                <div class="text-center mt-5">
                    <input class="me-2" type="checkbox" name="agreement"><label>I agree to <a href="">terms of service.</a></label>
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
    <?php require_once "foot.view.php"; ?>
