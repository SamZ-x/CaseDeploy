<?php
 
    $nickname = "";
    $status = "";
    if(isset($_SESSION['userid']))
        $nickname = $_SESSION['nickname'];
    else
        $nickname = "session not set";
    
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
        <h2>logined user: </h2>
        <?php 
            echo $nickname.'<br>';
            if(!empty($nickname))
                echo '<button><a href="../Includes/logout.inc.php">Log out</a></button><br>';
        ?>
    </div>
    <div>
        <h2>Status:</h2>
        <?php
        echo $status;
        ?>
    </div>

    
</body>
</html>
