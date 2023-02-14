<?php
require_once '../includes/autoload.php';
onAllowedPage();
$page = 'Stroom';

require_once '../templates/header.php';


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
    $error = '<span class="error">Er zijn geen gegevens gevonden voor deze maand</span>';
}

// Here we are going to get the data from the database and convert the data to a chart
// We do this because we have data in a database and we want to display this data in a chart.
// We also look at the date, so that you can filter per month.



?>

<main>
    <div class="container">
        <?php require_once '../templates/sidebar.php'; ?>
        <div class="row">
            <div class="col">
                <p>Hier kun je filteren op maand</p>
            </div>
        </div>


        <div class="row filter">
            <?php for ($i = -1; $i <= 1; $i++) : ?>
                <?php $this_date = getTheDate($date + $i); ?>
                <?php if ($this_date && getTheDateNumber($this_date) != '00' && getTheDateNumber($this_date) != '13') : ?>
                    <div class="col text-center<?= $i == 0 ? ' active' : '' ?>">
                        <a href="?date=<?= $this_date ?>">
                            <?= ucfirst($this_date); ?>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endfor;  ?>
        </div>
        <?php
        // Here we are selecting the months, so that we can filter the data per month.
        ?>

        <div class="row">
            <?php
            if (!isset($error)) {
                echo $chart->draw();
            } else {
                echo $error;
            }
            ?>
        </div>
    </div>
</main>


<?php
require_once '../templates/footer.php';
?>
