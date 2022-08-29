<?php
    //User model
    //Represent an user object in database.

    //Model Methods include:
    //findOne({argkey:argvalue})

    //Methods Output include:
    //succeed: object
    //failed: null

    
    class User extends Dbh{

        //function:findOneById
        //find an user by user id
        protected function findOneById($arg_id){
            //database query
            $sqlquery = "SELECT `UserId`, `Password`, `NickName`,`RoleId` FROM `Users` WHERE `UserId` = ?;";
            $stmt = $this->connect()->prepare($sqlquery);
            
            //internal server faild return null
            if(!$stmt->execute([$arg_id])){
                $stmt = null;
                return null;
            }
            else{
                //Get all matched user object(array)
                //result is any array of user object
                $result = $stmt->FETCHALL();

                //no matched user
                if(empty($result)){
                    $stmt = null;
                    return null;
                }
                //find matched user
                else{
                    $stmt = null;
                    return $result;     
                }
            }
        }

        //function:findOneByEmail
        //find an user by user email
        protected function findOneByEmail($arg_email){
            //database query
            $sqlquery = "SELECT `UserId`, `Password`, `NickName`,`RoleId` FROM `Users` WHERE `Email` = ?;";
            $stmt = $this->connect()->prepare($sqlquery);
            
            //internal server faild return null
            if(!$stmt->execute([$arg_email])){
                $stmt = null;
                return null;
            }
            else{
                //Get all matched user object(array)
                //result is any array of user object
                $result = $stmt->FETCHALL();

                //no matched user
                if(empty($result)){
                    $stmt = null;
                    return null;
                }
                //find matched user
                else{
                    $stmt = null;
                    return $result;     //userid is unique, just return the only user object
                }
            }
        }

        //function:findOneByGitHubId
        //find an user by user githubId
        protected function findOneByGitHubId($arg_gid){
            //database query
            $sqlquery = "SELECT `UserId`, `NickName`,`RoleId` FROM `Users` WHERE `github_id` = ?;";
            $stmt = $this->connect()->prepare($sqlquery);
            
            //internal server faild return null
            if(!$stmt->execute([$arg_gid])){
                $stmt = null;
                return null;
            }
            else{
                //Get all matched user object(array)
                //result is any array of user object
                $result = $stmt->FETCHALL();

                //no matched user
                if(empty($result)){
                    $stmt = null;
                    return null;
                }
                //find matched user
                else{
                    $stmt = null;
                    return $result;     //userid is unique, just return the only user object
                }
            }
        }
        
        //function:create
        //create an user
        protected function create($fname,$lname,$nname,$email,$password,$phone,$region){
            //create unique id and check in database
            $userid = $this->generateUserId();
            $hashpassword = password_hash($password, PASSWORD_DEFAULT);

            //create query and prepare the stmt with placeholder
            $sqlquery = "INSERT INTO `Users`(`UserId`, `Email`, `Password`, `NickName`, `Firstname`, `Lastname`, `Region`, `Phone`) VALUES (?,?,?,?,?,?,?,?);";
            $stmt = $this->connect()->prepare($sqlquery);
            
            //if the excute shows error, show the error
            if(!$stmt->execute([$userid, $email,$hashpassword,$nname,$fname,$lname,$region,$phone])){     //add info array to statement execute()
                $stmt = null;    
                return null;
            }

            //if insert successfully, get the userid and nickname for login
            if($stmt->rowCount() > 0)
            { 
                //get the new user
                $stmt = null;
                return $this->findOneByEmail($email);   //same as userid
            }else{
                $stmt = null;    
                return null;
            }
        }

        //function:createByGithubId
        //create an user base on github id
        protected function createByGithubId($arg_gid, $nname){
            //generate userid
            $userid = $this->generateUserId();
            //create query and prepare the stmt with placeholder
            $sqlquery = "INSERT INTO `Users`(`UserId`, `github_Id`, `NickName`) VALUES (?,?,?);";
            $stmt = $this->connect()->prepare($sqlquery);
            //if the excute shows error, show the error
            if(!$stmt->execute([$userid, $arg_gid, $nname])){          //add info array to statement execute()
                $stmt = null;    
                return null;
            }
            else{
                $stmt = null;
                return $this->findOneByGitHubId($arg_gid);
            }
        }

        //************** Helper Methods *****************//

        //function:generateUserId
        //return unique 13 charactors userid 
        private function generateUserId(){
            //create unique id and check existence in database
            do{
                $userid = uniqid("u_",false);
            }while(!empty($this->findOneById($userid)));
            return $userid;
        }
        
    }