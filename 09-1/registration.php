<?php
  require "lib/validate.php";

  $formIsSent =  isset($_POST['reg']);

  $name = '';
  $surname = '';
  $email = '';

  if ($formIsSent) {
    // budu zpracovavat data z formulare
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $sex = isset($_POST['sex']) ? $_POST['sex'] : '';

    $validateName = valName($name);
    $validateSurname = valSurname($surname);
    $validateEmail = valEmail($email);

    if ($validateName && $validateSurname && $validateEmail) {
        // pokud je vse ve formu OK presmeruju
        // ulozeni dat do DB
        // poslu uzivale na welcome nebo neco takoveho
        header('Location: welcome.php');
    } else {
        // jinak chyba a zustavam na strance a vypisuju chyby
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrace</title>
    <link href="static/css/style.css" rel="stylesheet">
</head>
<body>
    <?php
        include "includes/_head.php";
    ?>
    <form action="" method="post">
        <div>
            <label>
                Jmeno
                <input type="text" name="name" value="<?= htmlspecialchars($name); ?>"  id="">
            </label>
            <?php
                if (isset($validateName) && $validateName == false) {
                    echo '<span class="error">Chybne vyplneno!</span>';
                }
            ?>
        </div>

        <div>
            <label>
                Prijmeni
                <input type="text" name="surname" value="<?= htmlspecialchars($surname); ?>" id="">
            </label>
            <?php
                if (isset($validateSurname) && $validateSurname == false) {
                    echo '<span class="error">Chybne vyplneno!</span>';
                }
            ?>
        </div>
        <div>
            <label>
                Email
                <input type="email" name="email" value="<?= htmlspecialchars($email); ?>" id="">
            </label>
            <?php
                if (isset($validateEmail) && $validateEmail == false) {
                    echo '<span class="error">Chybne vyplneno!</span>';
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