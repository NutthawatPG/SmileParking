<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
ate_default_timezone_set('Asia/Bangkok');
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
				
		$User = $_GET['User'];
		$Pwd = $_GET['Password'];

		$result = mysqli_query($link, "SELECT * FROM userTable WHERE user = '$User' and password = '$Pwd'");

		if ($result) {

			while($row=mysqli_fetch_assoc($result)){
			$output[]=$row;

			}	// while

			echo json_encode($output);

		} //if

	} else echo "Welcome function get User [PROD]";	// if2
   
}	// if1


	mysqli_close($link);
?>