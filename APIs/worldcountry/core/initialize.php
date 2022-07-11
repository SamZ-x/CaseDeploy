<?php
    /////////////////////////////////////////
    //          initialization             //
    /////////////////////////////////////////

    //define
    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);                       // 'Ds' => '/'             
    defined('SITE_ROOT') ? null : define('SITE_ROOT', '..');                        // 'SITE_ROOT' => ../    
    defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'includes');       // 'INC_PATH' => ../includes 
    defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core');         // 'CORE_PATH' => ../core 

    //database configure
    require_once(INC_PATH.DS.'config.php');
    //core classes
    require_once(CORE_PATH.DS.'Country.class.php');
    require_once(CORE_PATH.DS.'API.class.php');

?>