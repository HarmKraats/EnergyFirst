<?php
require_once 'includes/autoload.php';


$date = getTheDateNumber($_GET['date'] ?? date('m'));
$filter = 'opname_datum LIKE "%-' . $date . '-%"';
$what = array('opname_datum', 'stand_normaal', 'stand_dal');
$database_data = getFromDB($what, 'meterstand_stroom', $filter . ' ORDER BY opname_datum');



if (count($database_data) > 0) {
    $data = calculateStroom($database_data);
    $chart = createChart(
        'bar',
        $data,
        'Stroom verbruik in kWh',
        'opname_datum',
        'stroom_normaal'
    );
} else {
    $error = 'Er zijn geen gegevens gevonden voor deze maand';
}

?>


<div class="row filter">
    <?php for ($i = -1; $i <= 1; $i++) : ?>
        <?php $this_date = getTheDate($date + $i); ?>
        <?php if ($this_date && getTheDateNumber($this_date) != '00' && getTheDateNumber($this_date) != '13') : ?>
            <div class="col text-center<?= $i == 0 ? ' active' : '' ?>">
                <a data-maand=<?= $this_date ?> class="ajaxCall" href="?date=<?= $this_date ?>">
                    <?= ucfirst($this_date); ?>
                </a>
            </div>
        <?php endif; ?>
    <?php endfor;  ?>
</div>



<div id="ajaxOutput" class="row">
    <?php
    if (!isset($error)) {
    ?>
        <div id="chart">
            <?= $chart->draw(); ?>
        </div>
    <?php
    } else {
        echo $error;
    }
    ?>
</div>
