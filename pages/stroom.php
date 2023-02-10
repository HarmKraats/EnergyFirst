<?php
require_once '../includes/autoload.php';
onAllowedPage();
$page = 'Stroom';

require_once '../templates/header.php';
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

            
        <?php
            $what = array('opname_datum', 'stand_normaal', 'stand_dal');
            $data = calculateStroom(getFromDB($what, 'meterstand_stroom'), 'stroom_normaal', 'stroom_dal');

            echo '<pre>';
            print_r($data);
            echo '</pre>';

            // $chart = createChart('bar', $data, 'Stroom verbruik', 'opname_datum', 'stroom_normaal');
            // echo $chart->draw();
            ?>
            
        </div>
    </div>
</main>



<?php
require_once '../templates/footer.php';
?>
