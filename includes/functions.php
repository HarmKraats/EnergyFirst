<?php
session_start();

if (isset($_GET['logout'])) {
    // flash('logout', 'Je bent uitgelogd.', 'success');
    header("location: home");
    unset($_SESSION['user']);
    session_destroy();
}

function isLoggedIn()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}

function getUser(){
    if(isLoggedIn()){
        return $_SESSION['user'];
    } else {
        return false;
    }
}

function currentPage(){
    $current_page = basename($_SERVER['PHP_SELF']);
    $current_page = str_replace('.php', '', $current_page);
    return $current_page;
}


function isActive($page){
    if(currentPage() == strtolower($page)){
        return 'active';
    }
}
