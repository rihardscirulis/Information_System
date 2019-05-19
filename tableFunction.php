<?php
	function table($sql_res) {
        $first = true;
        echo "<table class=\"schedule\">";
        echo "<table border=\"1\">";
        while($row = mysqli_fetch_assoc($sql_res)) {
			if($first) {
                echo "<tr>";
                foreach($row as $k=>$v) {
                    echo "<th>$k</th>";
                }
                echo "</tr>".PHP_EOL;
                    $first = false;
            }
            echo "<tr>";
            foreach($row as $v) {
                echo "<td>$v</td>";
            }
            echo "</tr>".PHP_EOL;
        }
        echo "</table>";
        $row_cnt = mysqli_num_rows($sql_res);
        # Aizvēr rezultāta darbību
        mysqli_free_result($sql_res); 
    }
	
    # Veidojam savienojumu ar serveri un datu bazi
    $technical = mysqli_connect('localhost','root','','technical_data') or die('Cant connect to the database');
	$fundamental = mysqli_connect('localhost','root','','fundamental_data') or die('Cant connect to the database');
    $chs_technical = mysqli_set_charset($technical, "utf8");
	$chs_fundamental = mysqli_set_charset($fundamental, "utf8");
?>