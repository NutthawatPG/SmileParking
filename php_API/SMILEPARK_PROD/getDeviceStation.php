<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
date_default_timezone_set('Asia/Bangkok');

$link = mysqli_connect('localhost', 'nutgunsy_sa', 'H1ng@1634', "nutgunsy_smilepark");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    
    exit;
}

if (!$link->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $link->error);
    exit();
	}

if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {
				
		$device_token = $_GET['device_token'];

		
		if (($device_token !== '') and ($device_token !== NULL)) {
			$query =  "SELECT s.ref_station_id , w.station_name_en,  w.station_name_th , w.lat_position, w.long_position FROM stationTable as s inner join workStation as w on s.ref_station_id = w.station_id WHERE s.device_token = '$device_token' order by s.mod_date DESC limit 1 ";
			
		} 

		//echo "query srtring : $query ";		

		$result = mysqli_query($link, $query);


		if ($result) {

			while($row=mysqli_fetch_assoc($result)){
			$output[]=$row;

			}	// while

			echo json_encode($output);

		} //if

	} else echo "Welcome function find station by device token [PROD]";	// if2
   
}	// if1


	mysqli_close($link);
?>