<?php include_once 'inc/header.php' ?>

<div>
    <p><?php
    if (isset($_POST['name'])) {
        echo htmlspecialchars($_POST['name']);
    } else {
        echo 'ERROR NAME';
    } ?></p>

    <p><?php
    if (isset($_POST['email'])) {
        echo htmlspecialchars($_POST['email']);
    } else {
        echo 'ERROR EMAIL';
    } ?></p>


</div>

<?php include_once 'inc/footer.php' ?>
