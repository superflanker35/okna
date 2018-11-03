<?php

require_once('../settings.php');
require_once('../lib/db.php');

$task = $_POST['task'];

if (!empty($_SERVER['HTTP_CLIENT_IP'])){
	$ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$con = connectDB();
$q = "INSERT INTO `tasks` (`task`) VALUES('$task');";
mysqli_query($con, $q);
$q = "INSERT INTO `log` (`task_id`, `ip`) VALUES(LAST_INSERT_ID(), '$ip');";
mysqli_query($con, $q);

