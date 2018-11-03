<?php
	
function connectDB($server=DB_SERVER,$username=DB_USERNAME,$password=DB_PASSWORD,$dbname=DB_NAME)
{
	$con=mysqli_connect($server,$username,$password,$dbname);
	if (mysqli_connect_errno()){
		exit('No connection to DB ').mysqli_connect_error();
	}else{
		mysqli_set_charset($con,'utf8');
		return $con;
	}
}