<?php
	spl_autoload_register(function($dossier,$class)
	{
		require("modele/".$dossier."/modele.".$class.".php");
	});

	require_once('controller/RouterSur.php');
?>