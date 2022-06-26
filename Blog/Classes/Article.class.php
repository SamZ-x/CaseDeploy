<?php

//manipulate articles
class Article extends Dbh{

    //insert new article
    protected function Insert($dataArr){
        //query
        $sqlQuery = "INSERT INTO `Articles`(`title`, `UserId`, `description`, `markdown`, `sanitizedHtml`, `slug`) VALUES ( ?, ?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sqlQuery);
        //excute query, handle error
        if(!$stmt->execute([$dataArr['title'], $dataArr['UserId'],$dataArr['description'],$dataArr['markdown'],$dataArr['sanitizedHtml'],$dataArr['slug']])){
            $stmt = null;
            header("location: ../Views/blog_userpage_new.php?status=failed&error=databaseError");
            exit();
        }

        //if insert successfully, return result
        $stmt=null;
        return true;
    }

    protected function Retrieve($uid){
        //query
        $sqlQuery = "SELECT * FROM `Articles` WHERE UserId = ?;";
        $stmt = $this->connect()->prepare($sqlQuery);
        //excute query, handle error
        if(!$stmt->execute([$uid])){
            $stmt = null;
            header("location: ../Views/blog_userpage_new.php?status=failed&error=databaseError");
            exit();
        }
        //fetch all data, update session user data
        $data = $stmt->FETCHALL();
        $_SESSION['userdata']  = $data;

        //clear statment and exit
        $stmt = null;
        return true;
    }
}

