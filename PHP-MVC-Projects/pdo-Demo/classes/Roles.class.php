<?php

//only class that interact with the database

class Roles extends Dbh{

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


    //set data with user input
    protected function setRoles($rolename, $rolevalue, $roledescription){

        $sqlQuery = "INSERT INTO `Roles`(`RoleName`, `RoleValue`, `RoleDescription`) VALUES (?,?,?)";
        $stmt = $this->connect()->prepare($sqlQuery);
        $stmt->execute([$rolename, $rolevalue, $roledescription]);
    }
}