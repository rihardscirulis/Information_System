<DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <title>Technical data table</title>
        <meta name="Rihards Ričis Cīrulis">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="CSS/style.css" rel="stylesheet">

		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/series-label.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script src="https://code.highcharts.com/modules/export-data.js"></script>
		
	</head>
	<body>
	<div id="chart"></div>
	<script type="text/javascript">
	function drawChart(dataArray){
		console.log(dataArray);

		Highcharts.chart('chart', {

title: {
	text: 'Solar Employment Growth by Sector, 2010-2016'
},

subtitle: {
	text: 'Source: thesolarfoundation.com'
},

yAxis: {
	title: {
		text: 'Number of Employees'
	}
},
legend: {
	layout: 'vertical',
	align: 'right',
	verticalAlign: 'middle'
},

plotOptions: {
	series: {
		label: {
			connectorAllowed: false
		}
	}
},

series: [{
	name: 'YUM',
	data: dataArray
}
],

responsive: {
	rules: [{
		condition: {
			maxWidth: 500
		},
		chartOptions: {
			legend: {
				layout: 'horizontal',
				align: 'center',
				verticalAlign: 'bottom'
			}
		}
	}]
}

});
	}
	</script>

		<?php
		if (version_compare(phpversion(), '7.1', '>=')) {
			ini_set( 'precision', 14 );
			ini_set( 'serialize_precision', -1 );
		}
			require "tableFunction.php";
			# Tehnisko datu tabula
			echo "<h3>Tehniskie dati</h3>";
			echo "<a href = 'index.php'><button class = 'buttonBack buttonBackToMenu'>Back to main menu</button></a>";
			$sql = "SELECT * FROM technical_data WHERE Ticket = 'YUM'";
			echo "<!-- $sql --!>";
			$sql_chart = mysqli_query($technical, $sql) or die("<h1>".mysqli_error()."</h1>");
			$sql_table = mysqli_query($technical, $sql) or die("<h1>".mysqli_error()."</h1>");
			table($sql_table);
			$array = array();

			while($row = mysqli_fetch_assoc($sql_chart)) {
				$array[] = floatval(str_replace(',', '.', $row['Technical_value']));
		
			}

			$array = json_encode($array);
			
			echo "<script>drawChart($array);</script>";
			
		?>
	</body>
	
</html>