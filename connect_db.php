<?php
	$con = mysqli_connect('localhost', 'root', '');

	if (!$con)
	{
		die("Database Connection Failed" . mysqli_error());
	}

	$select_db = mysqli_select_db($con,'pharmacy');
	if (!$select_db)
	{
		die("Database Selection Failed" . mysqli_error());
	}
?>