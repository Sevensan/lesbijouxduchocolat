<?php

/*
retourne une connexion à la BDD
    @return PDO
*/

function getPDO(): PDO
{
    $servername = 'localhost';
    $dbname = 'bijouxduchocolat';
    $user = 'root';
    $pass = '';
    
    $pdo = new PDO("mysql:host=$servername;charset=utf8;dbname=$dbname",$user,$pass,[
        PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,
        // mode de requête par défaut qui renvoit des tableaux associatifs
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    return $pdo;
}

?>