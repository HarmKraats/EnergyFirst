<?php
session_start();

if (isset($_GET['logout'])) {
    // flash('logout', 'Je bent uitgelogd.', 'success');
    header("location: home");
    unset($_SESSION['user']);
    session_destroy();
}
/* The code above does the following:
1. If the logout variable is set in the URL, it will destroy the session (removing the user from the session) and redirect to the home page.
2. If the logout variable is not set, it will do nothing. */

function isLoggedIn()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
        exit;
    }
}
/* The code above does the following:
1. Checks if the session variable 'user' is set
2. If it is, return true
3. If not, return false and exit */

function getUser()
{
    if (isLoggedIn()) {
        return $_SESSION['user'];
    } else {
        return false;
    }
}
/* The code above does the following:
1. Checks to see if the user is logged in
2. If the user is logged in, it returns the user object
3. If the user is not logged in, it returns false */

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
/* The code above does the following:
1. If the user is not logged in and $must_be_logged_in is false, the user is sent to $page_to_send
2. If the user is logged in and $must_be_logged_in is false, nothing happens
3. If the user is not logged in and $must_be_logged_in is true, nothing happens
4. If the user is logged in and $must_be_logged_in is true, the user is sent to $page_to_send */

function currentPage()
{
    $current_page = basename($_SERVER['PHP_SELF']);
    $current_page = str_replace('.php', '', $current_page);
    return $current_page;
}
/* The code above does the following:
1. basename() gets the current file name
2. str_replace() removes the .php extension
3. return the current page name */


function isActive($page)
{
    if (currentPage() == strtolower($page)) {
        return 'active';
    }
}
/* The code above does the following:
1. Gets the current page from the URL
2. Compares the current page to the current page
3. Returns the word 'active' if the current page matches the page
   passed to the function */

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
/* The code above does the following:
1. It creates a new chart object with the chart type, data, title, value and label.
2. It returns the chart object. */

function calculateGas($data, $type) {
    $gasUsage = array();
    for ($i = 0; $i < count($data) - 1; $i++) {
        $day1 = $data[$i];
        $day2 = $data[$i + 1];
        $var = $day1[$type] - $day2[$type];
        $opname_datum = date('d-m-Y', strtotime($day1['opname_datum']));

        $gasUsage[$i] = array(
            'opname_datum' => $opname_datum,
            $type => abs($var)
        );
    }

    return $gasUsage;
}
/* The code above does the following:
1. Loops through the $data array and for each item in the array it will subtract the next item in the array.
2. The result is added to the $gasUsage array.
3. Returns the $gasUsage array. */

function calculateStroom(array $data): array
{
    // Loop through the array
    for ($i = 1; $i < count($data); $i++) {
        // Get the date
        $opname_datum = $data[$i]['opname_datum'];
        // format new data
        $opname_datum = date('d-m-Y', strtotime($opname_datum));

        // Calculate the usage
        $usage = abs($data[$i]['stand_normaal'] + $data[$i]['stand_dal'] - ($data[$i - 1]['stand_normaal'] + $data[$i - 1]['stand_dal']));

        // Add the data to the new array
        $stroomUsage[$i] = array(
            'opname_datum' => $opname_datum,
            'stroom_normaal' => $usage,
        );
    }
    return $stroomUsage;
}
/* The code above does the following:
1. Makes a new array
2. Loops through the original array
3. Gets the date
4. Calculates the usage
5. Adds the date and usage to the new array */



function calculateEuro(array $stroomData): array
{
    // Loop through the array
    for ($i = 1; $i < count($stroomData); $i++) {
        // Get the date
        $opname_datum = $stroomData[$i]['opname_datum'];
        $opname_datum = date('d-m-Y', strtotime($opname_datum));


        $day1stand = $stroomData[$i]['stand_normaal'] - $stroomData[$i]['teruglevering_normaal'];

        $day2stand = $stroomData[$i - 1]['stand_normaal'] - $stroomData[$i - 1]['teruglevering_normaal'];

        $day1dal = $stroomData[$i]['stand_dal'] - $stroomData[$i]['teruglevering_dal'];

        $day2dal = $stroomData[$i - 1]['stand_dal'] - $stroomData[$i - 1]['teruglevering_dal'];



        $usage = (($day1stand + $day1dal) - ($day2stand + $day2dal)) * 0.59;

        // Add the data to the new array
        $Usage[$i] = array(
            'opname_datum' => $opname_datum,
            'stroom_normaal' => $usage,
        );
    }

    // // Loop through the array
    // for ($i = 1; $i < count($gasData); $i++) {
    //     // Get the date
    //     $opname_datum = $gasData[$i]['opname_datum'];
    //     $day1 = $gasData[$i];
    //     $day2 = $gasData[$i + 1];
    //     $var = $day1['gas'] - $day2['gas'];

    //     $usage = abs($var) * 0.59;

    //     // if date in array already exists in the array like so: $Usage[$i]['opname_datum'] == $opname_datum

    //     if(in_array($opname_datum, array_column($Usage, 'opname_datum'))) {
    //         $key = array_search($opname_datum, array_column($Usage, 'opname_datum'));
    //         $Usage[$key]['gas'] = $usage;
    //     } else {
    //         // Add the data to the new array
    //         $Usage[$i] = array(
    //             'opname_datum' => $opname_datum,
    //             'gas' => $usage,
    //         );
    //     }
    // }

    return $Usage;
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
