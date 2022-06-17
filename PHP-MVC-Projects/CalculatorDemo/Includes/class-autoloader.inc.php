<?php
    spl_autoload_register('myAutoLoader');

    function myAutoLoader($className)
    {
        $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URL'];
        
        error_log($url);

        if(strpos($url, 'includes') !== false)
            $path = '../Classes/';
        else
            $path = 'Classes/';


        $extension = '.class.php';
        error_log($path.$className.$extension);
        require_once $path.$className.$extension;    //relative path
    }

?>