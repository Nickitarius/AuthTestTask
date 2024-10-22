<?php

const PAGE_TITLE = 'Регистрация';
$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

$errors = [];
$inputs = [];

if ($request_method == 'GET') {
    require 'signup.view.php';
} elseif ($request_method == 'POST') {
    if (filter_has_var(INPUT_POST, 'username')) {
        $username = htmlspecialchars($_POST['username']);

        $usernameValidationRegex = "/^[a-zA-Z][A-Za-z0-9]{0,19}$/";
        echo "<div class='caution'>Name is $username</div>";
        if (preg_match($usernameValidationRegex, $username)) {

        }
    }


    // If errors are present, return the form
    if (count($errors) > 0) {
        require 'signup.php';
    }

    require 'subscribe.php';
}