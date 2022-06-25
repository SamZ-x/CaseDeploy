<?php

    //login model
    //interaction: search uid/email, verify password
    class Login extends Dbh{

        //function name: userValidation
        //functionality: connect database, search user with input params
        protected function userValidation($uid, $pwd){
            
            //check if the uid exist
            //if not, rediect to index.php with error param(invalid uid)
            $sqlquery = "SELECT * FROM `Users` WHERE UserID = ? OR Email = ?;";
            $stmt = $this->connect()->prepare($sqlquery);
            
            //if database statment return false, redirect with error
            if(!$stmt->execute([$uid, $uid])){
                $stmt = null;
                header("location: ../Views/index.php?error=stmterror");
                exit();
            }

            //if stmt is good, check query object
            $result = $stmt->FETCHALL();
            //if query return object empty, means invalid uid
            if(empty($result)){
                $stmt = null;
                header("location: ../Views/index.php?error=InvalidUid");
                exit();
            }

            //otherwise, verify the input pwd to database hashpassword(password_verify())
            //if not equal, rediect to index.php with error param(invalid pwd)
            if(!password_verify($pwd, $result[0]['Password'])){
                $stmt = null;
                header("location: ../Views/index.php?error=InvalidPassword");
                exit();
            }
            
            //add new session and store the user info into session
            session_start();
            $_SESSION["userid"] =  $result[0]['UserId'];
            $_SESSION["nickname"] =  $result[0]['NickName'];

            //clear the $stmt and return the uid
            $stmt = null;
            return $result[0]['UserId'];
        }
        

        protected function getData($uid){
            //run database query
            $sqlquery = "SELECT * FROM `Articles` a JOIN `Users` u ON a.UserId = u.UserId WHERE a.UserId = ?;";
            $stmt = $this->connect()->prepare($sqlquery);
            //$status = $stmt->execute([$uid]);

            //if database statment return false, redirect with error
            if(!$stmt->execute([$uid])){
                $stmt = null;
                header("location: ../Views/blog_userpage.php?error=stmterror");
                exit();
            }

            //otherwise
            $result = $stmt->FETCHALL();    //return associate array/empty object.

            //start session to send the data
            $_SESSION['userdata'] = $result;

            //if successfully retrieve data, clear the statment and return
            $stmt=null;
        }
    }