<?php
    require "_users.php";

    session_start();
    $uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : NULL;

    if ($uid) {
        $user = getUserByUid($users, $uid);
    } else {
        //header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ahoj mily uzivateli, <?= $uid ? $user['name'].' '.$user['surname']: 'Ses neprihlasenej';?></h1>

    <?php
        if ($uid) {
            echo '<a href="logout.php">Odhlasit se</a>';
        } else {
            echo '<a href="login.php">prihlas se</a>';
        }
    ?>
    
</body>
</html>