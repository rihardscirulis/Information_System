<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "technical_data";
    //Create connection
    $connection = mysqli_connect($servername, $username, $password, $dbname);
	
    //-----------------
    //Change character set to utf8
    if(!mysqli_set_charset($connection, "utf8")) {
        //printf("Error loading character set utf8: %s\n", mysqli_error($connection));
    }
    else {
        //printf("Current character set: %s\n", mysqli_character_set_name($connection));
    }
    //Check connection
    if (!$connection) {
        //die("Connection failed: " . mysqli_connect_error());
    }
    else{
        //echo "Connected successfully";
    }
    //----------------
?>