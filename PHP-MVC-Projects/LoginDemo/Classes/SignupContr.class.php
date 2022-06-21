<?php

    //leverage the model function to implement database operation
    //provide specific public function for client to use
    //error handler functions are private
    class SignupContr extends Signup {

        private $fname;
        private $lname;
        private $nname;
        private $email;
        private $password;
        private $phone;
        private $region;

        //constructor
        public function __construct($fname,$lname,$nname,$email,$password,$phone,$region){

            $this->fname = $fname;
            $this->lname = $lname;
            $this->nname = $nname;
            $this->email = $email;
            $this->password = $password;
            $this->phone = $phone;
            $this->region = $region;
        }

        //functional method
        public function signupUser(){
            //use exception handler to check first
            if($this->emptyInput()==false){
                //echo empty input
                header("location:../Viewsindex.php?error=emptyinput");
                exit();
            }

            if($this->invalidEmail == false){
                //echo invali email
                header("location:../Views/index.php?error=invalidemail");
                exit();
            }
            
            if($this->ExistenceCheck){
                //echo user existed
                header("location:../Views/index.php?error=userexisted");
                exit();
            }

            //add user
            $this->setUser($fname,$lname,$nname,$email,$password,$phone,$region);
        }

        //************************************ */
        //          Exception handle           //
        //**************************************/
        //data type validation(type, empty etc..)
        //if any of the input empty, return false, otherwise, true.
        private function emptyInput(){
            $result =  false;
            
            if(!(empty($this->fname) || empty($this->lname) || empty($this->nname) || empty($this->email) 
            || empty($this->phone) || empty($this->password) || empty($this->region) )){
                $result = true;
            }

            return $result;
        }

        // //if sign up include uid fiels
        // private function invalidUid(){
        //     $result = false;
        //     if(preg_match("/^[a-zA-Z0-9]*$/", $this-uid))   //only allow these [a-zA-Z0-9] in uid
        //         $result = true;

        //     return result;
        // }   

        //check email address format
        private function invalidEmail(){
            $result = false;

            if(filter_var($this->email, FILTER_VALIDATE_EMAIL))  //build-in email validate
                $result = true;

            return false;
        }

        //***************************************/
        //more error checking function like above, as need. 
        
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
    }
