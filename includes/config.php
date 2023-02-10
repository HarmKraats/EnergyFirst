<?php

// Config array
$config = array(
    'site_name' => 'EnergyFirst',
    'site_email' => 'info@harmvandekraats.nl',
    'site_description' => 'Bij deze webapplicatie kun je inzicht krijgen in je energieverbruik.',
    'site_keywords' => 'EneryFirst, energie, verbruik, inzicht, webapplicatie, webapp, webappl',
    'site_author' => 'Harm van de Kraats',
    'author_site' => 'https://harmvandekraats.nl',
    'site_copyright' => "Copyright &copy;".date('Y')." Harm van de Kraats",

    'database_host' => 'localhost',
    'database_name' => 'eneryfirst',
    'database_user' => 'root',
    'database_password' => '',
    // 'database_host' => 'friedmonkey.nl',
    // 'database_name' => 'eneryfirst',
    // 'database_user' => 'harm',
    // 'database_password' => 'Harm2004!',
);


define('DB_HOST', $config['database_host']);
define('DB_NAME', $config['database_name']);
define('DB_USER', $config['database_user']);
define('DB_PASS', $config['database_password']);
