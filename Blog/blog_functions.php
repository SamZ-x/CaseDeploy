<?php

    //import database connection file
    require_once "Lib/db.php";

    error_log("checkpoint2");

    function LoginValidation($userinput)
    {
        //import global variables
        global $mysql_conn, $mysql_response;

        //clear data
        $userid_email = $mysql_conn->real_escape_string($userinput['userid_email']);

        //use input data to query database
        $query = "SELECT * FROM Users WHERE UserId = '$userid_email' or Email = '$userid_email'";     //use email or userID to login.
        

        error_log("checkpoint2.1, ".$query);

        //retrieve server data, verify userId/email 
        $result = MysqlQuery($query);
        
        if(!($result))
        {
            //incorrect userId/email, no further verification, return result
            $userinput['response'] = "Invalid UserId/Email.";
            $userinput['status'] = false;
            error_log($userinput['response']);
            error_log("checkpoint2.2, ".$userinput['response']);
            return $userinput;
        }
        else
            //retrieve data in associative array format
            $data = $result->fetch_assoc();


        //verification of password ( matches a hash)
        //updata 'response' and 'status'
        if(password_verify($userinput['password'], $data['Password']))
        {
            $userinput['response'] = "Login successfully.";
            $userinput['status'] = true;

            //add login info to session
            $_SESSION['userId'] = $data['UserId'];
            $_SESSION['nickname'] = $data['NickName'];
        }
        else
        {
            $userinput['response'] = "Invalid password.";
            $userinput['status'] = false;
        }
        
        //update session and return result
        return $userinput;
    }


?>


