<?php

function getDBConnection()
{
    //DB connection data
    $dbHost = 'mysql-8.2.local';
    $dbName = 'test_auth';
    $dbUser = 'root';
    $dbPassword = '';
    $dbms = 'mysql';

    $dsn = "$dbms:host=$dbHost;dbname=$dbName;charset=UTF8";

    try {
        $db = new PDO($dsn, $dbUser, $dbPassword);

        if ($db) {
            // echo "Connected to the $dbName database successfully!";
            return $db;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

