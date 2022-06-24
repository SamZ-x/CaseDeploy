<?php

    //retrieve data from db and provide methods for fontend use.
    class SearchView extends Search{

        //fields
        private $category;
        private $keyword;

        //constructor to initialize the fields
        public function __construct($category, $keyword){
            $this->category = $category;
            $this->keyword = $keyword;
        }

        //leverage model function to get the data
        public function Searchdata(){
            
            //back to index page with error message if input empty
            if($this->IsEmpty()){
                header("location:../Views/blog_index.php?status=failed&error=inputEmpty");
                exit();
            }

            //get the data and return
            $result = $this->GetData($this->category, $this->keyword);
            return $result;
        }


        //******* Error handling region*******//
        
        //return true if empty input, oterwise, return false. 
        private function IsEmpty(){
            //check the fields
            return empty($this->category) || empty($this->keyword);
        }
    }