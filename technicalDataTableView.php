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
		
		<style>
			input[type=submit] {
				background-color: #4CAF50;
				border: none;
				color: white;
				padding: 16px 32px;
				text-decoration: none;
				margin: 4px 2px;
				cursor: pointer;
			}
		</style>
	</head>
	<body>
			<?php
				if (version_compare(phpversion(), '7.1', '>=')) {
					ini_set( 'precision', 14 );
					ini_set( 'serialize_precision', -1 );
				}
				require "tableFunction.php";
				# Technical data table
				echo "<h3>Technical data table</h3>";
				echo "<a href = 'index.php'><button class = 'buttonBack buttonBackToMenu'>Back to main menu</button></a>";
				$sql = "SELECT * FROM technical_data";
				echo "<!-- $sql --!>";
				
				$sql_table = mysqli_query($technical, $sql) or die("<h1>".mysqli_error()."</h1>");
				echo "<div class = 'grid-container'>";
				echo "<div class = grid-item>";
				table($sql_table);
				echo "</div>";

				require "connectTechnical.php";
				$searchSQL = "SELECT DISTINCT Ticket FROM technical_data";
				$result = mysqli_query($connection, $searchSQL);
				echo "<div class = grid-item>";
				if ($result->num_rows > 0) {
					// output data of each row
					echo "<form method = 'get' action='chartTechnical.php'>";
					while($row = $result->fetch_assoc()) {
						$table_name = $row['Ticket'];
						echo "<a href = 'chartTechnical.php'><input type='submit' name='Ticket' value='$table_name' /> </a><br><br>";
					}
					echo "</form>";
				}
				echo "</div>";
			?>
		</div>
	</body>
</html>