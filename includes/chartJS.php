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

    function draw(){
        return $this->draw_wrapper() . $this->draw_chart();
    }

    public function draw_chart()
    {
        ob_start();
?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- <script src="dist/main.js"></script> -->
        <script>
            
            const ctx = document.getElementById('<?= $this->title ?>');

            new Chart(ctx, {
                type: '<?= $this->chart_type ?>',
                data: {
                    labels: [
                        <?php
                        foreach ($this->data as $index => $value) {
                            echo '"' . $value[$this->label] . '",';
                        }
                        ?>
                    ],
                    datasets: [{
                        label: '<?= $this->title ?>',
                        data: [
                            <?php
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

    function draw_wrapper()
    {
        ob_start();
    ?>
        <div>
            <canvas id="<?= $this->title ?>"></canvas>
        </div>

<?php
        $wrapper = ob_get_clean();
        return $wrapper;
    }


}
