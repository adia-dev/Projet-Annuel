<?php


$dsn = 'mysql:dbname=myteam;host=localhost';
$user = 'root';
$mdp = 'root';

try {
    $dbh = new PDO($dsn, $user, $mdp);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connexion a la base de données : ' . $e->getMessage();
    die();
}
