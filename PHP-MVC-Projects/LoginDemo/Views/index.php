<?php
 
    $status = "";
    if(isset($_GET['error']))
        $status = $_GET['error'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>
</head>
<body>
    <div>
        <h2>Result: <?php echo $status?></h2>
    </div>
</body>
</html>
