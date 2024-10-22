<?php

require_once '../src/bootstrap.php';
require_once '../src/lib/db.user.php';

$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

//Latin characters or digits, first character is always a letter, 1-20 chars.
const USERNAME_VALIDATION_REGEX = "/^[a-zA-Z][A-Za-z0-9]{0,19}$/";

if ($request_method == 'POST') {
    $errors = [];
    $inputs = [];

    //Username validation
    if (filter_has_var(INPUT_POST, 'username') && !empty($_POST['username'])) {
        $username = htmlspecialchars($_POST['username']);
        $username = trim($username);
        if (preg_match(USERNAME_VALIDATION_REGEX, $username)) {
            $user = UserActions::getUserByUsername($username);
            if (!empty($user)) {
                $errors['username'] = 'Имя пользователя занято!';
            } else {
                // $errors['username'] = '';
            }
        } else {
            $errors['username'] = 'Логин может содержать только латинские символы и
            цифры и иметь длину от 1 до 20 символов!';
        }

    } else {
        $errors['username'] = 'Логин не может быть пустым!';
    }
    $inputs['username'] = $username;

    //Email validation
    if (filter_has_var(INPUT_POST, 'email') && !empty($_POST['email'])) {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $email = strtolower($email);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $isEmailExists = UserActions::isEmailExists($email);
            if ($isEmailExists) {
                $errors['email'] = 'Эта электронная почта уже занята!';
            } else {
                // $errors['email'] = '';
            }
        } else {
            $errors['email'] = 'Электронная почта введена некорректно!';
        }
    } else {
        $errors['email'] = 'Электронная почта не может быть пустой!';
    }
    $inputs['email'] = $email;

    $isPasswordExists = filter_has_var(INPUT_POST, 'password') && !empty($_POST['password']);
    $isRepeatPasswordExists = filter_has_var(INPUT_POST, 'repeat-password') && !empty($_POST['repeat-password']);

    //Passwords validation
    if ($isPasswordExists && $isRepeatPasswordExists) {
        $password = htmlspecialchars($_POST['password']);
        $repeatPassword = htmlspecialchars(string: $_POST['repeat-password']);
        if ($password === $repeatPassword) {
            if (preg_match("/^[A-Za-z0-9]*$/", $password)) {
                if (mb_strlen($password) < 8 || mb_strlen($password) > 20) {
                    $errors['password'] = 'Пароль должен быть не менее 8 и не более 20 символов!';
                } else {
                    // $errors['password'] = '';
                }
            } else {
                $errors['password'] = 'Пароль должен содержать только латинские символы и цифры!';
            }
        } else {
            $errors['password'] = 'Пароли не совпадают!';
        }
    } else {
        $errors['password'] = 'Пароль должен быть не менее 8 и не более 20 символов!';
    }

    // If errors are present, return the form
    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        $_SESSION['inputs'] = $inputs;

        header('Location:' . 'signup');
        exit;
    } else {
        //Register the new user
        $isSignupSuccess = UserActions::registerUser($email, $username, $password);
        if ($isSignupSuccess) {
            $_SESSION['flash_message']['text'] = 'Регистрация прошла успешно!';
            $_SESSION['flash_message']['type'] = 'success';

            header('Location:' . 'login');
            exit;
        } else {
            $_SESSION['flash_message']['text'] = "Что-то пошло не так! Обратитесь к разработчику!";
            $_SESSION['flash_message']['type'] = 'danger';

            $_SESSION['errors'] = $errors;
            $_SESSION['inputs'] = $inputs;

            header('Location:' . 'signup');
            exit;
        }
    }
}