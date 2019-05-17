<DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <title>Fundamental data table</title>
        <meta name="Rihards Ričis Cīrulis">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="CSS/style.css" rel="stylesheet">
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
		?>
	</body>
</html>