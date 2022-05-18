<?php

    //import database connection file
    require_once "Lib/db.php";

    function LoginValidation($userinput)
    {
        //import global variables
        global $mysql_conn, $mysql_response;

        //clear data
        $userid_email = $mysql_conn->real_escape_string($userinput['userid_email']);

        //use input data to query database
        $query = "SELECT * FROM Users WHERE UserId = '$userid_email' or Email = '$userid_email'";     //use email or userID to login.
        
        //retrieve server data, verify userId/email 
        if($result = MysqlQuery($query))
        {
            //retrieve data in associative array format
            $data = $result->fetch_assoc();

            error_log(json_encode( $data));
            //no user exist
            if($result->num_rows == 0)
            {
                //incorrect userId/email, no further verification, return result
                $userinput['response'] = "Invalid UserId/Email.";
                $userinput['status'] = false;
                error_log("checkpoint2.2, ".$userinput['response']);
            }
            else
            {
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
            }
        }     
        else
        {
            $userinput['response'] = "System error.";
            $userinput['status'] = false;
        }

        //return result
        return $userinput;
    }

?>


