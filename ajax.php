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
