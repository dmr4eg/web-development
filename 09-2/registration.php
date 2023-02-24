<?php
    require "lib/validate.php";

    $name = '';
    $surname = '';
    $email = '';

    $formIsSent = isset($_POST['reg']);

    if ($formIsSent) {
        // zpracovavam data z formulare
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $sex = isset($_POST['sex']) ? $_POST['sex'] : '';

        $valResName = validateName($name);
        $valResSurname = validateSurname($surname);
        $valResEmail = validateEmail($email);
        
        if ($valResName && $valResSurname && $valResEmail) {
            header("Location: welcome.php");
            // je to OK
            // ulozim data, nebo neco takoveho
            // presmeruju z formulare pryc, treba na welcome.php
        } else {
            // nastala chyba musim uzivateli ukazat errory
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="static/css/style.css">
</head>
<body>
    <?php
        include "includes/_head.php";
    ?>
    <form action="registration.php
    " method="post">
        <div>
            <label>
                Jmeno
                <input type="text" name="name" value="<?= htmlspecialchars($name) ?>"  id="">
            </label>
            <?php
                if (isset($valResName) && $valResName == false) {
                    echo '<span class="error">Chybne vyplneno</span>';
                }
            ?>
        </div>

        <div>
            <label>
                Prijmeni
                <input type="text" name="surname" value="<?= htmlspecialchars($surname) ?>"  id="">
            </label>
            <?php
                if (isset($valResSurname) && $valResSurname == false) {
                    echo '<span class="error">Chybne vyplneno</span>';
                }
            ?>
        </div>
        <div>
            <label>
                Email
                <input type="email" name="email" value="<?= htmlspecialchars($email) ?>"  id="">
            </label>
            <?php
                if (isset($valResEmail) && $valResEmail == false) {
                    echo '<span class="error">Chybne vyplneno</span>';
                }
            ?>
        </div>
        <div>
            <label>
                Heslo
                <input type="password" name="pass1" id="">
            </label>
        </div>
        <div>
            <label>
                Heslo znovu
                <input type="password" name="pass2" id="">
            </label>
        </div>
        <div>
            Pohlavi
            <label>Muz <input type="radio" value="M" name="sex" id=""></label>
            <label>Zena<input type="radio" value="F" name="sex" id=""></label>  
        </div>
        <input type="submit" name="reg" value="Registrovat">

    </form>
</body>
</html>