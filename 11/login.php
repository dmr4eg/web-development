<?php
    require '_users.php';

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username && $password) {
            $user = getUserByUserName($users, $username);
            
            if ($user) {
                if (password_verify($password,$user['passwordHash'])) {
                    session_start();
                    $_SESSION['uid'] = $user['id'];
                    header('Location: welcome.php');
                } else {
                  $error = 'Prihlasovaci udaje nebyly zadany spravne';  
                }
            } else {
                $error = 'Prihlasovaci udaje nebyly zadany spravne';
            }
        } else {
            $error = 'Prihlasovaci udaje nebyly zadany spravne';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Moje app - prihlaseni</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label>
                Username:
                <input type="text" value="<?= isset($username)? $username : ''?>"  name="username">
            </label>
        </div>
        <div>
            <label>
                Password:
                <input type="password" name="password">
            </label>
        </div>

        <input type="submit" name="login" value="Prihlasit se">

        <?php
            if (isset($error)) {
                echo "<p>$error</p>";
            }
        ?>
    </form>
</body>
</html>