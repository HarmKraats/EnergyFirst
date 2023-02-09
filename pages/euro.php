
<?php
$page = 'Euro';
require_once '../templates/header.php';
if(!isLoggedIn()){
    header('Location: home');
}
?>


<main>
    <div class="container">
        <?php require_once '../templates/sidebar.php'; ?>
        <div class="row">
            <div class="col">
                <p>Hier kun je filteren op jaar, maand en dag </p>
            </div>
        </div>
    </div>
</main>
