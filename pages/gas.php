<?php
require_once '../includes/autoload.php';
onAllowedPage();
$page = 'Gas';

require_once '../templates/header.php';


$what = array('opname_datum', 'gas');
$data = calculateGas(getFromDB($what, 'meterstand_gas'), 'gas');

?>
<?php
$chart = createChart('bar', $data, 'Gasverbruik', 'opname_datum', 'gas');
// make the above variable a global variable

?>

<main>
    <div class="container">
        <?php require_once '../templates/sidebar.php'; ?>

        <div class="row">

        <div class="btn" id="ajaxButton">click me! to make ajax request</div>

        </div>

        <div class="row">

                <?= $chart->draw_wrapper(); ?>
                <div id="chart_script">
                <?= $chart->draw_chart(); ?>
            </div>

        </div>
    </div>
</main>


<?php
require_once '../templates/footer.php';
?>
