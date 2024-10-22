<?php include_once 'inc/header.php' ?>

<div class="row justify-content-md-center">

    <div class="col col-sm-4">
        <div class="card bg-color-body">

            <div class="card-header">
                Форма регистрации.
            </div>

            <form class="vstack gap-3 p-4 needs-validation" id="signup-form" action="signup.php" method="post"
                novalidate>
                <div>
                    <label for="username">Логин:</label>
                    <input type="text" name="username" id="username" required="required" placeholder="Введите логин"
                        class="form-control <?php echo empty($errors['username']) ? '' : ' is-invalid'; ?>"
                        pattern="^[a-zA-Z][A-Za-z0-9]{0,19}$" value="<?php echo empty($username) ? '' : $username ?>" />
                    <div class="invalid-feedback" id="username-error">
                        <?php
                        echo empty($errors['username']) ?
                            "Логин может содержать только латинские символы и цифры и иметь длину от 1 до 20 символов!"
                            : $errors['username'] ?>
                    </div>
                </div>

                <div>
                    <label for="email">Электронная почта:</label>
                    <input type="email" name="email" id="email" required="required" placeholder="email@example.com"
                        class="form-control <?php echo empty($errors['email']) ? '' : ' is-invalid'; ?>"
                        value="<?php echo empty($email) ? '' : $email ?>" />
                    <div class="invalid-feedback" id="email-error">
                        <?php echo empty($errors['email']) ? '' : $errors['email']; ?>
                    </div>
                </div>

                <div>
                    <label for="password">Пароль*:</label>
                    <input type="password" name="password" id="password" required="required" minlength="8"
                        pattern="^[A-Za-z0-9]{8,20}$" placeholder="Введите пароль"
                        class="form-control <?php echo empty($errors['password']) ? '' : ' is-invalid'; ?>" />
                    <div class="invalid-feedback" id="password-error">
                        <?php echo empty($errors['password']) ? '' : $errors['password']; ?>
                    </div>
                </div>

                <div>
                    <label for="repeat-password">Повторите пароль*:</label>
                    <input type="password" name="repeat-password" id="repeat-password" required="required" minlength="8"
                        pattern="^[A-Za-z0-9]{8,20}$" placeholder="Повторите пароль"
                        class="form-control <?php echo empty($errors['password']) ? '' : ' is-invalid'; ?>" />
                    <div class="invalid-feedback" id="repeat-password-error">
                        <?php echo empty($errors['password']) ? '' : $errors['password']; ?>
                    </div>
                </div>

                <div>
                    <small class="text-secondary">*Пароль должен содержать только латинские символы и цифры. Пароль
                        должен быть не менее 8 символов.</small>
                </div>

                <div class="container text-center">
                    <button type="submit" class="btn btn-primary w-100 mt-3">Sign up</button>
                </div>

            </form>

        </div>

    </div>

</div>

<script src="js/signup.validation.js" type="module"></script>

<?php include_once 'inc/footer.php' ?>