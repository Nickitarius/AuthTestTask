<?php

function logUserIn($user)
{
    session_regenerate_id();

    $_SESSION['username'] = $user['username'];
    $_SESSION['user_id'] = $user['id'];
}

function isLoggedIn()
{
    return isset($_SESSION['username']);
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
        unset($_SESSION['username'], $_SESSION['user_id']);
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
