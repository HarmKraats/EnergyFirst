<?php

class chartNew
{
    public string $chart_type;
    public array $data;
    public array $labels;
    public array $values;
    public string $title;

    public function set_type($type)
    {
        $this->chart_type = $type;
    }

    public function set_data($data)
    {
        $this->data = $data;
    }

    public function set_labels($labels)
    {
        $this->labels = $labels;
    }

    public function set_values($values)
    {
        $this->values = $values;
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
        <script>
            chart = new Chart(ctx, {
                type: '<?= $this->chart_type ?>',
                data: {
                    labels: [
                        <?php
                        // Label
                        foreach ($this->data as $index => $dataset) {
                            echo '"' . implode('","', $dataset[$this->labels]) . '",';
                        }
                        ?>
                    ],
                    datasets: [
                        <?php
                        // Datasets
                        foreach ($this->data as $index => $dataset) {
                            echo "{ label: '{$dataset['title']}', data: [" . implode(',', $dataset[$this->values]) . "], },";
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

    public function update_chart()
    {
        ob_start();
    ?>
        <script>
            chart.data.labels = [
                <?php
                // Label
                foreach ($this->data as $index => $dataset) {
                    echo '"' . implode('","', $dataset[$this->labels]) . '",';
                }
                ?>
            ];
            <?php
            // Datasets
            foreach ($this->data as $index => $dataset) {
                echo "chart.data.datasets[{$index}].data = [" . implode(',', $dataset[$this->values]) . "];";
            }
            ?>
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
