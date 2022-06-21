<?php
    
    //Database class (server other model class)
    //fields: database info (host, user, pwd, dbname)
    //Methods: connect() - using pdo
    class Dbh{

        //use to connect the database
        protected function connect(){
        
            //catch exception if show up
            try {
                //database info (limited in connect() scope)
                $host = "localhost";
                $user = "xzhu20";
                $pwd = "Xzhu20@mysql";
                $dbName = "blog";

                //database server name
                $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
                //create database handler and return
                $dbh = new PDO($dsn, $this->user, $this->pwd);                          //create new PDO object using the db info
                $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);     //set the data fetch mode
                return $dbh;

            } catch (PDOException $e) {
                //display the error message and close the connection
                print "Error!: ".$e->getMessage()."<br/>";
                die();
            }
        }
    }
?>