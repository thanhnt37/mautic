<?php
    $normalColor = "#47535f";
    $successColor = "#22bb33";
    $warningColor = "#f0ad4e";
    $dangerColor = "#bb2124";
    $bounceRate = $data['MetricDataResults'][0]['Values'][0] * 100;
    $color = ($bounceRate < 3) ? $successColor : (($bounceRate < 5) ? $warningColor : $dangerColor);
?>

<div class="card" style="height: 320px">
    <div class="card-header">
        <h4>AWS Statistics hihi</h4>
    </div>
    <div class="card-body">
        <div class="chart-wrapper">
            <div class="chart-content" style="display: flex; justify-content: space-around;">
                <div class="item" style="display: flex; flex-direction: column; align-items: center;">
                    <p style="font-size: 64px; border: 1px solid; display: flex; width: 235px; height: 235px; justify-content: center; align-items: center; border-radius: 100%; color: <?php echo $normalColor?>; margin-bottom: 15px;">
                        <?php echo $data['MetricDataResults'][2]['Values'][0] ?>
                    </p>
                    <p>Delivery in the recent 2 weeks</p>
                </div>
                <div class="item" style="display: flex; flex-direction: column; align-items: center;">
                    <p style="font-size: 64px; border: 1px solid; display: flex; width: 235px; height: 235px; justify-content: center; align-items: center; border-radius: 100%; color: <?php echo $normalColor?>; margin-bottom: 15px;">
                        <?php echo $data['MetricDataResults'][1]['Values'][0] ?>
                    </p>
                    <p>Bounce in the recent 2 weeks</p>
                </div>
                <div class="item" style="display: flex; flex-direction: column; align-items: center;">
                    <p style="font-size: 64px; border: 1px solid; display: flex; width: 235px; height: 235px; justify-content: center; align-items: center; border-radius: 100%; color: <?php echo $color?>; margin-bottom: 15px;">
                        <?php echo $data['MetricDataResults'][0]['Values'][0] * 100 ?> &percnt;
                    </p>
                    <p>Bounce Rate</p>
                </div>
            </div>
        </div>
    </div>
</div>