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
            $type => abs($var)
        );
    }

    return $gasUsage;
}

function calculateStroom(array $data): array
{
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

function getTheDate($date)
{

    switch ($date) {
        case '01':
            $month = 'januari';
            break;
        case '02':
            $month = 'februari';
            break;
        case '03':
            $month = 'maart';
            break;
        case '04':
            $month = 'april';
            break;
        case '05':
            $month = 'mei';
            break;
        case '06':
            $month = 'juni';
            break;
        case '07':
            $month = 'juli';
            break;
        case '08':
            $month = 'augustus';
            break;
        case '09':
            $month = 'september';
            break;
        case '10':
            $month = 'oktober';
            break;
        case '11':
            $month = 'november';
            break;
        case '12':
            $month = 'december';
            break;
    }

    // if no month is found check if to show januari or december
    if (!isset($month)) {
        if ($date == '00') {
            $month = 'december';
        } else {
            $month = 'januari';
        }
    }

    return $month;
}

function getTheDateNumber($date)
{

    switch ($date) {
        case 'januari':
            $month = '01';
            break;
        case 'februari':
            $month = '02';
            break;
        case 'maart':
            $month = '03';
            break;
        case 'april':
            $month = '04';
            break;
        case 'mei':
            $month = '05';
            break;
        case 'juni':
            $month = '06';
            break;
        case 'juli':
            $month = '07';
            break;
        case 'augustus':
            $month = '08';
            break;
        case 'september':
            $month = '09';
            break;
        case 'oktober':
            $month = '10';
            break;
        case 'november':
            $month = '11';
            break;
        case 'december':
            $month = '12';
            break;
    }
    // if no month is found check if to show januari or december
    if (!isset($month)) {
        if ($date == 'december') {
            $month = '12';
        } else {
            $month = date('m');
        }
    }

    return $month;
}
