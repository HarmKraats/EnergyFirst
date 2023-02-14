<?php


class chart
{
    public string $chart_type;
    public array $data;
    public string $label;
    public string $value;
    public string $title;

    public function set_type($type)
    {
        $this->chart_type = $type;
    }

    public function set_data($data)
    {
        $this->data = $data;
    }

    public function set_labels($label)
    {
        $this->label = $label;
    }

    public function set_values($value)
    {
        $this->value = $value;
    }
    public function set_title($title)
    {
        $this->title = $title;
    }

    function draw()
    {
        return $this->draw_wrapper() . $this->draw_chart();
    }

    public function draw_chart()
    {
        ob_start();
?>
        <!-- <script src="dist/main.js"></script> -->
        <script>
            chart = new Chart(ctx, {
                type: '<?= $this->chart_type ?>',
                data: {
                    labels: [
                        <?php
                        // Label
                        foreach ($this->data as $index => $value) {
                            echo '"' . $value[$this->label] . '",';
                        }
                        ?>
                    ],
                    datasets: [{
                        label: '<?= $this->title ?>',
                        data: [
                            <?php
                            // Value
                            foreach ($this->data as $index => $value) {
                                echo $value[$this->value] . ',';
                            }
                            ?>
                        ],
                    }]
                },
                options: {

                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

    <?php
        $javascript = ob_get_clean();
        return $javascript;
    }



    public function update_chart()
    {
        ob_start();
    ?>
        <script>
            chart.data.labels = [
                <?php
                // Label
                foreach ($this->data as $index => $value) {
                    echo '"' . $value[$this->label] . '",';
                }
                ?>
            ];
            chart.data.datasets[0].data = [
                <?php
                // Value
                foreach ($this->data as $index => $value) {
                    echo $value[$this->value] . ',';
                }
                ?>
            ];
            chart.update();
        </script>

    <?php
        $javascript = ob_get_clean();
        return $javascript;
    }
    



    function draw_wrapper()
    {
        ob_start();
    ?>
        

        <div id="chart">
            <canvas id="<?= $this->title ?>"></canvas>
        </div>

        <script>
            const ctx = document.getElementById('<?= $this->title ?>');
        </script>

<?php
        $wrapper = ob_get_clean();
        return $wrapper;
    }
}
