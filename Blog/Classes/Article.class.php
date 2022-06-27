<?php

//manipulate articles
class Article extends Dbh{

    //insert new article
    protected function Insert($dataArr){
        //query
        $sqlQuery = "INSERT INTO `Articles`(`title`, `UserId`, `description`, `markdown`, `sanitizedHtml`, `slug`) VALUES ( ?, ?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sqlQuery);
        error_log("uid(article class) : ".$dataArr['userid'] );
        //excute query, handle error
        if(!$stmt->execute([$dataArr['title'], $dataArr['userid'], $dataArr['description'], $dataArr['markdown'], $dataArr['sanitizedhtml'], $dataArr['slug']])){
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
        $sqlquery = "SELECT * FROM `Articles` a JOIN `Users` u ON a.UserId = u.UserId WHERE a.UserId = ?;";
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

