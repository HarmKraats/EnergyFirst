<?php
require_once '../includes/autoload.php';
onAllowedPage();
$page = 'Dashboard';

require_once '../templates/header.php';
?>

<main>
    <div class="container">
        <?php require_once '../templates/sidebar.php'; ?>
    </div>
</main>

<?php
require_once '../templates/footer.php';
?>
