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
            $data = calculateValue(getFromDB($what, 'meterstand_gas'), 'gas');

            $chart = createChart('bar', $data, 'Gasverbruik' ,'opname_datum', 'gas');
            echo $chart->draw();
            ?>

        </div>
    </div>
</main>


<?php
require_once '../templates/footer.php';
?>
