<?php
$page = 'Login';

require_once '../templates/header.php';







// Login to the website
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email is already in use
    $what = array('id', 'email', 'password', 'role');
    $users = getFromDB($what, 'users', 'email = "' . $email . '"');



    // If the email is already in use, show an error message
    if (count($users) > 0) {
        $user = $users[0];
        $hassed = $user['password'];

        if (password_verify($password, $hassed)) {
            $_SESSION['user'] = $user;
            $_SESSION['user']['role'] = $user['role'];
            // flash('login', 'Je bent ingelogd', 'success');
            header('Location: dashboard');
        } else {
            // flash('login', 'Wachtwoord is incorrect', 'danger');
        }
    } else {
        // flash('login', 'Account niet gevonden', 'danger');
    }
}
?>

<div class="content" id="main-content">
    <div class="container" id="content-wrap">
        <!-- put page content in here -->


        <div class="container">


            <div class="row mb-5">
                <div class="col-3"></div>
                <div class="col-6">
                    <?php // flash('login'); ?>
                </div>
                <div class="col-3"></div>

            </div>
            <div class="row mb-5">
                <div class="col-3"></div>
                <div class="col-6">
                    <h1>
                    <?= $page ?>
                    </h1>
                </div>
                <div class="col-3"></div>

            </div>

            <div class="row mt-5">
                <div class="col-3"></div>

                <div class="col-6">

                    <form method="post" action="login">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email adres:</label>
                            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Wachtwoord:</label>
                            <input name="password" type="password" class="form-control" id="password">
                        </div>
                        <div class="mb-3">
                            <small class="form-text text-muted">Heb je nog geen account? Registreer je dan <a href="register">hier</a> direct</small>
                        </div>

                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </form>
                </div>
                <div class="col-3"></div>
            </div>

            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 d-flex flex-row-reverse">
                    <div class="form-text">
                        <a href="home" class="btn btn-secondary">
                            < Terug naar de homepagina</a>
                    </div>
                </div>
                <div class="col-3">
                </div>
            </div>
        </div>





    </div>
</div>



<?php

require_once '../templates/footer.php';

?>
