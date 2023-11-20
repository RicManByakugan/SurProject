<?php

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: PUT, GET, POST");
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
	
	require 'connexion.php';

	if(isset($_GET['id']))
	{
	  $uid   = $_GET['id'];

	  $sql = "SELECT * FROM `publication` WHERE `id_pub` ='{$uid}' LIMIT 1";

	  $result = mysqli_query($con,$sql);
	  $row = mysqli_fetch_assoc($result);
	  
	  $json = json_encode(['data'=>$row]);
	  echo $json;
	}

exit;