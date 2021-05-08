<?php


function emptyInputs($inputs)
{
    if (!is_array($inputs))
        return true;

    foreach ($inputs as $input) {
        if (empty($input))
            return true;
    }

    return false;
}

function is_between($value, $min, $max)
{
    if (!is_numeric($value))
        return false;

    return ($value >= $min && $value <= $max);
}


function invalidbirthdate($date)
{
    $time = strtotime($date);

    if (!$time)
        return true;

    $day = date('d', $time);
    $month = date('m', $time);
    $year = date('Y', $time);


    if (!checkdate($month, $day, $year))
        return true;

    if (date('Y') - $year < 18)
        return true;

    return false;
}

function createUser($dbh, $firstname, $lastname, $email, $pwd)
{
    $q = 'INSERT INTO users (firstname, lastname, email, password) VALUES(:firstname, :lastname, :email, :password);';
    $stmt = $dbh->prepare($q);

    $status = $stmt->execute(
        array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => password_hash($pwd, PASSWORD_DEFAULT)
        )
    );

    if ($status) {
        return true;
    }

    return false;
}
