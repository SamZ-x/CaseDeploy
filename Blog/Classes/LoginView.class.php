<?php

//display the articles of users
//use uid as parameter to retrieve data 
class LoginView extends Login{

    //fields
    private $uid;

    //constructor
    public function __construct($uid){
        $this->uid = $uid;
    }

    //get user data with the uid parameter
    public function getUserData(){
        return $this->getData($this->uid);
    }
}