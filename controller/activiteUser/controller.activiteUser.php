<?php 
	if (isset($_POST['CountAct'])) {
		session_start();
		if (isset($_SESSION['idUser'])) {
			include '../../config/connexion.php';
			include '../../modele/activiteUser/modele.activiteUser.php';
			$modeleActivite = new ActivityUser();
			
			$type = $_POST['CountAct'];
			$idUser = $_SESSION['idUser'];

			$donneAct = $modeleActivite->GetCountActByType($type,$idUser);
			
			$resF = 3 - $donneAct['nombreActType'];

			if ($resF < 0 || $resF == 0) {
				echo "Vous ne pouvez plus effectuer un changement";
			}
			if ($resF == 1) {
				echo "Votre dernier changement possible";
			}
			if ($resF > 1) {
				echo "Changement en ".$resF." temps possible";
			}
		}else{
			echo "Erreur";
		}
	}






?>