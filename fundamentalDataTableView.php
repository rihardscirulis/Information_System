<DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <title>Fundamental data table</title>
        <meta name="Rihards Ričis Cīrulis">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="CSS/style.css" rel="stylesheet">
		
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
			require "tableFunction.php";

			# Fundamental data table view
			echo "<h3>Fundamental data table</h3>";
			echo "<a href = 'index.php'><button class = 'buttonBack buttonBackToMenu'>Back to main menu</button></a>";
			$sql = "SELECT * FROM fundamental_data";
			echo "<!-- $sql --!>";
			$sql_res = mysqli_query($fundamental, $sql) or die("<h1>".mysqli_error()."</h1>");
			table($sql_res);
			echo "<br>";
			require "connectFundamental.php";
				$searchSQL = "SELECT DISTINCT Symbol FROM fundamental_data";
				$result = mysqli_query($connection, $searchSQL);
				if ($result->num_rows > 0) {
					// output data of each row
					echo "<form method = 'get' action='chartFundamental.php'>";
					while($row = $result->fetch_assoc()) {
						$table_name = $row['Symbol'];
						echo "<a href = 'chartFundamental.php'><input type='submit' name='Symbol' value='$table_name' /> </a><br><br>";
					}
					echo "</form>";
				}
		?>
	</body>
</html>