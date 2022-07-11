<?php

    /////////////////////////////////////////
    //          database configure         //
    /////////////////////////////////////////

    //world_county database connection info
    $host = "localhost";
    $user = "apiadmin";
    $pwd = "Apiadmin20@mysql";
    $dbName = "world_country";

    //database server name
    $dsn = 'mysql:host='.$host.';dbname='.$dbName.';charset=utf8';
    
    //create PDO database connection instance
    $dbh = new PDO($dsn, $user, $pwd);                                       

    //set attributes
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);                  //PDO will attempt to use native prepared statements. 
    $dbh->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);           //Enable buffered query
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);          //Throws PDOExceptions.
    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);     //Returns an array indexed by column name 

    define('APP_NAME', 'World country API');
?>