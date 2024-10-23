<?php

include_once '../src/lib/db.user.php';
include_once '../src/lib/remember.me.php';

function logUserIn($user)
{

    if (session_regenerate_id()) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id'] = $user['id'];

        return true;
    }

    return false;
}

function isLoggedIn()
{
    if (isset($_SESSION['username'])) {
        return true;
    }

    $token = filter_input(INPUT_COOKIE, 'remember_me', FILTER_UNSAFE_RAW);

    if ($token && token_is_valid($token)) {

        $user = UserActions::findUserByToken($token);

        if ($user) {
            return logUserIn($user);
        }
    }
    return false;
}

function requireLogin(): void
{
    if (!isLoggedIn()) {
        header('Location:' . 'login');
        exit;
    }
}

function logout(): void
{
    if (isLoggedIn()) {
        UserActions::deleteAllTokensOfUser($_SESSION['user_id']);

        unset($_SESSION['username'], $_SESSION['user_id']);

        if (isset($_COOKIE['remember_me'])) {
            unset($_COOKIE['remember_me']);
            setcookie('remember_user', null, -1);
        }

        session_destroy();
        header('Location:' . 'login');
        exit;
    }
}

function currentUsername()
{
    if (isLoggedIn()) {
        return $_SESSION['username'];
    }
    return null;
}
