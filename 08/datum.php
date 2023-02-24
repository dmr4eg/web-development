<?php
    function vypisDatum($datum) {
        $parsedDatum = explode('.', $datum);
        //var_dump($parsedDatum);
        $den = $parsedDatum[0];
        $mesic =$parsedDatum[1];
        $rok = $parsedDatum[2];

        $dny_v_tydnu = array(
            1 => "pondeli",
            "utery",
            "streda",
            "ctvrtek",
            "patek",
            "sobota",
            "nedele"
        );

        //var_dump($dny_v_tydnu);

        $timestamp = mktime(0,0,0,$mesic,$den,$rok);
        $den_v_tydnu = date('N', $timestamp);
        return "$datum je $dny_v_tydnu[$den_v_tydnu]";
    }


    $datumy = ['8.7.1852', '4.6.2021', '9.10.810'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date</title>
</head>
<body>
  <h1>
    Dnešní datum je:
    <?= date('j.n.Y'); ?>
  </h1> 
  
  <p>
    <?php 
        foreach($datumy as $index => $datum) {
            echo $index.'. '.vypisDatum($datum).'<br>';
        }
    ?>
  </p>
</body>
</html>