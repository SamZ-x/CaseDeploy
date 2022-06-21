<?php
    //use this function to all the class in the specific folder
    spl_autoload_register('myAutoLoader');

    function myAutoLoader($className)
    {

        // $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URL'];
        // if(strpos($url, 'includes') !== false)
        //     $path = '../Classes/';
        // else
        //     $path = 'Classes/';

        $path = '../Classes/';
        $extension = '.class.php';
        
        //for debugging
        error_log($path.$className.$extension);
        
        require_once $path.$className.$extension;    //relative path
    }

?>