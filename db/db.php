<?php
    $connect = mysqli_connect('localhost', 'root', '', 'portal_city_problems');

    if (!$connect) {
        die('Error connect to DataBase');
    }
?>