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

                //get the database connection credential for external json file
                $DBcredential = json_decode(file_get_contents('../Dbh.json', true), true);
                
                // ////////// TEST //////////////
                // $host = "localhost";
                // $user = "test";
                // $pwd = "test";
                // $dbName = "blog";
                // /////////////////////////////

                ////// DEPLOY //////////////
                $host = $DBcredential['host'];
                $user = $DBcredential['user'];
                $pwd = $DBcredential['pwd'];
                $dbName = $DBcredential['dbName'];
                /////////////////////////
                
                //database server name
                $dsn = 'mysql:host='.$host.';dbname='.$dbName;
                //create database handler and return
                $dbh = new PDO($dsn, $user, $pwd);                          //create new PDO object using the db info
                $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);     //set the data fetch mode
                return $dbh;

            } catch (PDOException $e) {
                //display the error message and close the connection
                print "Database Connection Error!: ".$e->getMessage()."<br/>";
                die();
            }
        }
    }
?>