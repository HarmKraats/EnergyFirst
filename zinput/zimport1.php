<?php

// Open the file meterstanden_gas_2022.csv from the zinput folder
$csv = array_map('str_getcsv', file('zinput/meterstanden_stroom_2022.csv'));


// Database connection function with PDO
require_once 'includes/autoload.php';


$db = getDB();


$newArray = array();

// Loop through the csv file and insert the data into the database
foreach ($csv as $key => $value) {

    $newArray[] = explode(";", $value[0]);
}

foreach($newArray as $value){
    $sql = "INSERT INTO meterstand_stroom (opname_datum, stand_normaal, stand_dal, teruglevering_normaal, teruglevering_dal) VALUES (:date, :stand_normaal, :stand_dal, :terug_normaal, :terug_dal)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':date', $value[0]);
    $stmt->bindParam(':stand_normaal', $value[1]);
    $stmt->bindParam(':stand_dal', $value[2]);
    $stmt->bindParam(':terug_normaal', $value[3]);
    $stmt->bindParam(':terug_dal', $value[4]);
    $stmt->execute();
}

echo "<pre>";
print_r($newArray );
echo "</pre>";

?>