<?php

require_once('../settings.php');
require_once('../lib/db.php');

$taskid = $_POST['taskid'];

$con = connectDB();
$q = "DELETE tasks.*, log.* FROM `tasks` LEFT JOIN `log` ON tasks.id = log.task_id WHERE tasks.id = '$taskid';";
mysqli_query($con, $q);
