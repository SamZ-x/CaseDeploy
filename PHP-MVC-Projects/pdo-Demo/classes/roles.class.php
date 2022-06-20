<?php

//only class that interact with the database

class roles extends Dbh{

    //only run the operation on database, not show any to client side
    //only be referred by child class
    protected function getRoles($rolevalue){

        //create the sql query
        $sqlQuery = "SELECT * FROM Roles WHERE RoleValue = ?";
        //use the connect() method connect db and prepare the statement to be filled with param
        $stmt = $this->connect()->prepare($sqlQuery);
        //filled param
        $stmt->execute([$rolevalue]);
        //get all
        $results = $stmt->fetchAll();
        //return the result(used by view class)
        return $results;
    }
}