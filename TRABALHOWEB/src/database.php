<?php
    $host = 'localhost';
    $dbname = 'form';
    $username = 'root';
    $password = '';

    $mysqli = new mysqli(
        hostname: $host, 
        username: $username, 
        password: $password, 
        database: $dbname);

    if ($mysqli->connect_errno) {
        die("Erro de conexão: " . $mysqli->connect_error);
    }

    return $mysqli
 ?>