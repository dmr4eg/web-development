<?php
    // vytvorme databazovy soubor obsahujici strukturu ve formatu JSON (zretezenem)
    // vytvorme metody pro cteni a ukladani dat do souboru
    // napisme "controler" ktery bude zpracovavat data z formulare a ukladat je do souboru
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pridat poznamku</title>
</head>
<body>
    <nav>
        <a href="listNotes.php">vypis</a>
    </nav>

    <form method="post">
        <p>
            <label>
                Titulek
                <input type="text" name="title" value="" >
            <label>
        </p>
        <p>
            <label>
                Text
                <textarea name="text" cols="30" rows="10"></textarea>
            <label>
        </p>
        <input type="submit" value="Uloz poznamku" name="addNote">
    </form>
</body>
</html>