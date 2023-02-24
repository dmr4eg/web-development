<?php
    $note = array(
        'id' => uniqid(),
        'title' => 'Prvni poznamka',
        'text' => 'bla bla bla'
    );

    $data = array(
        'notes' => array($note)
    );

    $encodedData = json_encode($data);

    file_put_contents('notes.json', $encodedData);
?>