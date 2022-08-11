<?php
    $username = 'mbojanic';
    $password = 'MB-1285la';
    $server   = 'mysql:host=localhost;dbname=solutions_mb';

    try {
        $connect = new PDO($server, $username, $password);
    } catch (Exception $error) {
        print $error->getMessage();
    }
?>