<?php


class chartV2
{
    public string $chart_type;
    public string $seccond_chart_type;

    public array $data;
    public array $seccond_data;

    public string $label;
    public string $value;
    public string $title;

    public function set_type($type)
    {
        $this->chart_type = $type;
    }
    public function seccond_set_type($type)
    {
        $this->seccond_chart_type = $type;
    }



    public function set_data($data)
    {
        $this->data = $data;
    }
    public function seccond_set_data($data)
    {
        $this->seccond_data = $data;
    }



    
    public function set_values($value)
    {
        $this->value = $value;
    }
    public function set_title($title)
    {
        $this->title = $title;
    }
    public function set_labels($label)
    {
        $this->label = $label;
    }
    
    function draw(){
        return $this->draw_wrapper() . $this->draw_chart();
    }

    public function draw_chart()
    {
        ob_start();
?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctx = document.getElementById('<?= $this->title ?>');

            new Chart(ctx, {
                type: '<?= $this->chart_type ?>',
                data: {
                    datasets: [{
                        type: '<?= $this->chart_type ?>',
                        label: '<?= $this->title ?>',
                        data: [
                            <?php
                            foreach ($this->data as $index => $value) {
                                echo '"' . $value[$this->value] . '",';
                            }
                            ?>
                        ],
                    },
                {
                    type: '<?= $this->seccond_chart_type ?>',
                    label: '<?= $this->title ?>',
                    data: [
                        <?php
                        foreach ($this->seccond_data as $index => $value) {
                            echo '"' . $value[$this->value] . '",';
                        }
                        ?>
                    ],
                }],
                    labels: [
                        <?php
                        foreach ($this->seccond_data as $index => $value) {
                            echo '"' . $value[$this->label] . '",';
                        }
                        ?>
                    ],
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
