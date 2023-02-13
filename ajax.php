<?php
require_once 'includes/autoload.php';
$what = array('opname_datum', 'gas');

$database_data = getFromDB($what, 'meterstand_gas', '1 = 1 ORDER BY opname_datum DESC LIMIT 10');
$data = calculateGas($database_data, 'gas');

$chart = createChart('bar', $data, 'Gasverbruik', 'opname_datum', 'gas');

echo $chart->draw_chart();
