<?php
session_start();
include "dbconnect.php";

	if(!isset($_SESSION['username']))
	{
	header ('Location: login.php?success=3');
	exit();
	}
	else
	{
	//$email=$_SESSION['email'];
	
	$_SESSION=array();
	session_destroy();
	}
	header ('Location: login.php?success=3');
 
?>