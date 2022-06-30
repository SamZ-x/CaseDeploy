<?php

    //User model
    class User extends Dbh{

        //function : userValidation
        //connect database to verify the user
        protected function userValidation($uid, $pwd){
            
            //check if the uid exist
            //if not, rediect to index.php with error param(invalid uid)
            $sqlquery = "SELECT * FROM `Users` WHERE UserID = ? OR Email = ?;";
            $stmt = $this->connect()->prepare($sqlquery);
            
            //if database statment return false, redirect with error
            if(!$stmt->execute([$uid, $uid])){
                $stmt = null;
                header("location: ../Views/user_login.php?error=stmterror");
                exit();
            }

            //if stmt is good, check query object
            $result = $stmt->FETCHALL();
            //if query return object empty, means invalid uid
            if(empty($result)){
                $stmt = null;
                header("location: ../Views/user_login.php?error=InvalidUid");
                exit();
            }

            //otherwise, verify the input pwd to database hashpassword(password_verify())
            //if not equal, rediect to index.php with error param(invalid pwd)
            if(!password_verify($pwd, $result[0]['Password'])){
                $stmt = null;
                header("location: ../Views/user_login.php?error=InvalidPassword");
                exit();
            }
            
            //add new session and store the user info into session
            //session_start();
            $_SESSION["userid"] =  $result[0]['UserId'];
            $_SESSION["nickname"] =  $result[0]['NickName'];
            $_SESSION['loginstatus'] = "login";

            //clear the $stmt and return the uid
            $stmt = null;
            return $result[0]['UserId'];
        }
        
        //function : checkUser
        //check if the new email has existed in database
        //return true if exists, otherwise return false;
        protected function checkUser($email){
            $sqlquery = "SELECT Email FROM Users WHERE Email = ?;";
            $stmt = $this->connect()->prepare($sqlquery);
            
            //if the excute shows error, show the error
            if(!$stmt->execute([$email])){
                $stmt = null;    //close the connection statment
                header("location: ../Views/user_signup.php?error=stmtfailed-Usercheck");    //return index page with error parameter
                exit();
            }

            //also check the result row
            $resultCheck;
            if($stmt->rowCount() > 0){
                $resultCheck = true;     //email exists, 
            }
            else{
                $resultCheck = false;      //email not exists
            }

            return $resultCheck;
        }

        //function : insertUser
        //insert a user into database with the given info
        protected function insertUser($fname,$lname,$nname,$email,$password,$phone,$region){

            //hash the password
            $hashpassword = password_hash($password, PASSWORD_DEFAULT);
        
            //create query and prepare the stmt with placeholder
            $sqlquery = "INSERT INTO `Users`(`Email`, `Password`, `NickName`, `Firstname`, `Lastname`, `Region`, `Phone`) VALUES (?,?,?,?,?,?,?);";
            $stmt = $this->connect()->prepare($sqlquery);
            //if the excute shows error, show the error
            if(!$stmt->execute([$email,$hashpassword,$nname,$fname,$lname,$region,$phone])){     //add info array to statement execute()
                $stmt = null;    //close the connection statment
                header("location: ../Views/user_signup.php?error=stmtfailed-insert");    //return index page with error parameter
                exit();
            }

            //if insert successfully, get the userid and nickname for login
            if($stmt->rowCount() > 0)
            {
                $sqlquery = "SELECT `UserId`,`NickName` FROM `Users` WHERE `Email` = ?";
                $stmt = $this->connect()->prepare($sqlquery);
                if($stmt->execute([$email])){
                    $newUser = $stmt->FETCHALL();
                    //store user info in session
                    $_SESSION['userid'] = $newUser[0]['UserId'];
                    $_SESSION['nickname'] = $newUser[0]['NickName'];
                    $_SESSION['loginstatus'] = "login";
                }
            }

            //return result 
            return true;
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