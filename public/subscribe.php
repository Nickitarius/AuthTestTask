<?php require_once '../src/controllers/subscribe.controller.php'; ?>

<?php view('header', ['pageTitle' => 'Регистрация']) ?>

<div>

   
    <p><?php
    if (isset($_SESSION['uf'])) {
        echo $_SESSION['uf'];
    } else {
        echo 'ERROR uf';
    } ?></p>



</div> 

<?php view('footer'); ?>