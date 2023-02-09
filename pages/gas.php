<?php
$page = 'Gas';
require_once '../templates/header.php';
if(!isLoggedIn()){
    header('Location: home');
}



?>

<main>
    <div class="container">
        <?php require_once '../templates/sidebar.php'; ?>
        
    </div>
</main>
