<?php 
	session_start();

	include 'modele/sur/modele.sur.php';
	include 'config/connexion.php';
	$modele = new SurModele();
	$surIab = $modele->GetSur();

	
	if (isset($_SESSION['id_admin']) && $_SESSION['id_admin']!=NULL && $_SESSION['id_admin']!=0) {
		include 'modele/admin/modele.admin.php';
		$id_admin = $_SESSION['id_admin'];
		$modele = new ModeleAdmin();
		$donneAdmin = $modele->GetUserId($id_admin);

		require_once('view/admin/admin/administration.php');

	}else{
		require_once('view/admin/admin/connexion.php');
	}
 ?>