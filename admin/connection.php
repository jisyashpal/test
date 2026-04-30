<?php
if (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] == 'localhost:8081' || $_SERVER['HTTP_HOST'] == 'localhost') {
	$conn = new mysqli("localhost", "root", "", "jissoftware_amorous_glances");
} else {
	$conn = new MySQLi("localhost", "jissoftware_amorous_glances", "laS_fLUFx=~I", "jissoftware_amorous_glances");
}
if ($conn->connect_errno) {
	echo "connection failed!!";
}
date_default_timezone_set('Asia/Kolkata');
