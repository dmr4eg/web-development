<?php
    $note = array(
        'id' => uniqid(),
        'title' => 'Prvni poznamka',
        'text' => 'bla bla'
    );

    $data = array(
        'notes' => array($note)
    );

    var_dump($data);
    $encodedData = json_encode($data);
    echo "<br>";
    var_dump($encodedData);
    file_put_contents('notes.json', $encodedData);
?>