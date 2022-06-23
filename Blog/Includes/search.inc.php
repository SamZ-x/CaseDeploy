<?php

    //bridge between front-end and back-end
    //search only invoke data retrieve, return article data

    //submit button checck
    if(isset($_GET['submit']))
    {
        //get the search info
        $category = $_GET['searchCategory'];
        $keyword = $_GET['searchInfo'];

        //include class file and Instantiate searchview
        include "../Classes/Dbh.class.php";
        include "../Classes/Search.class.php";
        include "../Classes/SearchView.class.php";
        $search = new SeachView($category, $keyword);

        //run error handle and search data
        $data = $search->Searchdata();    //get the data array

        //start session to send the data
        session_start();
        $_SESSION['data'] = $data;

        //redirect
        header("location: ../Views/blog_show.php?status=done&error=none");
    }