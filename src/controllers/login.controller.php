<?php

require_once '../src/bootstrap.php';
require_once '../src/lib/db.user.php';

$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

if (isLoggedIn()) {
    header('Location:' . 'index');
    exit;
}

if ($request_method == 'POST') {
    $isError = false;

    if (filter_has_var(INPUT_POST, 'username') && !empty($_POST['username'])) {
        $username = htmlspecialchars($_POST['username']);
        $username = trim($username);
    } else {
        $error = true;
    }

    $isPasswordExists = filter_has_var(INPUT_POST, 'password') && !empty($_POST['password']);
    if ($isPasswordExists) {
        $password = htmlspecialchars($_POST['password']);
    } else {
        $error = true;
    }

    if (!$isError) {
        $user = UserActions::getUserByUsername($username);
        if (password_verify($password, $user['password'])) {
            logUserIn($user);
            header('Location:' . 'protected.php');
            exit;
        }
        // $isPasswordValid = ;
    }

    if ($isError) {
        $_SESSION['error'] = 'Логин или пароль введены неверно!';

        header('Location:' . 'signup');
        exit;
    }
}