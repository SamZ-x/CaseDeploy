<?php

    //handle user requests
    class LoginContr extends Login{
        //properties
        private $uid;
        private $pwd;

        public function __construct($uid, $pwd){
            //get the login info
            $this->uid = $uid;
            $this->pwd = $pwd;
        }

        //function name: userLogin
        //include error checking and database validation request.
        public function userLogin(){
            //if login info valid, requet the database validation
            //if login info empty, redirect to index.php with error param
            if($this->emptyInput()){
                header("location: ../Views/index.php?error=empty-input");
                exit();    //terminate the current scripte
            }

            //request database check
            $this->userValidation($this->uid, $this->pwd);
        }

        //************************************ */
        //          Exception handle           //
        //**************************************/
        //error type: empty input

        //check if login info empty
        //return true, if any input is empty 
        private function emptyInput(){
            
            return empty($this->uid) || empty($this->pwd);
        }

    }