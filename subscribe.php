<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <p><?php
        if (isset($_POST['name'])) {
            echo $_POST['name'];
        } else {
            echo 'ERROR NAME';
        } ?></p>

        <p><?php
        if (isset($_POST['email'])) {
            echo $_POST['email'];
        } else {
            echo 'ERROR EMAIL';
        } ?></p>
    </div>
</body>

</html>