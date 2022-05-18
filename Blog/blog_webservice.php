<?php

    //import mysql connection
    require_once 'functions.php';

    //import the global variable
    global $mysql_conn, $mysql_response;

    //gloabl data and status variables
    $data = [];
    $status = "Invalid action"; 
    $NumRows = 0;

   //check and select action
   if(isset($_POST["action"]))
   {
       switch($_POST["action"])
       {
           //insert record
           case 'Insert':
               Signup();
               break;

           //delete record
           case 'Delete':
               Delete();
               break;
           
           //update record
           case 'Update':
               Update();
               break;

           //get users info
           case 'Retrieve':
               Retrieve();
               break;       
       }
   }

   //call Done to return the data
   Done();
   die();

    /*****************************
    Function Name: Retrieve
    Description: get data from database
    *****************************/
   function Retrieve()
   {
        //import the global mysql connection variable
        global $mysql_conn, $mysql_response;
        //import the variables to store the result
        global $data, $status, $NumRows;

        

   }

   function Signup()
   {

   }

?>