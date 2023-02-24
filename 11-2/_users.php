<?php
    $users = array(
        array(
            'id' => 1, //uniqid(),
            'username' => 'koko',
            'name' => 'Zdenek',
            'surname' => 'Vlach',
            'email' => 'vlachzd1@cvut.cz',
            'passwordHash' => password_hash('heslo123', PASSWORD_DEFAULT)
        ),
        array(
            'id' => 2, //uniqid(),
            'username' => 'xklima',
            'name' => 'Martin',
            'surname' => 'Klima',
            'email' => 'xkoko@cvut.cz',
            'passwordHash' => password_hash('megas1lne_hesl0', PASSWORD_DEFAULT)
        )
    );

    function getUserByUsername($users, $username) {
        foreach($users as $user) {
            if ($username == $user['username']) {
                return $user;
            }
        }
        return NULL;
    }

    function getUserByUid($users, $uid) {
        foreach($users as $user) {
            if ($uid == $user['id']) {
                return $user;
            }
        }
        return NULL;
    }

?>