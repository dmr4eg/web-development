<?php
    session_start();

    // cookies
    //vyrobime cookie counter a s kazdou navstevou do ni zapiseme hodnotu o jedna vice
    //tuto hodnotu budeme vypisovat do stranky do h1

    $pocetNavstev = 1;
    $time = time() + 60*60*24;

    if (isset($_COOKIE['counter'])) {
        $pocetNavstev = $_COOKIE['counter'] + 1;
        if($pocetNavstev > 20) {
            $time = time() - 1;
        }
    }


    setcookie('counter', $pocetNavstev, $time,'/~vlachzd1','.toad.cz');



    // session
    //totez co vyse, jen pocet navstev ulozime do session

    $_SESSION['pocitadloSession'] = isset($_SESSION['pocitadloSession']) ? $_SESSION['pocitadloSession'] + 1 : 1;


    if ($_SESSION['pocitadloSession'] > 20) {
        session_unset();
        session_destroy();
    }


    // DU do cookie style ukladejte uzivatelovu preferenci css stylu (modry, cerveny vzhled)


    // soubory
    // totoz co vyse, ale tentokrat chceme ukladat a zobrazovat celkovy pocet navstev
    // tedy musime data ukladat na serveru do DB (souboru) a z nej pak cist celkovy pocet

    $data = intval(file_get_contents('pocitadlo.txt'));

    $celkovyPocetNavstev = $data + 1;

    file_put_contents('pocit
    $title = '';
    $text = '';adlo.txt',$celkovyPocetNavstev);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pocitadlo</title>
</head>
<body>
    <h1>Tuto stranku jste navstivil jiz: <?= $pocetNavstev; ?></h1>
    <h1>Tuto stranku jste navstivil jiz: <?= $_SESSION['pocitadloSession']; ?></h1>
    <h1>Tuta stranka byla navstivena jiz: <?= $celkovyPocetNavstev; ?></h1>
    
</body>
</html>