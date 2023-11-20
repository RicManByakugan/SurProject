<?php 

	if (isset($_POST['envoiePart'])) {
			include '../../modele/partenaire/modele.partenaire.php';
			include '../../modele/activite/modele.activite.php';
			include '../../config/connexion.php';
			$modeleActivite = new ActivityAdmin();
			$modele = new ModelePartenaire();
			
			$idAdmin = $_POST['idAdmin'];
			$nomPart = $_POST['nomPart'];
			$contactPart = $_POST['contactPart'];
			$provincePart = $_POST['provincePart'];
			$adressePart = $_POST['adressePart'];
			
			$logoPart = $_FILES['logoParta']['name'];
			$logoPartName = "";

			if (!empty($logoPart)) {
					$fileInfo = pathinfo($_FILES['logoParta']['name']);
					$ext = $fileInfo['extension'];
					$logoPartName = rand().time().'surimagePart.'.$ext;
					$target = "../../content/data/image/partenaire/".$logoPartName;
					 	if (file_exists($target) && !empty($logoParta)) {
					 			$target = rand().$target;
								if (move_uploaded_file($_FILES['logoParta']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}else{
					 			if (move_uploaded_file($_FILES['logoParta']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}
			}

			$modele->AddPart($idAdmin,$nomPart,$contactPart,$logoPartName,$provincePart,$adressePart);

			$typePub = "PARTENAIRE";
			$descAct = "AJOUT";
	 		$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);
 ?>
 <script type="text/javascript">
 	window.top.window.Reset('PartGo');
 </script>
 <?php 
	}

	if (isset($_POST['RecupPat'])) {
		include '../../modele/partenaire/modele.partenaire.php';
		include '../../config/connexion.php';
		$modele = new ModelePartenaire();

		$donne = $modele->GetPart();
		if ($donne) {
			foreach ($donne as $key => $value) {
				echo "
						<div class='marqueOne'>
			                      <label>".$value['nom_partenaire']."</label>
			                      <span class='delMarque' onclick='SupPartenaire(".$value['id_partenaire'].");'><i class='typcn typcn-delete-outline'></i></span><br><hr>
			                      <img src='content/data/image/partenaire/".$value['logo_partenaire']."' height='80' width='80'><br>
			                      <small>".$value['province_partenaire']." | ".$value['adresse_partenaire']."</small><hr>
			                      <h4>Contact : ".$value['contactpartenaire']."</h4>
						</div>
				";
			}

		}else{
			echo "Liste vide";
		}
	}

	if (isset($_POST['SupPartid'])) {
		session_start();
		if (isset($_SESSION['id_admin'])) {
			include '../../modele/partenaire/modele.partenaire.php';
			include '../../modele/activite/modele.activite.php';
			include '../../config/connexion.php';
			$modeleActivite = new ActivityAdmin();
			$modele = new ModelePartenaire();

			$SupPartid = $_POST['SupPartid'];
			$idAdmin = $_SESSION['id_admin'];

			$modele->DelPart($SupPartid);

			$typePub = "PARTENAIRE";
			$descAct = "SUPPRESSION";
		 	$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);

			echo "ok";
		}else{
			echo "Erreur de l'action";
		}
	}

	if (isset($_POST['RecupPartListeCl'])) {
		include '../../modele/partenaire/modele.partenaire.php';
		include '../../config/connexion.php';
		$modele = new ModelePartenaire();

		$donne = $modele->GetPart();

		if ($donne) {
					echo "
				        <div class='py-2 px-4 text-white mb-3' style='background:#344198;'>
	        				<strong class='small text-uppercase font-weight-bold'>Partenaires</strong>
	        			</div>
	        			<ul class='list-unstyled small text-muted pl-lg-4 font-weight-normal'>
					";
			foreach ($donne as $key => $value) {
				if (isset($value['contactpartenaire']) && $value['contactpartenaire']!=NULL || $value['contactpartenaire']!="") {
					$contacter = "<a href='tel:".$value['contactpartenaire']."' target='blank'><button class='btn btn-primary' style='width: 100%;'>Contacter</button></a>";
				}else{
					$contacter = "";
				}
					echo "
						 <li class='mb-2 cliclHere'>
						 	<div class='d-flex'>
			                  	<a data-toggle='collapse' href='#detaillePp".$value['id_partenaire']."'>".$value['nom_partenaire']."</a><br>
		                  	</div>
		                  	<div class='collapse' id='detaillePp".$value['id_partenaire']."'>
		                  		<hr>
		                  		<div class='col' style='text-align:center;'>
									<small>".$value['province_partenaire']." | ".$value['adresse_partenaire']."</small><br>
									<img src='content/data/image/partenaire/".$value['logo_partenaire']."' width='70' height='70' />
								</div>
								".$contacter."
		                  	</div>
		                </li>
					";
			}
					echo "
							</ul><br><br>
					";
		}
	}











?>