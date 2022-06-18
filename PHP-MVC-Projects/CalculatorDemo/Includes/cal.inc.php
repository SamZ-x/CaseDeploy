<?php

    declare(strict_types = 1);
    require_once 'class-autoloader.inc.php';

    //retrieve the parameters
    $operator = $_POST['operator'];
    $num1 = intval($_POST['num1']);
    $num2 = intval($_POST['num2']);

    //create calculation object
    $simplyCalculation = new Calc($operator, $num1, $num2);

    //get result
    echo $simplyCalculation->GetResult();
    try {
        $result = $simplyCalculation->GetResult();
        
        {
            header("Location: ../Views/index.php?result={$result}");  
            die();
        }

    } catch (TypeError $e) {
        {
            header("Location: ../Views/index.php?result={$e->message}");  
            die();
        }
    }

?>