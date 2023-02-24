<?php
    function createNote($name) {
        return array(
            "title" => $name,
            "text" => 'wweoweowefiwfoweijfowoeif',
            "uid" => '1',
            "id" => uniqid()
        );
        
    }

    

    $data = array(
        "notes" => []
    );


    for($i=0; $i < 100; $i++) {
        $name = 'koko'.$i;
        array_push($data['notes'],createNote($name, 'aoasdpoaks'));
    }

    $data['users'] = [array(
        "name" => 'koko',
			"password" => password_hash('buba', PASSWORD_DEFAULT),
			"id" => uniqid()
    )];

    file_put_contents('data.txt',json_encode($data));
?>