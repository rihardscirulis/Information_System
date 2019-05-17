<?php
	# Fundamentālo datu tabula
	echo "<h3>Fundamentālie dati</h3>";
	$sql = "SELECT * FROM fundamental_data";
    echo "<!-- $sql --!>";
    $sql_res = mysqli_query($fundamental, $sql) or die("<h1>".mysqli_error()."</h1>");
    table($sql_res);
?>