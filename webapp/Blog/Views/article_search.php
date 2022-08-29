<?php session_start(); ?>

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
    <script src='../Js/article_search.js'></script>
  </head>

<?php require_once "./nav.view.php"; ?>

<!--  simple introduction seciton  -->         
<section class="bg-dark text-light pd-2  pb-md-2 pt-5 pt-md-5 text-center text-lg-start" id="intro">
      <div class="container">
        <div class="d-md-flex align-items-center justify-content-between">
            <div>
                <h1><span class="text-warning">MarkDown</span> Blog </h1>
                <p class="lead my-4">
                    A simple Blog using <b>PHP</b> scripts, with <b>Markdown</b> as content input language.<br>
                    This Blog is also using <b>LAMP Stack</b> and <b>MVC</b> design pattern. 
                </p>
                <!-- <button 
                    class="btn btn-primary btn-lg m-1"
                    data-bs-toggle="modal" 
                    data-bs-target="#enroll"
                >
                    Start To Deploy
                </button> -->
            </div>
            <img class="img-fluid w-25 mx-auto d-none d-sm-block" src="../images/markdown.png" alt="sign">
        </div>
      </div>  
    </section>

    <!-- main section -->
    <section class="bg-light p-5" id="searchbar">
        <div class="container p-5" id="searchbar_container">
            <div class="d-flex justify-content-center mb-4">
                <h1>Article Search</h1>
                <img src="../images/search.png" alt="searchicon">
            </div>
            <div class="d-flex justify-content-center">
                <select name="searchCategory" id="searchCategory" class="form-select search-option">
                    <option name="searchCategory" value="username">Author</option>
                    <option name="searchCategory" value="articletitle">Article</option>
                </select>

                <input  class="form-contol w-50 mr-2" type="text" name="searchInfo" id="searchInfo" placeholder="Input a keyword...">
                <button class="btn btn-primary btn-md" type="submit" name="submit" value="search">Go</button>
            </div> 
        </div>
    </section>

<?php
    require_once "./_articles.php";
    require_once "./footer.view.php";
?>
