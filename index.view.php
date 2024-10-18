<?php include_once 'inc/header.php' ?>


<!-- <div class="container"> -->
<div class="row justify-content-md-center">

    <div class="col col-sm-4">
        <div class="card bg-color-body">

            <div class="card-header">
                Please, sign in.
            </div>

            <form class="container p-4" action="subscribe.php" method="post">

                <div class="mb-2">
                    <label for="username">Username:</label>
                    <input type="text" id="username" required="required" placeholder="Enter your username"
                        class="form-control" />
                </div>

                <div class="mb-2">
                    <label for="email">Email:</label>
                    <input type="email" id="email" required="required" placeholder="Enter your email"
                        class="form-control" />
                </div>

                <div class="mb-2">
                    <label for="password">Password:</label>
                    <input type="text" id="password" required="required" placeholder="Enter your password"
                        class="form-control" />
                </div>

                <div class="mb-2">
                    <label for="repeat-password">Repeat password:</label>
                    <input type="text" id="repeat-password" required="required" placeholder="Repeat your password"
                        class="form-control" />
                </div>


                <button type="submit" class="btn btn-primary w-75 mt-3">Sign up</button>

            </form>

            <!-- <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div> -->

        </div>

    </div>

</div>

<!-- </div> -->

</main>

<?php include_once 'inc/footer.php' ?>