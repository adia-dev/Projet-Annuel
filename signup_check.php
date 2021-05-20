<?php

include 'includes/db.php';
include 'includes/functions.php';


if (!isset($_POST['submit'])) {
    header('location: signup.php?accessdenied');
    exit();
}

if (emptyInputs([$_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['age'], $_POST['pwd'], $_POST['pwdrepeat']])) {
    header('location: signup.php?message=emptyinput');
    exit();
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('location: signup.php?message=invalidemail');
    exit();
}

if (!is_between(strlen($_POST['pwd']), 6, 12)) {
    header('location: signup.php?message=passwordlenght');
    exit();
}

if ($_POST['pwd'] !== $_POST['pwdrepeat']) {
    header('location: signup.php?message=passworddontmatch');
    exit();
}

if (invalidAge($_POST['age'])) {
    header('location: signup.php?message=invalidAge');
    exit();
}

if (userexists($dbh, $_POST['email'])) {
    header('location: signup.php?message=userexists');
    exit();
}

if (!createUser($dbh, $_POST['firstname'], $_POST['lastname'], $_POST['age'], $_POST['email'], $_POST['pwd'])) {
    header('location: signup.php?message=createuserfailure');
    exit();
}


header('location: signup.php?message=accountcreated');
exit();
