<?php
    // nacteni a vlozeni php knihovny pro validaci
    require "lib/validate.php";

    $formIsSent = isset($_POST['reg']);

    $name = '';
    $surname = '';
    $email = '';
    
    if ($formIsSent) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['pass1'];
        $password2 = $_POST['pass2'];
        $sex = isset($_POST['sex']) ? $_POST['sex'] : '';

        $validName = validateName($name);
        $validSurname = validateSurname($surname);
        $validEmail = validateEmail($email); 

        if ($validName && $validSurname && $validEmail) {
            // vse je OK, muzu dal pracovat s daty
            // treba v DB zalozit noveho uzviatele
            header('Location: welcome.php');
        } else {
            // chyba, zustavam na formluri a zobrazim chyby
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<?php
    include "includes/_htmlhead.php";
?>
<body>
    <?php 
        include "includes/_head.php";
    ?>
    <form method="post" action="">
        <div>
            <label>
                Jmeno
                <input type="text" name="name" value="<?= htmlspecialchars($name); ?>" id="">
            </label>
            <?php
                if (isset($validName) && $validName == false) {
                    echo '<span class="error">Error in input field</span>';
                }
            ?>
        </div>

        <div>
            <label>
                Prijmeni
                <input type="text" name="surname" value="<?= htmlspecialchars($surname); ?>" id="">
            </label>
            <?php
                if (isset($validSurname) && $validSurname == false) {
                    echo '<span class="error">Chybne vyplneno</span>';
                }
            ?>
        </div>
        <div>
            <label>
                Email
                <input type="email" name="email" value="<?= htmlspecialchars($email); ?>" id="">
            </label>
            <?php
                if (isset($validEmail) && $validEmail == false) {
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










 pattern="[A-Za-z0-9]{5,}" required