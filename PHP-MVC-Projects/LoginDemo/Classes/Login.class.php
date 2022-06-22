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
                header("location: ../Views/index.php?error=stmterror");
                exit();
            }

            //if stmt is good, check query object
            $result = $stmt->FETCHALL();
            //if query return object empty, means invalid uid
            if(empty($result )){
                header("location: ../Views/index.php?error=InvalidUid");
                exit();
            }

            //otherwise, verify the input pwd to database hashpassword(password_verify())
            //if not equal, rediect to index.php with error param(invalid pwd)
            if(!password_verify($pwd, $result[0]['Password'])){
                header("location: ../Views/index.php?error=InvalidPassword");
                exit();
            }
            
            //otherwise, return stauts(true/false)  - not necessary
            return true;
        }
        
    }