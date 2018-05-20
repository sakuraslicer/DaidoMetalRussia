<?php

	require('db_config.php');

	/* Getting demo_viewer table data */
	$sql = "SELECT SUM(count_of_query) as count, geo as geo FROM checked GROUP BY geo";
	$viewer = mysqli_query($mysqli, $sql);
	$viewer = mysqli_fetch_all($viewer, MYSQLI_ASSOC);
    $viewer = json_encode(array_column($viewer, 'count'), JSON_NUMERIC_CHECK);

    print json_encode($viewer);

    $sql = "SELECT SUM(count_of_query) as count, geo as geo FROM checked GROUP BY geo";
	$click = mysqli_query($mysqli, $sql);
	$click = mysqli_fetch_all($click, MYSQLI_ASSOC);
    $click = json_encode(array_column($click, 'geo'), JSON_NUMERIC_CHECK);

    print json_encode($click);

	/* Getting demo_click table data */
    $query = sprintf("SELECT geo as geo, SUM(count_of_query) as count FROM checked GROUP BY geo");
    $result = mysqli_query($mysqli, $query);

    $data = array();
    foreach ($result as $row){
        $data[] = $row;
    }
    $json = json_encode($data);
    //echo($json);
    //print json_encode($data);
    
    //echo($click);
    $data = array();
    if (is_array($click) || is_object($click))
    {
        foreach ($click as $value)
        {
            $data[] = $value;
            echo($value);
        }
    }
    print_r($data);
?>


<!DOCTYPE html>
<html>
<head>
	<title>HighChart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
</head>
<body>


<script type="text/javascript">

$(function (data) {
    //console.log(json);
    var place = eval('<?php echo $json;?>');
    
    var geo = [];
    var count = [];
    for(var i in place){
        geo.push(place[i].geo);
        count.push(place[i].count);
    }
    console.log(geo);
    console.log(count);
    
    var data_viewer = <?php echo $viewer; ?>;
    var data_place = <?php echo $click; ?>;

    $('#container').highcharts({
        
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: ''
        },
        plotOptions: {
            pie: {
                showInLegend: false,
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: data_place,
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: "Проверок",
            data: data_viewer,
            sliced: true,
            selected: true
        }]
    });
});


</script>

<div class="container">
	<br/>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Статистика повторных проверок</div>
                <div class="panel-body">
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>