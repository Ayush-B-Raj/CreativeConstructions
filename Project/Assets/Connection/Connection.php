<?php
	$server="localhost";
	$user="root";
	$pw="";
	$db="db_cc";
	$conn=mysqli_connect($server,$user,$pw,$db);
	if(!$conn)
	{
		echo "connction error";
	}
?>
