<?php 

    session_start();     

    require_once "../Models/User.class.php";     //use User model

    //handle user requests
    class UserContr extends User{
        //properties
        private $uid;
        private $pwd;
        private $fname;
        private $lname;
        private $nname;
        private $email;
        private $phone;
        private $region;

        //************************* constructor and static methods *************************//
        //default
        public function __construct(){
        }

        //function : _userLogin
        //take 2 parameters :'uid', 'pwd'
        //create an instance for user login
        public static function _userLogin($uid, $pwd){
            $instance = new self();
            //assign values to relative fields
            $instance->uid = $uid;
            $instance->pwd = $pwd;
            return $instance;
        }

        //function : _globalSearch
        //take 2 parameters :'title', 'username'
        //create an instance for global search 
        public static function _userSignup($fname,$lname,$nname,$email,$password,$phone,$region){
            $instance = new self();
            //assign values to relative fields
            $instance->fname = $fname;
            $instance->lname = $lname;
            $instance->nname = $nname;
            $instance->email = $email;
            $instance->pwd = $password;
            $instance->phone = $phone;
            $instance->region = $region;
            return $instance;
        }


        //************************* public Methods *************************//

        //function : userLogin
        //run error checking and database validation request.
        public function userLogin(){
            //if login info valid, requet the database validation
            //if login info empty, redirect to index.php with error param
            if($this->IsEmpty_login()){
                header("location: ../Views/user_login.php?error=empty-input");
                exit();    //terminate the current scripte
            }

            //request database check
            return $this->userValidation($this->uid, $this->pwd);
        }
        
        //function : signupUser
        //run error checking and database validation request.
        public function signupUser(){
            //use exception handler to check first
            if($this->IsEmpty_signup()){
                //echo empty input
                header("location:../Views/user_signup.php?error=emptyinput");
                exit();
            }

            if(!$this->IsValidEmail()){
                //echo invali email
                header("location:../Views/user_signup.php?error=invalidemail");
                exit();
            }
            
            if($this->ExistenceCheck()){
                //echo user existed
                header("location:../Views/user_signup.php?error=userexisted");
                exit();
            }

            //add user
            $this->insertUser($this->fname,$this->lname,$this->nname,$this->email,$this->pwd,$this->phone,$this->region);
        }
        
        //************************* helper methods *************************//

        //check if login info empty
        //return true, if any input is empty 
        private function IsEmpty_login(){
            
            return empty($this->uid) || empty($this->pwd);
        }

        //data type validation(type, empty etc..)
        //if any of the input empty, return false, otherwise, true.
        private function IsEmpty_signup(){

            //return false if any empty info
            return empty($this->fname) || empty($this->lname) || empty($this->nname) || empty($this->email) || empty($this->phone) || empty($this->pwd) || empty($this->region);
        }

        //check email address format
        private function IsValidEmail(){

            //check email format
            return filter_var($this->email, FILTER_VALIDATE_EMAIL)
        }

        //check email info
        //return false, email valid, otherwise, email info invalid.
        private function ExistenceCheck(){
            $result;

            if(!($this->checkUser($this->email)))
                $result = false;
            else
                $result = true;
        
            return $result;
        }

        //if sign up include uid fiels
        // private function invalidUid(){
        //     $result = false;
        //     if(preg_match("/^[a-zA-Z0-9]*$/", $this-uid))   //only allow these [a-zA-Z0-9] in uid
        //         $result = true;

        //     return result;
        // }   

    }