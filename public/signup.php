<?php

$page_title = 'Sign up';
$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

$errors = [];
$inputs = [];

if ($request_method == 'GET') {
    require 'signup.view.php';
} elseif ($request_method == 'POST') {
    if (filter_has_var(INPUT_POST, 'username')) {
        $username = htmlspecialchars($_POST['username']);
        echo "Name is $username";
    }


    // If errors are present, return the form
    if (count($errors) > 0) {
        require 'signup.php';
    }

    require 'subscribe.php';
}