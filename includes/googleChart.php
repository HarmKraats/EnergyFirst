<?php
// Google chart class
class googleChart
{
    public $chart_type;
    public $data;
    public $options;
    public $columns;
    public $title;


    public function setType($type)
    {
        $this->chart_type = $type;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setOptions($options)
    {
        $this->options = $options;
    }

    public function setColumns($columns)
    {
        $this->columns = $columns;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function draw()
    {
        echo '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>';
        echo '<script type="text/javascript">';
        echo "google.charts.load('current', {";
        echo "'packages': ['corechart', 'Line']";
        echo "});";
        echo "google.charts.setOnLoadCallback(drawChart);";

        echo "function drawChart() {";
        echo 'var type_amount = google.visualization.arrayToDataTable([';

        // foreach ($this->data as $data) {
        //     echo "['{$data[0]}', {$data[1]}],";
        // }
        

        echo $this->data;
        

        echo "]);";

        echo "var options = {
            title: '$this->title',
            titleTextStyle: {
                color: '#000000',
            },
            legend: {
                textStyle: {
                    color: '#000000',
                }
            },

            backgroundColor: {
                fill: 'transparent'
            },
        };";
        echo "var chart = new google.visualization." . $this->chart_type . "(document.getElementById('" . $this->title . "'));";
        echo 'chart.draw(type_amount, options);';
        echo "}";
        echo "</script>";
    }


    public function drawDiv()
    {
        echo '<div id="' . $this->title . '" class="kaartje" style="width: 100%; height: 500px;"></div>';
    }
}


?>
