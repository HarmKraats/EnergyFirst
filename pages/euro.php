<?php
require_once '../includes/autoload.php';
onAllowedPage();
$page = 'Euro';

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

?>

<main>
    <div class="container">
        <?php require_once '../templates/sidebar.php'; ?>
        <div class="row">
            <div class="col">
                <p>Hello World!</p>
            </div>
        </div>
    </div>
</main>


<?php
require_once '../templates/footer.php';
?>
