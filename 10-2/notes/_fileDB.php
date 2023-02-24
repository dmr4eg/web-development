<?php
    define('DBFILE','notes.json');

    $data = file_get_contents(DBFILE);

    if ($data == NULL) {
        include '_createDBFile.php';
    }

    //var_dump($data);

    $data = json_decode($data, JSON_OBJECT_AS_ARRAY);


    function addNote($data, $title, $text) {
        $newNote = array(
            'id' => uniqid(),
            'title' => $title,
            'text' => $text
        );

        array_push($data['notes'], $newNote);
        $encodedData = json_encode($data);
        file_put_contents(DBFILE, $encodedData);
    }

    function getNotes($data) {
        return $data['notes'];
    }

?>