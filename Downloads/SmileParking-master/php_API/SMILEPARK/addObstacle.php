<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
date_default_timezone_set('Asia/Bangkok');
$link = mysqli_connect('localhost', 'root', 'H1ng@1634', "SMILEPARK");

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
		
		$car_id = $_GET['car_id'];	
		$informer_name = $_GET['informer_name'];		
		$informer_contact = $_GET['informer_contact'];
		$url_image = $_GET['url_image'];
		$issue_date = date('Y-m-d');
		$issue_datetime = date('Y-m-d H:i:s');
		
							
		$sql = "INSERT INTO `obstacleTable` (`id`, `ref_car_id`, `issue_date`, `issue_datetime`, `informer_name`, `informer_contact`, `url_image`, `expire_status`, `device_id`, `acknowledge_status`) VALUES (NULL, '$car_id', '$issue_date', '$issue_datetime', '$informer_name', '$informer_contact', '$url_image', '0', NULL, '0');";

			//echo "sql string : $sql";

		$result = mysqli_query($link, $sql);

		if ($result) {
			echo "true";
		} else {
			echo "false";
		}

	} else echo "Welcome add obstacle function.";
   
}
	mysqli_close($link);
?>