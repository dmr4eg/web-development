<?php
    // funkce validujici jmeno
    function validateName($name) {
        return strlen($name) >= 3;
    }

    // funkce validujici prijmeni
    function validateSurname($surname) {
        return strlen($surname) >= 5;
    }

    // funkce validujici email
    function validateEmail($email) {
        return strpos($email, '@') ? true : false;
    }
?>