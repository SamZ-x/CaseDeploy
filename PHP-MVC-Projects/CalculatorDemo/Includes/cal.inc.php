<?php

    //retrieve the parameters
    $operator = $_POST['operator'];
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    //create calculation object
    $simplyCalculation = new Calculation($operator, $num1, $num2);

    //get result
    echo $simplyCalculation->GetResult();

?>