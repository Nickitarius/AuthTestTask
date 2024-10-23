<?php

require_once __DIR__ . '/../bootstrap.php';

// Redirect to auth
if (!isset($_SESSION["username"])) {
    header("location: login.php");
    exit; // prevent further execution, should there be more code that follows
}

function APIcall($method, $url, $data)
{
    $curl = curl_init();

    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
    }

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'APIKEY: RegisteredAPIkey',
        'Content-Type: application/json',
    ));

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $result = curl_exec($curl);

    if (!$result) {
        echo ("Connection failure!");
    }
    curl_close($curl);
    return $result;
}

$url = "https://dog.ceo/api/breeds/image/random";
$data = [
    'collection' => 'RequiredAPI'
];

$response = APIcall('GET', $url, $data);
$pictureSrc = json_decode($response, true)['message'];