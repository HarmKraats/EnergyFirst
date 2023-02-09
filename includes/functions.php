<?php
session_start();

if (isset($_GET['logout'])) {
    // flash('logout', 'Je bent uitgelogd.', 'success');
    header("location: home");
    unset($_SESSION['user']);
    session_destroy();
}

function is_logged_in()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}
