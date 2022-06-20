<?php

class RolesContr extends Roles{
    
    public function AddRole($rolename, $rolevalue, $desciption){
        $this->setRoles($rolename, $rolevalue, $desciption);
    }

}