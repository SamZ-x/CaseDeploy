<?php


    //data flow start point
    session_start();

    //connect the database
    //create variables to store connection info
    $mysql_conn = null;
    $mysql_response = "";
    $mysql_status = "";

    //database login info
    $connectionInfo = [];   //store the info to build db connection
    $connectionInfo['username'] = "xzhu20";
    $connectionInfo['password'] = "Xzhu20@mysql";
    $connectionInfo['database'] = "blog";

    //create connection
    Mysqlconnect($connectionInfo);

    /***********
    Function name: Mysqlconnect
    desicription: Build the connection with Mysql database
    parameters: connection info array included username, password, and database name
    **********/
    function Mysqlconnect(array $connectioninfo)
    {
        //import variables
        global $mysql_conn, $mysql_response;

        //create a mysqli instance(build the connection) and store as $mysql_conn
        $mysql_conn = new mysqli("localhost", $connectioninfo['username'], $connectioninfo['password'], $connectioninfo['database']);

        //connection check
        //if error raise, record the error
        if($mysql_conn->connect_error)
        {
            //update server response info
            $mysql_response = "Connection error (".$mysql_conn->connect_error.") "
            error_log($mysql_response);   //for debugging
            
            //end the session
            die();
        }

        $mysql_response = "Connection created.";
    }


    /***********
    Function name: MysqlQuery
    desicription: Performs a query on the database
    parameters: query string
    **********/
    function MysqlQuery($query)
    {
        //import variables
        global $mysql_conn, $mysql_response;

        //declare variable
        $output = false;      //store the output object, initial to false

        //I, connnection check
        if($mysql_conn == null)
        {
            //update server response info
            $mysql_response = "No database connection.";
            return $output;   
        } 
        
        //II, db connected. excute query
        if(!($output = $mysql_conn->query($query)))
        {
            //query() return false on failure
            $mysql_response = "Query Error (".$mysql_conn->connect_error;
            return $output;
        }

        //III, Query succeed.
        return $output;
    }
?>