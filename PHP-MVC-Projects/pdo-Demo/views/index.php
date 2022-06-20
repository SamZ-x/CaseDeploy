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
        $testObj = new RolesView();
        $testObj->showRoles(10);
        $testObj->showRoles(10);
    ?>
</body>
</html>