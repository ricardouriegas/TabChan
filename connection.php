<?php 
	$host="localhost";
	$user="root";
	$password="";
	$db="TABCHAN";

	if(!$con = mysqli_connect($host,$user,$password,$db))
	{

		die("Failed to connect!");
	}

