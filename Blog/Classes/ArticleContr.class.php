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

            error_log("title: ".$this->title);
            error_log("description: ".$this->description);
            error_log("markdown: ".$this->markdown);
            error_log("userid: ".$this->userid);
            error_log("sanitizedhtml: ".$this->sanitizedhtml);
            error_log("slug: ".$this->slug);
        }

        //replace all special char with '-'
        private function slugify($string){
            return strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $string), '-'));
        }
    }








?>