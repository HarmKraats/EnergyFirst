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
        exit;
    }
}

function getUser()
{
    if (isLoggedIn()) {
        return $_SESSION['user'];
    } else {
        return false;
    }
}

function onAllowedPage($page_to_send = 'home', $must_be_logged_in = false){
    if(!isLoggedIn() && $must_be_logged_in == false){
        header("Location: $page_to_send");
        exit;
    } elseif(isLoggedIn() && $must_be_logged_in == true){
        header("Location: $page_to_send");
        exit;
    }
}

function currentPage()
{
    $current_page = basename($_SERVER['PHP_SELF']);
    $current_page = str_replace('.php', '', $current_page);
    return $current_page;
}


function isActive($page)
{
    if (currentPage() == strtolower($page)) {
        return 'active';
    }
}

// Create goole charts
function createChart($chart_type, $data, $title, $options = array())
{

    $chart = new GoogleChart();
    $chart->setType($chart_type);
    $chart->setData($data);
    $chart->setOptions($options);
    $chart->setTitle($title);


    return $chart;
}
