<?php
    // cookies
    //vyrobime cookie counter a s kazdou navstevou do ni zapiseme hodnotu o jedna vice
    //tuto hodnotu budeme vypisovat do stranky do h1

    // session
    //totez co vyse, jen pocet navstev ulozime do session


    // DU do cookie style ukladejte uzivatelovu preferenci css stylu (modry, cerveny vzhled)


    // soubory
    // totoz co vyse, ale tentokrat chceme ukladat a zobrazovat celkovy pocet navstev
    // tedy musime data ukladat na serveru do DB (souboru) a z nej pak cist celkovy pocet

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pocitadlo</title>

    <?= $selectedStyle; ?>
</head>
<body>
    <h1>Tuto stranku jste navstivil jiz: <?= $pocetNavstev; ?></h1>
    <h1>Tuto stranku jste navstivil jiz: <?= $_SESSION['pocitadloS']; ?></h1>
    <h1>Jste navstevnik: <?= $pocetPristupu;?></h1>

    <form action="" method="post">
        <fieldset>
            <legend>Styl</legend>
            <label for=""><input type="radio" value="1" name="style" <?= $style == 1 ? 'checked' : ''?> > modry</label>
            <label for=""><input type="radio" value="2" name="style" <?= $style == 2 ? 'checked' : ''?>> cerveny</label>
            <input type="submit" value="Vyber vzhledu" name="skinSelect">
        </fieldset>
    </form>
</body>
</html>