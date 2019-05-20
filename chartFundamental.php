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
		<a href = 'fundamentalDataTableView.php'><button class = 'buttonBack buttonBackToMenu'>Back to fundamental data table</button></a><br>
		<a href = 'index.php'><button class = 'buttonBack buttonBackToMenu'>Back to main menu</button></a>
		<h3>Tickets Price</h3>
		<div id="chartPrice">
			
		</div>
		<br>
		<h3>Tickets SP500</h3>
		<div id="chartSP500">
	
		</div>
		<br>
		<h3>Tickets Shares</h3>
		<div id="chartShares">
		
		</div>
		<br>
		<h3>Tickets Sales</h3>
		<div id="chartSales">
		
		</div>
		<br>
		<h3>Tickets EPS(D)</h3>
		<div id="chartEPS_D">
		
		</div>
		<br>
		<h3>Tickets Equity</h3>
		<div id="chartEquity">
		
		</div>
		<br>
		<h3>Tickets Cash</h3>
		<div id="chartCash">
		
		</div>
		<?php
			$symbolValue = $_GET['Symbol'];
		?>
		<script type="text/javascript">
		function drawChartTechnical(dataArray, chart){
				console.log(dataArray);
				Highcharts.chart(chart, {
				title: {
					text: '<?php echo "Fundamental datas ticket chart: $symbolValue"; ?>'
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
					name: '<?php echo "$symbolValue"; ?>',
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
			$symbolValue = $_GET['Symbol'];
			
			if (version_compare(phpversion(), '7.1', '>=')) {
				ini_set( 'precision', 14 );
				ini_set( 'serialize_precision', -1 );
			}
			
			require "tableFunction.php";
			
			# Fundamental datas tickets chart - Price
			$sql = "SELECT * FROM fundamental_data WHERE Symbol = '$symbolValue' AND Period = 'Q1'";
			echo "<!-- $sql --!>";
			$sql_chart = mysqli_query($fundamental, $sql) or die("<h1>".mysqli_error()."</h1>");
			$array = array();

			while($row = mysqli_fetch_assoc($sql_chart)) {
				$array[] = floatval(str_replace(',', '.', $row['Price']));
			}

			$array = json_encode($array);
			
			echo "<script>drawChartTechnical($array, chartPrice);</script>";
			# ================================================= 
			
			# Fundamental datas tickets chart - SP500
			$sql = "SELECT * FROM fundamental_data WHERE Symbol = '$symbolValue' AND Period = 'Q1'";
			echo "<!-- $sql --!>";
			$sql_chart = mysqli_query($fundamental, $sql) or die("<h1>".mysqli_error()."</h1>");
			$array = array();

			while($row = mysqli_fetch_assoc($sql_chart)) {
				$array[] = floatval(str_replace(',', '.', $row['SP500']));
			}

			$array = json_encode($array);
			
			echo "<script>drawChartTechnical($array, chartSP500);</script>";
			# ====================================================== 
			
			# Fundamental datas tickets chart - Shares
			$sql = "SELECT * FROM fundamental_data WHERE Symbol = '$symbolValue' AND Period = 'Q1'";
			echo "<!-- $sql --!>";
			$sql_chart = mysqli_query($fundamental, $sql) or die("<h1>".mysqli_error()."</h1>");
			$array = array();

			while($row = mysqli_fetch_assoc($sql_chart)) {
				$array[] = floatval(str_replace(',', '.', $row['Shares']));
			}

			$array = json_encode($array);
			
			echo "<script>drawChartTechnical($array, chartShares);</script>";
			# ========================================
			
			# Fundamental datas tickets chart - Sales
			$sql = "SELECT * FROM fundamental_data WHERE Symbol = '$symbolValue' AND Period = 'Q1'";
			echo "<!-- $sql --!>";
			$sql_chart = mysqli_query($fundamental, $sql) or die("<h1>".mysqli_error()."</h1>");
			$array = array();

			while($row = mysqli_fetch_assoc($sql_chart)) {
				$array[] = floatval(str_replace(',', '.', $row['Sales']));
			}

			$array = json_encode($array);
			
			echo "<script>drawChartTechnical($array, chartSales);</script>";
			# ========================================
			
			# Fundamental datas tickets chart - EPS(D)
			$sql = "SELECT * FROM fundamental_data WHERE Symbol = '$symbolValue' AND Period = 'Q1'";
			echo "<!-- $sql --!>";
			$sql_chart = mysqli_query($fundamental, $sql) or die("<h1>".mysqli_error()."</h1>");
			$array = array();

			while($row = mysqli_fetch_assoc($sql_chart)) {
				$array[] = floatval(str_replace(',', '.', $row['EPS_D']));
			}

			$array = json_encode($array);
			
			echo "<script>drawChartTechnical($array, chartEPS_D);</script>";
			# ========================================
			
			# Fundamental datas tickets chart - Equity
			$sql = "SELECT * FROM fundamental_data WHERE Symbol = '$symbolValue' AND Period = 'Q1'";
			echo "<!-- $sql --!>";
			$sql_chart = mysqli_query($fundamental, $sql) or die("<h1>".mysqli_error()."</h1>");
			$array = array();

			while($row = mysqli_fetch_assoc($sql_chart)) {
				$array[] = floatval(str_replace(',', '.', $row['Equity']));
			}

			$array = json_encode($array);
			
			echo "<script>drawChartTechnical($array, chartEquity);</script>";
			# ========================================
			
			# Fundamental datas tickets chart - Cash
			$sql = "SELECT * FROM fundamental_data WHERE Symbol = '$symbolValue' AND Period = 'Q1'";
			echo "<!-- $sql --!>";
			$sql_chart = mysqli_query($fundamental, $sql) or die("<h1>".mysqli_error()."</h1>");
			$array = array();

			while($row = mysqli_fetch_assoc($sql_chart)) {
				$array[] = floatval(str_replace(',', '.', $row['Cash']));
			}

			$array = json_encode($array);
			
			echo "<script>drawChartTechnical($array, chartCash);</script>";
			# ========================================
		?>
	</body>
</html>