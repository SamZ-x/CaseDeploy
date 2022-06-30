<?php

    require_once "../Lib/Parsedown.php";            //use Parsedown lib
    require_once "../Models/Article.class.php";     //use article model

    class ArticleContr extends Article{

        //************************* fields *************************//
        private $title;
        private $userid;
        private $username;
        private $description;
        private $markdown;
        private $sanitizedhtml;
        private $slug;
        private $category;
        private $keyword;

        //************************* constructor and static methods *************************//

        //defaule constructor
        public function __construct(){
            //default
        }

        //function : _newAritcle
        //take 2 parameters :'title', 'username'
        //create an instance for local search (logined user)
        public static function _newAritcle($title, $description, $markdown){
            $instance = new self();
            //directly assign values to relative fields
            $instance->title = $title;
            $instance->description = $description;
            $instance->markdown = $markdown;
            $instance->userid = $_SESSION['userid'];            
        
            //use function to assign
            $parsedwon = new Parsedown();
            $instance->sanitizedhtml = $parsedwon->text($markdown);
            $instance->slug = $instance->slugify($title);
            return $instance;
        }

        //function : _globalSearch
        //take 2 parameters :'title', 'username'
        //create an instance for global search 
        public static function _globalSearch($category, $keyword){
            $instance = new self();
            //assign values to relative fields
            $instance->category = $category;
            $instance->keyword = $keyword;
            return $instance;
        }

        //function : _localSearch
        //take 2 parameters :'title', 'username'
        //create an instance for local search (logined user)
        public static function _localSearch($userid, $keyword){
            $instance = new self();
            //assign values to relative fields
            $instance->userid = $userid;
            $instance->keyword = $keyword;
            return $instance;
        }



        //************************* public Methods *************************//

        //function : GetArticles
        //run error checking and request insert data to database
        public function GetArticles(){
            //all Articles class function to get the articles
            $this->Retrieve($this->userid);
        }

        //function : globalSearchArticles
        //run error checking and request data from database
        //return data
        public function globalSearchArticles(){
    
            //back to index page with error message if input empty
            if($this->IsEmpty_globalsearch()){
                header("location:../index.php?status=failed&error=inputEmpty");
                exit();
            }

            //get the data and return
            $result = $this->Retrieve_globalSearch($this->category, $this->keyword);
            return $result;
        }

        //function : localSearchArticles
        //run error checking and request data fromdatabase
        //return data
        public function localSearchArticles(){
    
            //back to login page with error message if input empty
            if($this->IsEmpty_localsearch()){
                header("location:../Views/user_login.php?status=failed&error=inputEmpty");
                exit();
            }

            //get the data and return
            $result = $this->Retrieve_localSearch($this->userid, $this->keyword);
            return $result;
        }


        //function : addArticle
        //run error checking and request insert data to database
        public function addArticle(){
            //return error checking
            if($this->IsEmpty_Add()){
                header("location: ../Views/article_new.php?status=failed&error=inputEmpty");
                $inputRecord = array(
                    "title" => $this->title,
                    "description" => $this->description,
                    "markdown" => $this->markdown
                );

                $_SESSION['inputRecord'] = $inputRecord;
                exit();   
            }

            //store all data into an array to pass to the insert function
            $data = array(
                "title" => $this->title,
                "description" => $this->description,
                "markdown" => $this->markdown,
                "userid" => $this->userid,
                "sanitizedhtml" => $this->sanitizedhtml,
                "slug" => $this->slug
            );
    
            //reuqest to insert the data
            $this->Insert($data);
        }
        
        //************************* helper methods *************************//
        
        //replace all special char with '-'
        private function slugify($string){
            return strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $string), '-'));
        }

        //check empty input for adding article(include space)
        private function IsEmpty_Add(){
            //check the input
            return empty(trim($this->title)) || empty( trim($this->description)) || empty(trim($this->markdown));
        }

        //check empty input for global search(include space)
        private function IsEmpty_globalsearch(){
            //check the input
            return empty(trim($this->category)) || empty(trim($this->keyword));
        }

        //check empty userid for local search(include space)
        private function IsEmpty_localsearch(){
            //check the input
            return empty(trim($this->userid));
        }
    }








?>