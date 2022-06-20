<?php

    class Dbp{

        //database info
        private $host = "localhost";
        private $user = "xzhu20";
        private $pwd = "Xzhu20@mysql";
        private $dbName = "blog";

        //use to connect the database
        protected function connect(){
            
            //database server name
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
            $pdo = new PDO($dsn, $this->user, $this->pwd);                          //create new PDO object using the db info
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);     //set the data fetch mode
            return $pdo;                                                             //return the connection
        }

    }



?>