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

function onAllowedPage($page_to_send = 'home', $must_be_logged_in = false)
{
    if (!isLoggedIn() && $must_be_logged_in == false) {
        header("Location: $page_to_send");
        exit;
    } elseif (isLoggedIn() && $must_be_logged_in == true) {
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
function createChart($chart_type, $data, $title, $value, $label, $options = array())
{
    $chart = new chart();
    $chart->set_type($chart_type);
    $chart->set_data($data);

    $chart->set_labels($value);
    $chart->set_values($label);

    $chart->set_title($title);

    return $chart;
}

function calculateGas($data, $type)
{
    $gasUsage = array();
    for ($i = 0; $i < count($data) - 1; $i++) {
        $day1 = $data[$i];
        $day2 = $data[$i + 1];
        $var = $day1[$type] - $day2[$type];
        $gasUsage[$i] = array(
            'opname_datum' => $day1['opname_datum'],
            $type => $var
        );
    }

    return $gasUsage;
}

function calculateStroom(array $data): array {
    for ($i = 1; $i < count($data); $i++) {
        $opname_datum = $data[$i]['opname_datum'];
        $usage = abs($data[$i]['stand_normaal'] + $data[$i]['stand_dal'] - $data[$i - 1]['stand_normaal'] - $data[$i - 1]['stand_dal']);

        $stroomUsage[$i] = array(
            'opname_datum' => $opname_datum,
            'stroom_normaal' => $usage,
        );

    }
    return $stroomUsage;
}
