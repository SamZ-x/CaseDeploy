<?php
//sign up model class
//only access to the database(database action: SIUD)
//all functions are protected, only open for child class.
class Signup extends Dbh{

    //check if the new email has existed in database
    //return true if exists, otherwise return false;
    protected function checkUser($email){
        $sqlquery = "SELECT Email FROM Users WHERE Email = ?;";
        $stmt = $this->connect()->prepare($sqlquery);
        
        //if the excute shows error, show the error
        if(!$stmt->execute([$email])){
            $stmt = null;    //close the connection statment
            header("location: ../Views/index.php?error=stmtfailed-Usercheck");    //return index page with error parameter
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

    //insert a user into database with the given info
    protected function setUser($fname,$lname,$nname,$email,$password,$phone,$region){

        //hash the password
        $hashpassword = password_hash($password, PASSWORD_DEFAULT);
    
        //create query and prepare the stmt with placeholder
        $sqlquery = "INSERT INTO `Users`(`Email`, `Password`, `NickName`, `Firstname`, `Lastname`, `Region`, `Phone`) VALUES (?,?,?,?,?,?,?);";
        $stmt = $this->connect()->prepare($sqlquery);
        //if the excute shows error, show the error
        if(!$stmt->execute([$email,$hashpassword,$nname,$fname,$lname,$region,$phone])){     //add info array to statement execute()
            $stmt = null;    //close the connection statment
            header("location: ../Views/index.php?error=stmtfailed-insert");    //return index page with error parameter
            exit();
        }

        //return result
        return true;
    }
}
    