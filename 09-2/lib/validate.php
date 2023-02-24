<?php
    function validateName($name) {
        return strlen($name) >= 3;
    }

    function validateSurname($surname) {
        return strlen($surname) >= 5;
    }

    function validateEmail($email) {
        return strpos($email, '@') ? true : false;
    }
?>