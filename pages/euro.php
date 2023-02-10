<?php
require_once '../includes/autoload.php';
onAllowedPage();
$page = 'Euro';

require_once '../templates/header.php';
?>


<main>
    <div class="container">
        <?php require_once '../templates/sidebar.php'; ?>
        <div class="row">
            <div class="col">
                <p>Hier kun je filteren op jaar, maand en dag </p>
            </div>
        </div>
        <div class="row">

            
        </div>
    </div>
</main>


<?php
require_once '../templates/footer.php';
?>
