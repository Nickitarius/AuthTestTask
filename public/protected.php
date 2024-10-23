<?php require_once '../src/controllers/protected.controller.php'; ?>

<?php view('header', ['pageTitle' => 'Регистрация']) ?>

<div>

    <?php
    echo $_SESSION['t']
        ?>

    <p><?php
    if (isset($_SESSION['uf'])) {
        echo $_SESSION['uf'];
    } else {
        echo 'ERROR uf';
    } ?></p>



</div>

<?php view('footer'); ?>