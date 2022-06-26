<?php
//************** Note *****************//
//Article fields: `articleId`, `title`, `createdAt`, `UserId`, `description`, `markdown`, `sanitizedHtml`, `slug`
//fill all fields except `articleId`, `createdAt`
//user input: title, description, markdown text
//function generate: `sanitizedHtml`, `slug`
//****************************//

    if(isset($_POST['submit'])){

        //retrieve data
        $title = $_POST['title'];
        $description = $_POST['title'];
        $markdown = $_POST['markdown'];

        //Instantiate articleContr class
        include "../Classes/Dbh.class.php";
        include "../Classes/ArticleContr.class.php";
        $article = new ArticleContr($title, $description, $markdown );

        //Running Error handlers and article function
        $article->AddArticle();

        //Instantiate articleView class to retrieve the lastest collection
        include "../Classes/ArticleView.class.php";
        $uid = $_SESSION['userid'];
        $articles = new ArticleView($uid );
        $articles->getArticles();

        //redirect if success=fully insert
        header("location: ../Views/blog_userpage.php?status=inserted&error=none");
    }
