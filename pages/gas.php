<?php
require_once '../includes/autoload.php';
onAllowedPage();
$page = 'Gas';

require_once '../templates/header.php';
?>

<main>
    <div class="container">
        <?php require_once '../templates/sidebar.php'; ?>

        <div class="row">
            <div class="col">
                <p>Hier kun je filteren op jaar, maand en dag </p>
            </div>
        </div>

        <div class="row">



            <?php
            $what = array('opname_datum', 'gas');
            $real_data = getFromDB($what, 'meterstand_gas');

            $chart = new chart();
            $chart->set_type('bar');
            $chart->set_data($real_data);
            $chart->set_labels('opname_datum');
            $chart->set_values('gas');
            $chart->set_title('Gasverbruik');

            echo $chart->draw();


            ?>




    




















































        </div>
    </div>
</main>
