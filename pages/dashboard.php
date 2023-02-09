<?php
$page = 'Dashboard';
require_once '../templates/header.php';
if(!is_logged_in()){
    header('Location: home');
}

?>

<h1>Dashboard</h1>
