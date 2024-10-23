<?php

require_once __DIR__ . '/../bootstrap.php';

// Redirect to auth
if (!isset($_SESSION["username"])) {
    header("location: login.php");
    exit; // prevent further execution, should there be more code that follows
}
