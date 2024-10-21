<?php include_once 'inc/header.php' ?>

<div class="row justify-content-md-center">

    <div class="col col-sm-4">
        <div class="card bg-color-body">

            <div class="card-header">
                Please, sign in.
            </div>

            <form class="vstack gap-3 p-4" action="subscribe.php" method="post">
                <div>
                    <label for="username">Username:</label>
                    <input type="text" name="username" required="required" placeholder="Enter your username"
                        class="form-control" />
                </div>

                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" required="required" placeholder="Enter your email"
                        class="form-control" />
                </div>

                <div>
                    <label for="password">Password*:</label>
                    <input type="password" name="password" required="required" minlength="8" pattern="[A-Za-z0-9]{8,20}"
                        placeholder="Enter your password" class="form-control" />
                </div>

                <div>
                    <label for="repeat-password">Repeat password*:</label>
                    <input type="password" name="repeat-password" required="required" minlength="8"
                        placeholder="Repeat your password" class="form-control" />
                </div>

                <div>
                    <small class="text-secondary">*Latin characters and numbers only, 8-20 symbols. </small>
                </div>

                <div class="container text-center">
                    <button type="submit" class="btn btn-primary w-100 mt-3">Sign up</button>
                </div>

            </form>

        </div>

    </div>

</div>

<?php include_once 'inc/footer.php' ?>