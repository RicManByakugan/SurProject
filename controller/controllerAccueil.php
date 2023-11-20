<?php
	session_start();

	include 'modele/sur/modele.sur.php';
	include 'modele/publication/modele.publication.php';
	include 'config/connexion.php';
	$modele = new SurModele();
	$modelePubOffre = new ModelePub();
	$surIab = $modele->GetSur();
	$valueOffre = $modelePubOffre->GetPostOffre(1);

	if ($surIab['off'] == NULL) {
		if (isset($_GET['compte']) && !isset($_SESSION['idUser'])) {
			require_once('view/accueil/accueil/compte.php');
		}else{
			if (isset($_SESSION['idUser'])) {
				include 'modele/utilisateur/modele.utilisateur.php';
				$modeleUser = new UtilisateurModele();
				$User = $modeleUser->GetUserId($_SESSION['idUser']);
				$idUser = $_SESSION['idUser'];
			}
			require_once('view/accueil/accueil/template.php');
		}
	}else{
		$heures   = $surIab['ofH'];
	    $minutes  = $surIab['ofM']; 
	    $secondes = $surIab['ofS'];
	    $annee = date("Y");  
	    $mois  = date("m");  
	    $jour  = date("d"); 
	    $redirection = 'index.php';
	    $secondes = mktime(date("H") + $heures,date("i") + $minutes,date("s") + $secondes,$mois,$jour,$annee) - time();
		require_once('view/maintenance.php');
	}


 ?>