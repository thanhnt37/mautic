<?php
    $normalColor = "#47535f";
    $successColor = "#22bb33";
    $warningColor = "#f0ad4e";
    $dangerColor = "#bb2124";
    $bounceRate = $data['MetricDataResults'][3]['Values'][0] * 100;
    $bounceRateColor = ($bounceRate < 3) ? $successColor : (($bounceRate < 5) ? $warningColor : $dangerColor);
    $complaintRate = $data['MetricDataResults'][4]['Values'][0] * 100;
    $complaintRateColor = ($complaintRate < 0.05) ? $successColor : (($complaintRate < 0.1) ? $warningColor : $dangerColor);
?>

<div class="card">
    <div class="card-header">
        <h4>AWS SES Statistics</h4>
    </div>
    <div class="card-body">
        <div class="chart-wrapper">
            <div class="chart-content" style="display: flex; justify-content: space-around;">
                <div class="item" style="display: flex; flex-direction: column; align-items: center;">
                    <p style="font-size: 64px; display: flex; width: 235px; height: 150px; justify-content: center; align-items: center; border-radius: 100%; color: <?php echo $normalColor?>; margin-bottom: 15px;">
                        <?php echo $data['MetricDataResults'][0]['Values'][0] ?>
                    </p>
                    <p>Send in the recent 2 weeks</p>
                </div>
                <div class="item" style="display: flex; flex-direction: column; align-items: center;">
                    <p style="font-size: 64px; display: flex; width: 235px; height: 150px; justify-content: center; align-items: center; border-radius: 100%; color: <?php echo $normalColor?>; margin-bottom: 15px;">
                        <?php echo $data['MetricDataResults'][1]['Values'][0] ?>
                    </p>
                    <p>Delivery in the recent 2 weeks</p>
                </div>
                <div class="item" style="display: flex; flex-direction: column; align-items: center;">
                    <p style="font-size: 64px; display: flex; width: 235px; height: 150px; justify-content: center; align-items: center; border-radius: 100%; color: <?php echo $normalColor?>; margin-bottom: 15px;">
                        <?php echo $data['MetricDataResults'][2]['Values'][0] ?>
                    </p>
                    <p>Bounce in the recent 2 weeks</p>
                </div>
                <div class="item" style="display: flex; flex-direction: column; align-items: center;">
                    <p style="font-size: 64px; display: flex; width: 235px; height: 150px; justify-content: center; align-items: center; border-radius: 100%; color: <?php echo $bounceRateColor?>; margin-bottom: 15px;">
                        <?php echo $bounceRate ?> &percnt;
                    </p>
                    <p>Bounce Rate</p>
                </div>
                <div class="item" style="display: flex; flex-direction: column; align-items: center;">
                    <p style="font-size: 64px; display: flex; width: 235px; height: 150px; justify-content: center; align-items: center; border-radius: 100%; color: <?php echo $complaintRateColor?>; margin-bottom: 15px;">
                        <?php echo $complaintRate ?> &percnt;
                    </p>
                    <p>Complaint Rate</p>
                </div>
            </div>
        </div>

        <div class="bounce-detail" style="margin-top: 50px;">
            <?php
            $template = "MauticCoreBundle:Helper:chart.html.php";
            $templateData = [
                "chartType" => "line",
                "chartHeight" => 250,
                "chartData" => [
                    "labels" => array_reverse($data['MetricDataResults'][3]['Timestamps']),
                    "datasets" => [
                        [
                            "label" => "Bounce Rate",
                            "data" => array_reverse($data['MetricDataResults'][3]['Values']),
                            "backgroundColor" => "rgba(78,93,157,0.1)",
                            "borderColor" => "rgba(78,93,157,0.8)",
                            "pointHoverBackgroundColor" => "rgba(78,93,157,0.75)",
                            "pointHoverBorderColor" => "rgba(78,93,157,1)"
                        ]
                    ]
                ]
            ];
            echo $view->render($template, $templateData);
            ?>
        </div>
    </div>
</div>