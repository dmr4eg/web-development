<?php
    function valName ($name) {
        return strlen($name) >= 3;
    }

    function valSurname ($surname) {
        return strlen($surname) >= 5;
    }

    function valEmail ($email) {
        return strpos($email, '@') ? true : false;
    }
?>