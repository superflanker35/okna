<?php

require_once('../settings.php');
require_once('../lib/db.php');

$con = connectDB();
$q = "SELECT * FROM `tasks` INNER JOIN `log` ON tasks.id = log.task_id ORDER BY log.time DESC;";
$res = mysqli_query($con, $q);
$htmlstr = '';

while ($data = mysqli_fetch_assoc($res)){
	$htmlstr .= "<form class='taskqueryform' action='#' method='post'><input type='hidden' id='taskid' value='".$data['id']."'/><span class='taskinfo'>".date("d.m.Y H:i:s", strtotime($data['time'])).' '.$data['task']."</span><input type='submit' value='Стереть'/></form>";
}

echo $htmlstr;