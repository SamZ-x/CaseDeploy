<?php
    
    class ArticleContr extends Dbh{

        //fields
        private $title;
        private $userid;
        private $description;
        private $markdown;
        private $sanitizedhtml;
        private $slug;

        //constructor
        public function __construct($title, $description, $markdown){
            
            //directly assign;
            $this->title = $title;
            $this->description = $description;
            $this->markdown = $markdown;
            session_start();         //resume the current session get uid
            $this->userid = $_SESSION['userid'];            
            
            //use Parsedown lib
            include "../Lib/Parsedown.php";
            $parsedwon = new Parsedown();
            //function assign
            $this->sanitizedhtml = $parsedwon->text($markdown);
            $this->slug = $this->slugify($title);
        }

        public function AddArticle(){
            //return error checking
            if($this->IsEmpty()){
                header("location: ../Views/blog_userpage_new.php?status=failed&error=inputEmpty");
                $input = array("title" => $this->title,
                               "description" => $this->description,
                               "markdown" => $this->markdown);
                $_SESSION['input'] = $input;
                exit();   
            }

            error_log("pass empty");
        }



        //replace all special char with '-'
        private function slugify($string){
            return strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $string), '-'));
        }

        //********Error handler***********/
        private function IsEmpty(){
            //check empty input
            return empty($this->title) || empty( $this->description) || empty($this->markdown);
        }
    }








?>