<?php
require_once '../includes/autoload.php';
onAllowedPage();
$page = 'Euro';

require_once '../templates/header.php';



$date = getTheDateNumber($_GET['date'] ?? date('m'));
$filter = 'opname_datum LIKE "%-' . $date . '-%"';
$what = array('opname_datum', 'stand_normaal', 'stand_dal', 'teruglevering_normaal', 'teruglevering_dal');
$database_data = getFromDB($what, 'meterstand_stroom', $filter . ' ORDER BY opname_datum');

$what = array('opname_datum', 'gas');
$gasData = getFromDB($what, 'meterstand_gas', $filter . ' ORDER BY opname_datum');


if (count($database_data) > 0) {
    $data = calculateEuro($database_data);

    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";

    $totaleKosten = 0;
    foreach ($data as $value) {
        $totaleKosten += $value['stroom_normaal'];
    }



    $chart = createChart(
        'bar',
        $data,
        'Stroom kosten in euro',
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



        <div class="row filter">
            <?php for ($i = -1; $i <= 1; $i++) : ?>
                <?php $this_date = getTheDate($date + $i); ?>
                <?php if ($this_date && getTheDateNumber($this_date) != '00' && getTheDateNumber($this_date) != '13') : ?>
                    <div class="col text-center<?= $i == 0 ? ' active' : '' ?>">
                        <a href="?date=<?= $this_date ?>#scroll">
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
            <div class="col">
                <p>
                    <?php
                    if (isset($totaleKosten)) {
                        if ($totaleKosten > 0) {
                            echo "De totale kosten voor deze maand zijn: <b>€ $totaleKosten </b>";
                        } else {
                            echo "Je krijgt deze maand <b>€ " . abs($totaleKosten) . "</b> terug";
                        }
                    }
                    ?>
                </p>
            </div>
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
