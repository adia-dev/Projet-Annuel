<?php

include 'includes/db.php';
include 'includes/functions.php';

date_default_timezone_set('Europe/Paris');


if (!isset($_POST['connexionsubmit'])) {
    header('location: login.php?accessdenied');
    exit();
}

if (emptyInputs([$_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['birthdate'], $_POST['pwd'], $_POST['pwdrepeat']])) {
    header('location: login.php?message=emptyinput');
    exit();
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('location: login.php?message=invalidemail');
    exit();
}

if (!is_between(strlen($_POST['pwd']), 6, 12)) {
    header('location: login.php?message=passwordlenght');
    exit();
}

if ($_POST['pwd'] !== $_POST['pwdrepeat']) {
    header('location: login.php?message=passworddontmatch');
    exit();
}

if (invalidbirthdate($_POST['birthdate'])) {
    header('location: login.php?message=invalidbirthdate');
    exit();
}

if (!createUser($dbh, $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['pwd'])) {
    header('location: login.php?message=createuserfailure');
    exit();
}


header('location: login.php?message=accountcreated');
exit();
