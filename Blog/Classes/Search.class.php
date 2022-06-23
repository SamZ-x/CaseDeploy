<?php

    //Search model interact withd database
    //provide function for SearchView
    class Search extends Dbh{

        //retrieve data from database
        protected function GetData($category, $keyword){
            
            //create query base on the category
            if($category == "username"){
                $sqlQuery = "SELECT * FROM `Articles` a JOIN `Users` u ON a.UserId = u.UserId ";
                $sqlQuery .= "WHERE u.Firstname LIKE '%?%' OR u.Lastname LIKE '%?%' OR u.Middlename LIKE '%?%'";
                
                $stmt = $this->connect()-prepare($sqlQuery);
                $status = $stmt->execute([$keyword, $keyword, $keyword]);
            }

            if($category == "articletitle"){
                $sqlQuery = "SELECT * FROM `Articles` a JOIN `Users` u ON a.UserId = u.UserId ";
                $sqlQuery .= "WHERE a.Title LIKE '%?%'";

                $stmt = $this->connect()-prepare($sqlQuery);
                $status = $stmt->execute([$keyword]);
            }
            
            //Error hanlde
            //if query execute error, back to index page with error message
            if(!$status){
                $stmt=null;
                header("location: ../Views/blog_index.php?status=failed&error=databaseError");
                exit();
            }
            //otherwise
            $result = $stmt->FETCHALL();    //return associate array/empty object.

            //no related data, return dataEmpty message
            if(empty($result)){
                $stmt=null;
                header("location: ../Views/blog_index.php?status=dataEmpty&error=none");
                exit();
            }

            return $result;
        }
    }