<?php 
	if (isset($_POST['RecupActivity'])) {
		include '../../config/connexion.php';
		include '../../modele/activite/modele.activite.php';
		$modeleActivite = new ActivityAdmin();
		$donne = $modeleActivite->GetAllActivite();
		if ($donne) {
			foreach ($donne as $key => $value) {

				if($value['DescAct']=="AJOUT"){
					$desc = "<span class='badge badge-success'>".$value['DescAct']."</span>";
				}
				else if($value['DescAct']=="SUPPRESSION"){
					$desc = "<span class='badge badge-danger'>".$value['DescAct']."</span>";
				}
				else if($value['DescAct']=="MODIFICATION"){
					$desc = "<span class='badge badge-info'>".$value['DescAct']."</span>";
				}
				else{
					$desc = "<span class='badge badge-info text-uppercase'>".substr($value['DescAct'], 0, 25)."...</span>";
				}
				echo "
								<tr>
			                      <td><a>".$value['pseudo_admin']."</a></td>
			                      <td>".$value['TypeAct']."</td>
			                      <td>".$desc."</td>
			                      <td>
			                        <div class='sparkbar' data-color='#00a65a' data-height='20'>".$value['dateAct']." | ".$value['heureAct']."</div>
			                      </td>
			                    </tr>

				";
			}
		}
	}
	if (isset($_POST['RecupActivityCo'])) {
		include '../../config/connexion.php';
		include '../../modele/activite/modele.activite.php';
		$modeleActivite = new ActivityAdmin();
		$donne = $modeleActivite->GetAllActiviteCo();
		if ($donne) {
			foreach ($donne as $key => $value) {

				if($value['DescAct']=="CONCLURE"){
					$desc = "<span class='badge badge-success'>".$value['DescAct']."</span>";
				}
				else if($value['DescAct']=="SUPPRESSION"){
					$desc = "<span class='badge badge-danger'>".$value['DescAct']."</span>";
				}
				else if($value['DescAct']=="DECLINER"){
					$desc = "<span class='badge badge-danger'>".$value['DescAct']."</span>";
				}
				else if($value['DescAct']=="LIVRAISON"){
					$desc = "<span class='badge badge-warning'>".$value['DescAct']."</span>";
				}
				else{
					$desc = "<span class='badge badge-info text-uppercase'>".substr($value['DescAct'], 0, 25)."</span>";
				}
				echo "
								<tr>
			                      <td><a>".$value['pseudo_admin']."</a></td>
			                      <td>".$value['TypeAct']."</td>
			                      <td>".$desc."</td>
			                      <td>
			                        <div class='sparkbar' data-color='#00a65a' data-height='20'>".$value['dateAct']." | ".$value['heureAct']."</div>
			                      </td>
			                    </tr>

				";
			}
		}
	}
	if (isset($_POST['RecupActivityCount'])) {
		include '../../config/connexion.php';
		include '../../modele/activite/modele.activite.php';
		$modeleActivite = new ActivityAdmin();

		$nom = $_POST['RecupActivityCount'];
		$donne = $modeleActivite->GetCount($nom);

		echo $donne['nombre'];
	}

	if (isset($_POST['RecupActivityCountSponsSpons'])) {
		include '../../config/connexion.php';
		include '../../modele/activite/modele.activite.php';
		$modeleActivite = new ActivityAdmin();

		$donne = $modeleActivite->GetCountSpons();

		echo $donne['nombre'];
	}

	if (isset($_POST['RecupActivityCountPat'])) {
		include '../../config/connexion.php';
		include '../../modele/activite/modele.activite.php';
		$modeleActivite = new ActivityAdmin();

		$donne = $modeleActivite->GetCountPat();

		echo $donne['nombre'];
	}







 ?>