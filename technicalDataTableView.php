<?php
	# Tehnisko datu tabula
    echo "<h3>Tehniskie dati</h3>";
	$sql = "SELECT * FROM technical_data";
    echo "<!-- $sql --!>";
    $sql_res = mysqli_query($technical, $sql) or die("<h1>".mysqli_error()."</h1>");
    table($sql_res);
?>
