<?php

    class test extends Dbh{

        //pull data without user input
        public function getRoles(){

            $sqlQuery = "select * from Roles";
            //use the connect() method connect db and query() to retrieve data
            $stmt = $this->connect()->query($sqlQuery);
            //
            while($row = $stmt->fetch()){
                echo $row['RoleName'].'<br>';
            }
        }

        //pull data with user input
        public function getRolesStmt($rolevalue, $roledescription){

            $sqlQuery = "select * from Roles WHERE RoleValue = ? AND RoleDescription like '%?%'";
            //use the connect() method connect db and query() to retrieve data
            $stmt = $this->connect()->prepare($sqlQuery);
            $stmt->execute([$rolevalue, $roledescription]);
            $names = $stmt->fetchAll();

            foreach($names as $name){
                echo $name['RoleName'].'<br>';
            }
        }

    }



?>