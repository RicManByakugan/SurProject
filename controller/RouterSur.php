<?php 
	try{
		if (isset($_GET['admin']) && $_GET['admin']==1) {
			require_once('controller/controllerAdmin.php');
		}else{
			require_once('controller/controllerAccueil.php');
		}
	}catch(Exception $e){
		require_once('view/error.php');
	}

 ?>