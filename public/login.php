<?php require_once '../src/controllers/login.controller.php'; ?>

<?php view('header', ['pageTitle' => 'Вход']) ?>

<div class="row justify-content-md-center">

    <div class="col col-sm-4">
        <div class="card bg-color-body">

            <div class="card-header">
                Войдите в учётную запись.
            </div>

            <form class="vstack gap-3 p-4 needs-validation" id="login-form" action="login.php" method="post" novalidate>

                <?php if (isset($_SESSION['error'])): ?>
                    <?php
                    $isError = $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>

                    <div class="my-5 alert alert-danger" id="flash-message" role="alert">
                        <?php echo $isError; ?>
                    </div>
                <?php endif; ?>

                <div>


                    <label for="username">Логин:</label>
                    <input type="text" name="username" id="username" required="required" placeholder="Введите логин"
                        class="form-control" pattern="^[a-zA-Z][A-Za-z0-9]{0,19}$" minlength="2" maxlength="20" />
                    <div class="invalid-feedback" id="username-error">
                        Логин заполнен некорректно!
                    </div>
                </div>

                <div>

                    <label for="password">Пароль*:</label>
                    <input type="password" name="password" id="password" minlength="8" maxlength="20"
                        pattern="^[A-Za-z0-9]{8,20}$" placeholder="Введите пароль" required="required"
                        class="form-control" />
                    <div class="invalid-feedback" id="password-error">
                        Пароль заполнен некорректно!
                    </div>
                </div>

                <div class="container text-center">
                    <button type="submit" class="btn btn-primary w-100 mt-3">Войти</button>
                </div>

                <div class="container text-center ">Или</div>

                <div class="container text-center"><a class="link-secondary" href="/signup">Зарегистрироваться</a></div>

            </form>

        </div>

    </div>

</div>

<script src="js/login.validation.js" type="module"></script>

<?php view('footer'); ?>