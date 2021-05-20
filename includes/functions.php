<?php

// * Utils

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


function userexists($dbh, $email)
{
    $q = 'SELECT email FROM users WHERE email = :email;';
    $stmt = $dbh->prepare($q);
    $status = $stmt->execute(
        array(
            'email' => $email
        )
    );

    if ($status) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result['email'])
            return true;
    }

    return false;
}

// * End Utils

// * Signup
function is_between($value, $min, $max)
{
    if (!is_numeric($value))
        return false;

    return ($value >= $min && $value <= $max);
}


function invalidAge($age)
{
    if (!is_numeric($age))
        return true;

    return $age < 18;
}

function createUser($dbh, $firstname, $lastname, $age, $email, $pwd)
{
    $q = 'INSERT INTO users (firstname, lastname, age, email, password) VALUES(:firstname, :lastname, :age, :email, :password);';
    $stmt = $dbh->prepare($q);

    $status = $stmt->execute(
        array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'age' => $age,
            'email' => $email,
            'password' => password_hash($pwd, PASSWORD_DEFAULT)
        )
    );

    if ($status) {
        return true;
    }

    return false;
}


// * End Signup


// * Login

function validpassword($dbh, $email, $pwd)
{
    $q = 'SELECT password FROM users WHERE email = :email;';
    $stmt = $dbh->prepare($q);
    $status = $stmt->execute(
        array(
            'email' => $email
        )
    );

    if ($status) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result['password']) {
            return password_verify($pwd, $result['password']);
        }
    }

    return false;
}

// * End Login
