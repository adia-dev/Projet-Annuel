<?php

include 'includes/db.php';
include 'includes/functions.php';


if (!isset($_POST['submit'])) {
    header('location: login.php?accessdenied');
    exit();
}

if (emptyInputs([$_POST['email'], $_POST['pwd']])) {
    header('location: login.php?message=emptyinput');
    exit();
}

if (!userexists($dbh, $_POST['email'])) {
    header('location: login.php?message=userdoesnotexist');
    exit();
}

if (!validpassword($dbh, $_POST['email'], $_POST['pwd'])) {
    header('location: login.php?message=wrongpassword');
    exit();
}

$_SESSION['uid'] = $_POST['email'];
header('location: index.php?message=connected');
exit();
