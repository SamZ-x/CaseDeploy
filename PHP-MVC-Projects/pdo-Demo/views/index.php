<?php

    include '../includes/class-autoloader.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pdo Demo</title>
</head>
<body>
    <div>
        <h1>Dpo Demo</h1>
    </div>
    <?php
        $testObj = new test();
        echo "<strong>Get all roles:</strong>". '<br>';
        $testObj->getRoles();  
        echo "<strong>Get one role:</strong>". '<br>';   
        $testObj->getRolesStmt(10,'boss');
        echo "<strong>add one role:</strong>". '<br>';
        $testObj->setRolesStmt('test',45,'testrole');  
    ?>
</body>
</html>