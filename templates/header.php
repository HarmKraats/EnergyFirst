<?php


$page = isset($page) ? ucfirst($page) : ($_GET['page'] ?? 'Home');


if($page == "Dashboard" || $page == "Gas" || $page == "Euro" || $page == "Stroom"){
    $current_page = 'active';
}	else{
    $current_page = '';
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- <link rel="stylesheet" href="https://jeltecost.nl/assets/css/default.css"> -->
    <link rel="stylesheet" href="dist/css/index.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Title -->
    <title><?= $page ?> | <?= $config['site_name'] ?></title>
</head>

<body>
    <nav>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="logo">
                        <a href="home">
                            <svg xmlns="http://www.w3.org/2000/svg" width="153" height="59" viewBox="0 0 153 59">
                                <g id="Group_16" data-name="Group 16" transform="translate(-101 -148)">
                                    <g id="Energy" transform="translate(-119.789 -215.207)" style="isolation: isolate">
                                        <g id="Group_9" data-name="Group 9" transform="translate(259.789 363.207)" style="isolation: isolate">
                                            <path id="Path_4" data-name="Path 4" d="M259.789,385.784V363.207h17.352v4.063H264.465v5.162h8.354v3.935h-8.354v5.353h12.8v4.064Z" transform="translate(-259.789 -363.207)" fill="#030504" />
                                            <path id="Path_5" data-name="Path 5" d="M281.591,385.784v-16.8h4.419v1.387a6.791,6.791,0,0,1,4.709-1.71,6.887,6.887,0,0,1,3.467.855,6.091,6.091,0,0,1,2.339,2.355,7.054,7.054,0,0,1,.838,3.5v10.418h-4.419v-9.773a3.538,3.538,0,0,0-.935-2.6,3.409,3.409,0,0,0-2.548-.952,4.411,4.411,0,0,0-2,.435,3.946,3.946,0,0,0-1.452,1.242v11.643Z" transform="translate(-259.906 -363.432)" fill="#030504" />
                                            <path id="Path_6" data-name="Path 6" d="M310.231,386.107a9.087,9.087,0,0,1-4.563-1.161,8.8,8.8,0,0,1-3.242-3.129,8.354,8.354,0,0,1-1.193-4.419,8.581,8.581,0,0,1,4.258-7.547,8.465,8.465,0,0,1,4.386-1.161,7.807,7.807,0,0,1,4.289,1.194,8.471,8.471,0,0,1,2.952,3.224,9.694,9.694,0,0,1,1.08,4.613v1.161H305.749a5.011,5.011,0,0,0,.951,1.806,4.526,4.526,0,0,0,1.645,1.258,4.983,4.983,0,0,0,2.112.452,5.935,5.935,0,0,0,2.081-.355,4.711,4.711,0,0,0,1.628-1l2.9,2.645a10.1,10.1,0,0,1-6.838,2.419Zm-4.547-10.386h8.16a4.361,4.361,0,0,0-.823-1.758,4.43,4.43,0,0,0-1.418-1.192,3.82,3.82,0,0,0-1.823-.436,4.132,4.132,0,0,0-1.871.419,3.9,3.9,0,0,0-1.4,1.178A4.964,4.964,0,0,0,305.684,375.721Z" transform="translate(-260.014 -363.439)" fill="#030504" />
                                            <path id="Path_7" data-name="Path 7" d="M322.2,385.784v-16.8h4.419v1.871a5.33,5.33,0,0,1,4.482-2.258,3.982,3.982,0,0,1,1.839.387v3.871a4.62,4.62,0,0,0-1.064-.339,6.263,6.263,0,0,0-1.194-.113,4.447,4.447,0,0,0-2.353.645,4.7,4.7,0,0,0-1.71,1.839v10.9Z" transform="translate(-260.108 -363.431)" fill="#030504" />
                                            <path id="Path_8" data-name="Path 8" d="M344.421,392.687a17.179,17.179,0,0,1-3.743-.4,13.72,13.72,0,0,1-3.256-1.145l1.547-3.419a13.427,13.427,0,0,0,2.71,1,11.116,11.116,0,0,0,2.644.323,4.586,4.586,0,0,0,2.983-.839,3.071,3.071,0,0,0,1.016-2.515v-1.323a7.6,7.6,0,0,1-4.612,1.516,8.232,8.232,0,0,1-4.3-1.145,8.6,8.6,0,0,1-3.065-3.113,8.507,8.507,0,0,1-1.145-4.354,8.337,8.337,0,0,1,1.145-4.321,8.585,8.585,0,0,1,7.5-4.225,8.139,8.139,0,0,1,2.386.354,8.664,8.664,0,0,1,2.161,1v-1.1h4.354v16.772a6.333,6.333,0,0,1-2.145,5.128A9.34,9.34,0,0,1,344.421,392.687Zm-.033-10.548a5.882,5.882,0,0,0,2.226-.4,4.823,4.823,0,0,0,1.708-1.144v-6.58A5.022,5.022,0,0,0,346.6,372.9a5.845,5.845,0,0,0-2.176-.4,4.892,4.892,0,0,0-2.484.629,4.733,4.733,0,0,0-1.741,1.709,4.644,4.644,0,0,0-.645,2.435,4.9,4.9,0,0,0,.627,2.484,4.672,4.672,0,0,0,1.742,1.741A4.821,4.821,0,0,0,344.388,382.139Z" transform="translate(-260.201 -363.719)" fill="#030504" />
                                            <path id="Path_9" data-name="Path 9" d="M359.127,392.719c-.387,0-.759-.016-1.113-.049s-.65-.069-.886-.113v-3.8a8.079,8.079,0,0,0,1.548.129,3.365,3.365,0,0,0,3.354-2.291l.258-.645L355.74,368.98h4.87l4.194,11.45,4.741-11.45h4.774l-7.742,18.159a13,13,0,0,1-1.9,3.258,6.135,6.135,0,0,1-2.369,1.774A8.374,8.374,0,0,1,359.127,392.719Z" transform="translate(-260.319 -363.719)" fill="#030504" />
                                        </g>
                                    </g>
                                    <g id="FIRST" transform="translate(-119.789 -218.094)" style="isolation: isolate">
                                        <g id="Group_10" data-name="Group 10" transform="translate(259.789 397.094)" style="isolation: isolate">
                                            <path id="Path_10" data-name="Path 10" d="M259.789,424.7V397.483h21.047v4.9H265.429V408.8h10.232v4.745H265.429V424.7Z" transform="translate(-259.789 -397.094)" fill="#030504" />
                                            <path id="Path_11" data-name="Path 11" d="M286.2,424.7V397.483h5.641V424.7Z" transform="translate(-259.918 -397.094)" fill="#030504" />
                                            <path id="Path_12" data-name="Path 12" d="M298.341,424.7V397.483h13.3a10.707,10.707,0,0,1,4.883,1.069,7.947,7.947,0,0,1,4.493,7.37,7.606,7.606,0,0,1-1.439,4.588,8.624,8.624,0,0,1-3.852,2.956l6.03,11.239h-6.3l-5.329-10.423h-6.147V424.7Zm5.641-15.05h7.159a4.452,4.452,0,0,0,3.054-1.011,3.622,3.622,0,0,0,0-5.289,4.457,4.457,0,0,0-3.054-1.011h-7.159Z" transform="translate(-260.013 -397.094)" fill="#030504" />
                                            <path id="Path_13" data-name="Path 13" d="M336.31,425.094a17.978,17.978,0,0,1-12.06-4.706l3.23-4.044a17.2,17.2,0,0,0,4.57,3.033,11.786,11.786,0,0,0,4.649.934,9.507,9.507,0,0,0,2.957-.409,4.221,4.221,0,0,0,1.925-1.187,2.683,2.683,0,0,0,.682-1.827,2.535,2.535,0,0,0-1.012-2.157,8.43,8.43,0,0,0-3.462-1.187l-5.408-.934a9.247,9.247,0,0,1-5.271-2.45,6.64,6.64,0,0,1-1.809-4.822,7.479,7.479,0,0,1,1.3-4.4,8.194,8.194,0,0,1,3.7-2.858,14.873,14.873,0,0,1,5.7-.991,18.455,18.455,0,0,1,5.971,1.011,17.84,17.84,0,0,1,5.272,2.8l-3.035,4.2a14.122,14.122,0,0,0-8.6-3.268,8.171,8.171,0,0,0-2.646.389,4.007,4.007,0,0,0-1.73,1.071,2.351,2.351,0,0,0-.6,1.613,2.275,2.275,0,0,0,.894,1.925,7.025,7.025,0,0,0,3,1.031l5.135.856a11.306,11.306,0,0,1,6.108,2.586,6.682,6.682,0,0,1,2.023,5.074,7.729,7.729,0,0,1-1.4,4.609,8.94,8.94,0,0,1-3.987,3.033A15.875,15.875,0,0,1,336.31,425.094Z" transform="translate(-260.164 -397.094)" fill="#030504" />
                                            <path id="Path_14" data-name="Path 14" d="M359.536,424.7V402.46h-9.182v-4.977h23.965v4.977h-9.142V424.7Z" transform="translate(-260.319 -397.094)" fill="#030504" />
                                        </g>
                                    </g>
                                    <g id="Group_15" data-name="Group 15" transform="translate(27 -3)">
                                        <g id="Group_13" data-name="Group 13" transform="translate(74 151)" style="isolation: isolate">
                                            <path id="Path_18" data-name="Path 18" d="M200.046,420.8V373.513l-11.547,4.8V368.2l15.762-6.405h3.1l4.23,59Z" transform="translate(-188.499 -361.798)" fill="#87b52d" />
                                        </g>
                                        <g id="_1" data-name=" 1" transform="translate(85.547 151)" style="isolation: isolate">
                                            <g id="Group_13-2" data-name="Group 13" transform="translate(0)" style="isolation: isolate">
                                                <path id="Path_18-2" data-name="Path 18" d="M200.047,420.8V373.513l11.547,4.8V368.2L195.832,361.8h-3.112l-4.22,59Z" transform="translate(-188.499 -361.798)" fill="#87b52d" />
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="menu">
                        <ul>
                            <li><a href="euro" class="<?= $current_page ?>">Verbruik</a></li>
                            <!-- dropdown with loggedin user -->
                            <?php
                            if (isLoggedIn()) {
                                $user_id = getUser()['id']; ?>
                                <li>
                                    <a class="d-flex align-items-center" href="?logout">
                                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="22.755" height="26.006" viewBox="0 0 22.755 26.006">
                                            <path id="Icon_awesome-user" data-name="Icon awesome-user" d="M11.377,13a6.5,6.5,0,1,0-6.5-6.5A6.5,6.5,0,0,0,11.377,13Zm4.551,1.625H15.08a8.842,8.842,0,0,1-7.405,0H6.826A6.828,6.828,0,0,0,0,21.455v2.113a2.439,2.439,0,0,0,2.438,2.438H20.317a2.439,2.439,0,0,0,2.438-2.438V21.455A6.828,6.828,0,0,0,15.928,14.628Z" />
                                        </svg>

                                        <?= getFromDB('username', 'users', "id = $user_id")[0]['username'] ?>
                                    </a>

                                </li>
                                <!-- <li class="submenu">
                                    <ul>
                                        <li><a href="home">Dark mode</a></li>
                                        <li><a href="?logout">Uitloggen</a></li>
                                    </ul>
                                </li> -->

                            <?php
                            } else {
                                echo '<li><a href="login">Inloggen</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <header class="bg--dark">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col">
                    <h1><?= $page ?></h1>
                </div>
            </div>
        </div>
    </header>
