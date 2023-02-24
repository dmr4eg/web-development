<?php
    include "_shared.php";

    if (isset($_POST['name'])) {
        $user = getUserByName($_POST['name'], $data);
        if (!$user) {
            echo "OK";
        } else {
            echo "KO";
        }
    }
?>