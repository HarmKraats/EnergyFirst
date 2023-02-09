<?php

// Open the file meterstanden_gas_2022.csv from the zinput folder
$csv = array_map('str_getcsv', file('zinput/meterstanden_gas_2022.csv'));


// Database connection function with PDO
require_once 'includes/autoload.php';


$db = getDB();



?>

<table>
    <?php
// Loop through the csv file and insert the data into the database
foreach ($csv as $key => $value) {

    $date = explode(";", $value[0]);

    foreach($value as $item){
        // split item by ; removing the first part
        $item = explode(";", $item);
        echo ' | '.$date[0]. ' - ' . $item[1] ;

        $sql = "INSERT INTO meterstand_gas (opname_datum, gas) VALUES (:date, :gas)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':date', $date[0]);
        $stmt->bindParam(':gas', $item[1]);
        $stmt->execute();
    }
}

echo "<pre>";
print_r($csv );
echo "</pre>";

?>

</table>
