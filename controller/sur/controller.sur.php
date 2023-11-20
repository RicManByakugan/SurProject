<?php 
	if (isset($_POST['ModifSur'])) {
		session_start();
		if (isset($_SESSION['id_admin'])) {
			include '../../modele/sur/modele.sur.php';
			include '../../modele/activite/modele.activite.php';
			include '../../config/connexion.php';
			$modeleActivite = new ActivityAdmin();
			$modele = new SurModele();
			$ModifSur = $_POST['ModifSur'];
			$idAdmin = $_SESSION['id_admin'];
			$valeur = $_POST['valeur'];
 			$date_now = date("Y-m-d");


			if ($ModifSur=="telephone2") {
				$modele->UpdatePhone($valeur,NULL,NULL);
 				
 				$typePub = "NUMERO ORANGE";
				$descAct = "MODIFICATION";
	 			$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);
				
				echo "ok";
			}
			if ($ModifSur=="telephone3") {
				$modele->UpdatePhone(NULL,$valeur,NULL);

				$typePub = "NUMERO AIRTEL";
				$descAct = "MODIFICATION";
	 			$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);
				
				echo "ok";
			}
			if ($ModifSur=="telephoneAnother") {
				$modele->UpdatePhone(NULL,NULL,$valeur);

				$typePub = "AUTRE NUMERO";
				$descAct = "MODIFICATION";
	 			$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);

				echo "ok";
			}

			if ($ModifSur=="telephone") {
				$modele->UpdateCoordonne($valeur,NULL);
				$typePub = "NUMERO TELMA";
				$descAct = "MODIFICATION";
	 			$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);
				echo "ok";
			}
			if ($ModifSur=="email") {
				$modele->UpdateCoordonne(NULL,$valeur);
				$typePub = "EMAIL";
				$descAct = "MODIFICATION";
	 			$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);
				echo "ok";
			}


			if ($ModifSur=="arrivage") {
 				if ($valeur > $date_now) {
					$modele->UpdateDate($valeur,NULL);
					$typePub = "DATE ARRIVAGE";
					$descAct = "MODIFICATION";
		 			$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);
					echo "ok";
				}else{
					echo "Date inférieure à aujourd'hui";
				}
			}
			if ($ModifSur=="promotion") {
 				if ($valeur > $date_now) {
					$modele->UpdateDate(NULL,$valeur);
					$typePub = "DATE PROMOTION";
					$descAct = "MODIFICATION";
		 			$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);
					echo "ok";
				}else{
					echo "Date inférieure à aujourd'hui";
				}
			}
		}
	}
	if (isset($_POST['ModifSurReseau'])) {
		session_start();
		if (isset($_SESSION['id_admin'])) {
			include '../../modele/sur/modele.sur.php';
			include '../../modele/activite/modele.activite.php';
			include '../../config/connexion.php';
			$modeleActivite = new ActivityAdmin();
			$modele = new SurModele();
			$ModifSurReseau = $_POST['ModifSurReseau'];
			$idAdmin = $_POST['idAdmin'];
			$valeur = $_POST['valeur'];

			if ($ModifSurReseau=="facebook") {
				$modele->UpdateReseau($valeur,NULL,NULL,NULL);
				$typePub = "FACEBOOK";
				$descAct = "MODIFICATION";
	 			$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);
				echo "ok";
			}
			if ($ModifSurReseau=="youtube") {
				$modele->UpdateReseau(NULL,$valeur,NULL,NULL);
				$typePub = "YOUTUBE";
				$descAct = "MODIFICATION";
	 			$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);
				echo "ok";
			}
			if ($ModifSurReseau=="instagram") {
				$modele->UpdateReseau(NULL,NULL,$valeur,NULL);
				$typePub = "INSTAGRAM";
				$descAct = "MODIFICATION";
	 			$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);
				echo "ok";
			}
			if ($ModifSurReseau=="twitter") {
 				$modele->UpdateReseau(NULL,NULL,NULL,$valeur);
 				$typePub = "TWITTER";
				$descAct = "MODIFICATION";
	 			$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);
				echo "ok";
			}
		}
	}

	if (isset($_POST['RecupDonneSite'])) {
			include '../../modele/sur/modele.sur.php';
			include '../../config/connexion.php';
			$modele = new SurModele();
			$type = $_POST['RecupDonneSite'];
			$donne = $modele->GetSur();
			if ($type=="telephone") {
				if ($donne['tel_sur']==NULL || $donne['tel_sur']=="") {
					echo "Entrer un numéro pour le site";
				}else{
					echo $donne['tel_sur'];
				}
			}
			if ($type=="telephoneAnother") {
				if ($donne['autre_tel']==NULL || $donne['autre_tel']=="") {
					echo "Entrer un autre numéro pour le site";
				}else{
					echo $donne['autre_tel'];
				}
			}
			if ($type=="telephone2") {
				if ($donne['tel_sur2']==NULL || $donne['tel_sur2']=="") {
					echo "Entrer un numéro pour le site";
				}else{
					echo $donne['tel_sur2'];
				}
			}
			if ($type=="telephone3") {
				if ($donne['tel_sur3']==NULL || $donne['tel_sur3']=="") {
					echo "Entrer un numéro pour le site";
				}else{
					echo $donne['tel_sur3'];
				}
			}
			if ($type=="mail") {
				if ($donne['email_sur']==NULL || $donne['email_sur']=="") {
					echo "Entrer un adresse pour le site";
				}else{
					echo $donne['email_sur'];
				}
			}
			if ($type=="arrivage") {
				if ($donne['newArrivage_sur']==NULL || $donne['newArrivage_sur']=="") {
					echo "Entrer une date";
				}else{
					echo $donne['newArrivage_sur'];
				}
			}
			if ($type=="promotion") {
				if ($donne['newProm_sur']==NULL || $donne['newProm_sur']=="") {
					echo "Entrer une date";
				}else{
					echo $donne['newProm_sur'];
				}
			}

			if ($type=="facebook") {
				if ($donne['fbSur']==NULL || $donne['fbSur']=="") {
					echo "Entrer le lien du réseau";
				}else{
					echo $donne['fbSur'];
				}
			}
			if ($type=="instagram") {
				if ($donne['instaSur']==NULL || $donne['instaSur']=="") {
					echo "Entrer le lien du réseau";
				}else{
					echo $donne['instaSur'];
				}
			}
			if ($type=="youtube") {
				if ($donne['youSur']==NULL || $donne['youSur']=="") {
					echo "Entrer le lien du réseau";
				}else{
					echo $donne['youSur'];
				}
			}
			if ($type=="twitter") {
				if ($donne['twiSur']==NULL || $donne['twiSur']=="") {
					echo "Entrer le lien du réseau";
				}else{
					echo $donne['twiSur'];
				}
			}

	}

	if (isset($_POST['effaceDonne'])) {
		session_start();
		if (isset($_SESSION['id_admin'])) {
			include '../../modele/sur/modele.sur.php';
			include '../../modele/activite/modele.activite.php';
			include '../../config/connexion.php';
			$modeleActivite = new ActivityAdmin();
			$modele = new SurModele();	
			$donneVer = $modele->GetSur();
			$idAdmin = $_SESSION['id_admin'];
			$champs = $_POST['effaceDonne'];
			
			switch ($champs) {
				case 'tel_sur3':
					$typePub = "NUMERO AIRTEL";
				break;

				case 'tel_sur2':
					$typePub = "NUMERO ORANGE";
				break;

				case 'tel_sur':
					$typePub = "NUMERO TELMA";
				break;

				case 'autre_tel':
					$typePub = "AUTRE NUMERO";
				break;

				case 'email_sur':
					$typePub = "EMAIL";
				break;

				case 'newArrivage_sur':
					$typePub = "DATE ARRIVAGE";
				break;

				case 'newProm_sur':				
					$typePub = "DATE PROMOTION";
				break;

				case 'fbSur':
					$typePub = "FACEBOOK";
				break;
				
				case 'twiSur':
					$typePub = "TWITTER";
				break;

				case 'youSur':
					$typePub = "YOUTUBE";
				break;

				case 'instaSur':
					$typePub = "INSTAGRAM";
				break;
				
				default:
					$typePub = NULL;
					break;
			}

			if ($typePub!=NULL) {
				if ($donneVer[$champs]==NULL) {
					echo "Donnée déjà vide";
				}else{
					$descAct = "SUPPRESSION";
					$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);
					$modele->SetNullValue($champs);
					echo "ok";
				}
			}else{
				echo "Erreur de la suppression";
			}
		}else{
			echo "Erreur de la suppression";
		}
	}

	if (isset($_POST['ReloadCompte'])) {
		include '../../modele/admin/modele.admin.php';
		include '../../modele/sur/modele.sur.php';
		include '../../config/connexion.php';
		$modele = new SurModele();
		$surIab = $modele->GetSur();

		if ($surIab['off'] == NULL) {
			echo "ko";
		}else{
			echo "ok";
		}
	}


 ?>