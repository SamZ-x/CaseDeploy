<?php

    /////////////////////////////////////////
    //                API                  //
    /////////////////////////////////////////

    class API {

        //fields
        private $endpoint;
        private $verb;
        private $args;
        private $method;

        //public function as properties
        public function getEndpoint(){
            return $this->endpoint;
        }
        public function getVerb(){
            return $this->verb;
        }
        public function getArgs(){
            return $this->args;
        }
        public function getMethod(){
            return $this->method;
        }

        //create API instance and parse the request.
        public function __construct($request){
            $this->parseRequest($request);
            $this->method = $_SERVER['REQUEST_METHOD'];
        }
    
        
        /////////////////////////////////////////////////
        // Helper functions    
        
        //function: parseRequest
        //parse the request for API access
        private function parseRequest($request){
            // Store the result in args 
            $this->args = explode('/', rtrim($request, '/'));  
            // extract the endpoint(locate the model)
            $this->endpoint = array_shift($this->args);
            // extract the verb(locate the function)
            if (array_key_exists(0, $this->args)&& !is_numeric($this->args[0])) {
                $this->verb = array_shift($this->args);
            }
        }

        //return result with status 
        public function _response($data, $status = 200) {
            header("HTTP/1.1 " . $status . " " .$this->_requestStatus($status));
            return json_encode($data);
        }
        //status with code
        public function _requestStatus($code) {
            $status = array(  
                200 => 'OK',
                404 => 'Not Found',   
                405 => 'Method Not Allowed',
                500 => 'Internal Server Error',
            ); 
            return ($status[$code])?$status[$code]:$status[500]; 
        } 
    
    }
?>