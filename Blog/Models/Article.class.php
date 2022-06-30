<?php

//manipulate articles
class Article extends Dbh{

    /************************* SELECT ******************************/

    //function : Retrieve_globalSearch
    //take 2 parameters :'category', 'keyword'
    //retrieve data from database table 'Articles' base on the 'category' and'keyword'
    protected function Retrieve_globalSearch($category, $keyword){
            
        //create query base on the category
        if($category == "username"){
            $sqlQuery = "SELECT * FROM `Articles` a JOIN `Users` u ON a.UserId = u.UserId ";
            $sqlQuery .= "WHERE u.Firstname LIKE '%' ? '%' OR u.Lastname LIKE '%' ? '%' OR u.Middlename LIKE '%' ? '%'";
            //fill the query with parameters
            $stmt = $this->connect()->prepare($sqlQuery);
            $status = $stmt->execute([$keyword, $keyword, $keyword]);
        }

        if($category == "articletitle"){
            $sqlQuery = "SELECT * FROM `Articles` a JOIN `Users` u ON a.UserId = u.UserId ";
            $sqlQuery .= "WHERE a.Title LIKE '%' ? '%'";

            //fill the query with parameters
            $stmt = $this->connect()->prepare($sqlQuery);
            $status = $stmt->execute([$keyword]);
        }
        
        //Error hanlde
        //if query execute error, back to index page with error message
        if(!$status){
            $stmt=null;
            header("location: ../index.php?status=failed&error=databaseError");
            exit();
        }
        //otherwise
        $result = $stmt->FETCHALL();    //return associate array/empty object.
        
        // //no related data, return dataEmpty message
        // if(empty($result)){
        //     $stmt=null;
        //     header("location: ../index.php?status=dataEmpty&error=none");
        //     exit();
        // }

        //if successfully retrieve data, clear the statment and return
        $stmt=null;
        return $result;
    }

    //function : Retrieve_localSearch
    //take 2 parameters :'category', 'keyword'
    //retrieve data from database table 'Articles' base on the 'category' and'keyword'
    protected function Retrieve_localSearch($userid, $keyword){
            
        //run database query
        $sqlquery = "SELECT * FROM `Articles` a JOIN `Users` u ON a.UserId = u.UserId WHERE a.UserId = ? AND a.title LIKE '%' ? '%';";
        $stmt = $this->connect()->prepare($sqlquery);
        //$status = $stmt->execute([$uid]);

        //if database statment return false, redirect with error
        if(!$stmt->execute([$userid, $keyword])){
            $stmt = null;
            header("location: ../Views/blog_userpage.php?error=stmterror");
            exit();
        }

        //otherwise
        $result = $stmt->FETCHALL();    //return associate array/empty object.

        // //start session to send the data
        // $_SESSION['userdata'] = $result;

        //if successfully retrieve data, clear the statment and return
        $stmt=null;
        return $result;
    }
    
    //function : Insert
    //take 1 parameters :'dataArr' (contain all article info)
    //insert data into database table 'Articles'
    protected function Insert($dataArr){
        //query
        $sqlQuery = "INSERT INTO `Articles`(`title`, `UserId`, `description`, `markdown`, `sanitizedHtml`, `slug`) VALUES ( ?, ?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sqlQuery);
        
        //excute query, handle error
        if(!$stmt->execute([$dataArr['title'], $dataArr['userid'], $dataArr['description'], $dataArr['markdown'], $dataArr['sanitizedhtml'], $dataArr['slug']])){
            
            //pass input record if insert failed
            $inputRecord = array(
                "title" => $dataArr['title'],
                "description" => $dataArr['description'], 
                "markdown" => $dataArr['markdown']
            );
            $_SESSION['inputRecord'] = $inputRecord;
            
            $stmt = null;
            header("location: ../Views/article_new.php?status=failed&error=databaseError");
            exit();
        }

        //clear the $statement
        $stmt=null;
    }

    protected function Retrieve($uid){
        //query
        $sqlQuery = "SELECT * FROM `Articles` a JOIN `Users` u ON a.UserId = u.UserId WHERE a.UserId = ?;";
        $stmt = $this->connect()->prepare($sqlQuery);
        //excute query, handle error
        if(!$stmt->execute([$uid])){
            $stmt = null;
            header("location: ../Views/blog_userpage.php?status=failed&error=databaseError");
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

