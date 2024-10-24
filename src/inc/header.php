<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <title><?= $pageTitle ?? 'Test app' ?></title>
</head>

<body class="bg-body-tertiary">

    <nav class="navbar navbar-expand-lg bg-dark text-bg-dark sticky-top border-bottom mb-5 py-3" data-bs-theme="dark">
        <div class="container">

            <a class="navbar-brand" href="/">Test App</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/protected">Внутренняя страница</a>
                        </li>
                    <?php endif; ?>
                </ul>

                <?php if (isLoggedIn()): ?>

                    <div class="d-flex align-items-end ">
                        <span href="/signup" class="navbar-text p-2">
                            <?php echo 'Здравствуйте, ' . currentUsername() ?>
                        </span>
                        <a href="/logout" class="btn btn-outline-danger p-2 me-2">Выйти</a>
                    </div>


                <?php else: ?>

                    <div class="d-flex align-items-end ">
                        <a href="/login" class="btn btn-outline-light p-2 me-2">Войти</a>
                        <a href="/signup" class="btn btn-outline-warning p-2">Зарегистрироваться</a>
                    </div>

                <?php endif; ?>


            </div>
        </div>

    </nav>

    <main class="container pb-5 mb-5">

        <?php if (isset($_SESSION['flash_message'])): ?>
            <?php
            $flashText = $_SESSION['flash_message']['text'];
            $flashType = $_SESSION['flash_message']['type'];
            unset($_SESSION['flash_message']);
            ?>

            <div class="my-5 alert alert-<?php echo $flashType; ?>" id="flash-message" role="alert">
                <?php echo $flashText; ?>
            </div>
        <?php endif; ?>