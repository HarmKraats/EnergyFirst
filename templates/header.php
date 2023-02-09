<?php
require_once '../includes/autoload.php';


$page = isset($page) ? ucfirst($page) : ($_GET['page'] ?? 'Home');

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="dist/css/index.min.css">

    <!-- Title -->
    <title><?= $page ?> | <?= $config['site_name'] ?></title>
</head>
    <body>
