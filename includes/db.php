<?php


$dsn = 'mysql:dbname=myteam;host=localhost';
$user = 'myteam';
$pwd = 'myteam';

try {
    $dbh = new PDO($dsn, $user, $pwd);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connexion a la base de données : ' . $e->getMessage();
    die();
}
