<?php
require_once '../includes/autoload.php';
onAllowedPage();
$page = 'Stroom';

require_once '../templates/header.php';

$what = array('opname_datum', 'stand_normaal', 'stand_dal');
$database_data = getFromDB($what, 'meterstand_stroom');
$data = calculateStroom($database_data);



$chart = createChart(
    'bar',
    $data,
    'Stroom verbruik',
    'opname_datum',
    'stroom_normaal'
);


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

            <?= $chart->draw(); ?>


            <?php
            echo '<pre>';
            print_r($data);
            echo '</pre>';
            ?>
            
        </div>
    </div>
</main>



<?php
require_once '../templates/footer.php';
?>
