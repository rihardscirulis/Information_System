<DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <title>Fundamental data table</title>
        <meta name="Rihards Ričis Cīrulis">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="CSS/style.css" rel="stylesheet">
		
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/series-label.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script src="https://code.highcharts.com/modules/export-data.js"></script>
	</head>
	<body>
		<h1>Charts</h1>
		<div id="chart">
	
		</div>
		<?php
			$ticketValue = $_GET['Ticket'];
		?>
		<script type="text/javascript">
		function drawChart(dataArray){
				console.log(dataArray);
				Highcharts.chart('chart', {
				title: {
					text: '<?php echo "Tickets chart: $ticketValue"; ?>'
				},

				subtitle: {
					text: ''
				},

				yAxis: {
					title: {
						text: 'Values'
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
					name: '<?php echo "$ticketValue";?>',
					data: dataArray
				}],

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
			$ticketValue = $_GET['Ticket'];
	
			if (version_compare(phpversion(), '7.1', '>=')) {
				ini_set( 'precision', 14 );
				ini_set( 'serialize_precision', -1 );
			}
			
			require "tableFunction.php";
			# Tehnisko datu tabula
			echo "<a href = 'technicalDataTableView.php'><button class = 'buttonBack buttonBackToMenu'>Back to technical data table</button></a><br>";
			echo "<a href = 'index.php'><button class = 'buttonBack buttonBackToMenu'>Back to main menu</button></a>";
			$sql = "SELECT * FROM technical_data WHERE Ticket = '$ticketValue'";
			echo "<!-- $sql --!>";
			$sql_chart = mysqli_query($technical, $sql) or die("<h1>".mysqli_error()."</h1>");
			echo "<div class = 'grid-container'>";
			echo "<div class = grid-item>";
			echo "</div>";
			$array = array();

			while($row = mysqli_fetch_assoc($sql_chart)) {
				$array[] = floatval(str_replace(',', '.', $row['Technical_value']));
			}

			$array = json_encode($array);
				
			echo "<script>drawChart($array);</script>";
		?>
	</body>
</html>