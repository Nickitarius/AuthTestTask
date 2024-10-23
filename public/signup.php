<?php require_once '../src/controllers/signup.controller.php'; ?>

<?php view('header', ['pageTitle' => 'Регистрация']) ?>

<div class="row justify-content-md-center">

    <div class="col col-sm-4">
        <div class="card bg-color-body">

            <div class="card-header">
                Форма регистрации.
            </div>

            <?php
            // Read inputs and errors from previous submission attempt.
            $errors = [];
            $inputs = [];
            $formStyle = "needs-validation";

            if (isset($_SESSION['errors'])) {
                $errors = $_SESSION['errors'];
                unset($_SESSION['errors']);
            }
            if (isset($_SESSION['inputs'])) {
                $inputs = $_SESSION['inputs'];
                unset($_SESSION['inputs']);
            }

            ?>

            <form class="vstack gap-3 p-4 needs-validation" id="signup-form" action="signup.php" method="post"
                novalidate>


                <div>
                    <?php
                    $usernameClass = empty($errors['username']) ? '' : 'is-invalid';
                    $usernameValue = empty($inputs['username']) ? '' : $inputs['username'];
                    $usernameError = empty($errors['username']) ?
                        "Логин может содержать только латинские символы и цифры и иметь длину от 1 до 20 символов!"
                        : $errors['username'];
                    ?>

                    <label for="username">Логин:</label>
                    <input type="text" name="username" id="username" required="required" placeholder="Введите логин"
                        class="form-control <?= $usernameClass; ?>" value="<?= $usernameValue; ?>"
                        pattern="^[a-zA-Z][A-Za-z0-9]{0,19}$" minlength="2" maxlength="20" />
                    <div class="invalid-feedback" id="username-error">
                        <?= $usernameError ?>
                    </div>
                </div>

                <div>
                    <?php
                    $emailClass = empty($errors['email']) ? '' : 'is-invalid';
                    $emailValue = empty($inputs['email']) ? '' : $inputs['email'];
                    $emailError = empty($errors['email']) ? '' : $errors['email'];
                    ?>

                    <label for="email">Электронная почта:</label>
                    <input type="email" name="email" id="email" required="required" placeholder="email@example.com"
                        class="form-control <?= $emailClass; ?>" value="<?= $emailValue; ?>" />
                    <div class="invalid-feedback" id="email-error">
                        <?= $emailError; ?>
                    </div>
                </div>

                <div>
                    <?php
                    $passwordClass = empty($errors['password']) ? '' : 'is-invalid';
                    $passwordError = empty($errors['password']) ? '' : $errors['password'];
                    ?>

                    <label for="password">Пароль*:</label>
                    <input type="password" name="password" id="password" required="required" minlength="8"
                        maxlength="20" pattern="^[A-Za-z0-9]{8,20}$" placeholder="Введите пароль"
                        class="form-control <?= $passwordClass; ?>" />
                    <div class="invalid-feedback" id="password-error">
                        <?= $passwordError; ?>
                    </div>
                </div>

                <div>
                    <label for="repeat-password">Повторите пароль*:</label>
                    <input type="password" name="repeat-password" id="repeat-password" required="required" minlength="8"
                        maxlength="20" pattern="^[A-Za-z0-9]{8,20}$" placeholder="Повторите пароль"
                        class="form-control <?= $passwordClass; ?>" />
                    <div class="invalid-feedback" id="repeat-password-error">
                        <?= $passwordError; ?>
                    </div>
                </div>

                <div>
                    <small class="text-secondary">*Пароль должен содержать только латинские символы и цифры. Пароль
                        должен быть не менее 8 символов.</small>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="yes" name="remember-me" id="remember-me">
                    <label class="form-check-label" for="remember-me">
                        Запомнить меня
                    </label>
                </div>

                <div class="container text-center">
                    <button type="submit" class="btn btn-primary w-100 mt-3">Создать учётную запись</button>
                </div>

            </form>

        </div>

    </div>

</div>

<script src="js/signup.validation.js" type="module"></script>

<?php view('footer'); ?>