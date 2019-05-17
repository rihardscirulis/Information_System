<DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <title>Informācijas sistēma</title>
        <meta name="Rihards Ričis Cīrulis">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<h1>Informācijas sistēmas dati un grafiki</h1>
		<!-- Galvenais saturs -->
		<main>
			<?php
				# Izsauc tabulas funkcijas php failu
                require "tableFunction.php";
				
				# Izsauc fundamentālo datu tabulu php failu
				require "fundamentalDataTableView.php";
				
				# Izsauc tehnisko datu tabulu php failu
				require "technicalDataTableView.php";
            ?>
		</main>
	</body>
</html>