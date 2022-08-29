<?php 

    //session_start();     
    require_once "../Models/User.class.php";     //use User model

    //handle user requests
    class UserContr extends User{
        
        //fields
        private $uid;
        private $pwd;
        private $fname;
        private $lname;
        private $nname;
        private $email;
        private $phone;
        private $region;
        private $oAuth_uid;

        //************************* constructor and static methods *************************//
        //default
        public function __construct(){
        }

        //function : _userLogin
        //create an instance for user login
        public static function _login(){
            $instance = new self();
            //assign values to relative fields
            $instance->email = $_POST['useremail'];
            $instance->pwd = $_POST['password'];
            return $instance;
        }

        //function : _register
        //create an instance for user signup 
        public static function _register(){  //$fname,$lname,$nname,$email,$password,$phone,$region
            $instance = new self();

            //get input data
            // $fname=$_POST['firstname'];
            // $lname=$_POST['lastname'];
            // $nname=$_POST['nickname'];
            // $password = $_POST['password'];
            // $email=$_POST['email'];
            // $phone=$_POST['phone'];
            // $region=$_POST['Region'];

            //assign values to relative fields
            $instance->fname = $_POST['firstname'];
            $instance->lname = $_POST['lastname'];
            $instance->nname = $_POST['nickname'];
            $instance->email = $_POST['email'];
            $instance->pwd = $_POST['password'];
            $instance->phone = $_POST['phone'];
            $instance->region = $_POST['Region'];
            return $instance;
        }


        //function : _loginOAuth
        //create an instance for user login via github oauth 
        public static function _loginOAuth(){
            $instance = new self();
            //assign values to relative fields
            $instance->oAuth_uid = $_POST['oAuth_uid'];
            $instance->nname = $_POST['nickname'];
            return $instance;
        }


        //************************* public Methods *************************//

        //function : login
        //use the userid to look up the user in database
        //verify the password
        //output: redirection
        public function login(){
            
            if(empty($this->email) || empty($this->pwd)){
                // http_response_code(400);
                // $response["message"] = "Please provide email and password";
                // echo json_encode($response);
                header("location: ../Views/user_login.php");
                exit();
            }
            
            //request database check
            $user = ($this->findOneByEmail($this->email))[0];
            //not found user
            if(empty($user)){
                // http_response_code(401);  //UNAUTHORIZED
                // $response["message"] = "Invalid Credentials";
                // echo json_encode($response);
                header("location: ../Views/user_login.php");
                exit();
            }
            //password not match
            if(!password_verify($this->pwd, $user['Password'])){
                // http_response_code(401);  //UNAUTHORIZED
                // $response["message"] = "Invalid Credentials";
                // echo json_encode($response);
                header("location: ../Views/user_login.php");
                exit();
            }
            //successfully login
            // http_response_code(200);
            // $response["message"] = "succeed";
            // echo json_encode($response);
            $Response = array(
                "userid" => $user['UserId'],
                "nickname" => $user['NickName'],
                "roleid" => $user['RoleId'],
                "loginstatus" => "login"
            );
            $_SESSION['loginRes'] = $Response;
            header("location: ../Views/account.view.php");
            exit();
        }
        
        //function : login_OAuth
        //login via github account
        //verify the github userid
        //output: user object
        public function login_OAuth(){
            $user = ($this->findOneByGitHubId($this->oAuth_uid))[0];
            if(!empty($user)){
                return $user; //should be unique
            }
            else{
                return $this->createByGithubId($this->oAuth_uid, $this->nname);
            }
        }


        //function : register
        //register new user
        //output: redirection
        public function register(){

            //use exception handler to check first
            if($this->IsEmpty_signup()){
                //echo empty input
                header("location:../Views/user_signup.php?message=emptyinput");
                exit();
            }

            if(!$this->IsValidEmail()){
                //echo invali email
                header("location:../Views/user_signup.php?message=invalidemail");
                exit();
            }
            
            if($this->IsExistence()){
                //echo user existed
                header("location:../Views/user_signup.php?message=userexisted");
                exit();
            }

            $user = ($this->create($this->fname,$this->lname,$this->nname,$this->email,$this->pwd,$this->phone,$this->region))[0];
            if(!empty($user)){
                $Response = array(
                    "userid" => $user['UserId'],
                    "nickname" => $user['NickName'],
                    "roleid" => $user['RoleId'],
                    "loginstatus" => "login"
                );
                $_SESSION['loginRes'] = $Response;
                header("location: ../Views/account.view.php");
                exit();
            }
            else{
                header("location:../Views/user_signup.php?message=system error");
                exit();
            }
        }
        

        
        //************** Helper Methods *****************//

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
            return filter_var($this->email, FILTER_VALIDATE_EMAIL);
        }

        //check email info
        //return false, email valid, otherwise, email info invalid.
        private function IsExistence(){
            return $this->findOneByEmail($this->email);
        }
        

        //if sign up include uid fiels
        // private function invalidUid(){
        //     $result = false;
        //     if(preg_match("/^[a-zA-Z0-9]*$/", $this-uid))   //only allow these [a-zA-Z0-9] in uid
        //         $result = true;

        //     return result;
        // }   

    }