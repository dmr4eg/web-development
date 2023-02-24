<?php
    // nacteme data z DB souboru
    // vypisme je cyklem do stranky
    // DU: pridejme editaci a mazani polozek

    require '_fileDB.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vypis poznamek</title>
    <style>
        div {
            background: #efefef;
            margin: 15px;
            padding: 10px;
            box-shadow: 4px 4px #a0a0a0;
        }
    </style>

    <?php
        $items = getNotes($data);
        foreach ($items as $note) {
            $title = htmlspecialchars($note['title']);
            $text = htmlspecialchars($note['text']);
            $id = $note['id'];
            echo '<div>';
            echo '<h2>'.$title.'</h2>';
            echo '<p>'.$text.'</p>';
            echo "<form method=\"post\"><button name=\"deleteNote\" value=\"$id\">Smaz</button></form>";
            echo "<form method=\"post\" action=\"addnote.php\"><button name=\"editNote\" value=\"$id\">Edituj</button></form>";
            echo '</div>';
        }
    ?>

</body>
</html>