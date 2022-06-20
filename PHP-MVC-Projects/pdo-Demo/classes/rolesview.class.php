<?php

class rolesView extends Roles{

    public function showRoles($rolevalue){
        $results = $this->getRoles($rolevalue);
        echo "Role name: ".$results[0]['RoleName'].'<br>';
        echo "Role name: ".$results[0]['RoleDescription'].'<br>';
    }
}