<?php require_once '../src/controllers/subscribe.controller.php'; ?>

<?php view('header', ['pageTitle' => 'Регистрация']) ?>

<div>

    <?php echo htmlspecialchars($_SESSION['username']); ?>
    <p><?php
    if (isset($_SESSION['username'])) {
        echo htmlspecialchars($_SESSION['username']);
    } else {
        echo 'ERROR NAME';
    } ?></p>

    <p><?php
    if (filter_has_var(INPUT_POST, 'username')) {
        echo htmlspecialchars($_SESSION['username']);
    } else {
        echo 'no user';
    } ?></p>

    <p><?php
    if (isset($_SESSION['email'])) {
        echo htmlspecialchars($email);
    } else {
        echo 'ERROR EMAIL';
    } ?></p>

    <?php
    $passwordHash = $_SESSION['password_hash'];
    echo $passwordHash; ?>

    <p>Password is verified:
        <?php $pass = "12345678";
        echo password_verify($pass, $passwordHash);

        echo $_SESSION['flash_message']; ?>
    </p>

</div>

<?php view('footer'); ?>