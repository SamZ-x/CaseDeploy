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
        //redirect
        
    }
