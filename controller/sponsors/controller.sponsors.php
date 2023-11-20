<?php 

	if (isset($_POST['envoieSpons'])) {
			include '../../modele/sponsors/modele.sponsors.php';
			include '../../modele/activite/modele.activite.php';
			include '../../config/connexion.php';
			$modeleActivite = new ActivityAdmin();
			$modele = new ModeleSpons();
			
			$idAdmin = $_POST['idAdmin'];
			$nomSpons = $_POST['nomSpons'];
			$contactSpons = $_POST['contactSpons'];
			$provinceSpons = $_POST['provinceSpons'];
			$adresseSpons = $_POST['adresseSpons'];
			
			$logoSpons = $_FILES['logoSpons']['name'];
			$logoSponsName = "";

			if (!empty($logoSpons)) {
					$fileInfo = pathinfo($_FILES['logoSpons']['name']);
					$ext = $fileInfo['extension'];
					$logoSponsName = rand().time().'surimageSpons.'.$ext;
					$target = "../../content/data/image/sponsor/".$logoSponsName;
					
					 	if (file_exists($target) && !empty($logoSpons)) {
					 			$target = rand().$target;
								if (move_uploaded_file($_FILES['logoSpons']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}else{
					 			if (move_uploaded_file($_FILES['logoSpons']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}
			}

			$modele->AddSpons($idAdmin,$nomSpons,$contactSpons,$logoSponsName,$provinceSpons,$adresseSpons);

			$typePub = "SPONSORS";
			$descAct = "AJOUT";
	 		$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);
 ?>
 <script type="text/javascript">
 	window.top.window.Reset('SponsGo');
 </script>
 <?php 
	}

	if (isset($_POST['RecupSpons'])) {
		include '../../modele/sponsors/modele.sponsors.php';
		include '../../config/connexion.php';
		$modele = new ModeleSpons();

		$donne = $modele->GetSpons();
		if ($donne) {
			foreach ($donne as $key => $value) {
				echo "
						<div class='marqueOne'>
			                      <label>".$value['nom_spons']."</label>
			                      <span class='delMarque' onclick='SupSpons(".$value['id_spons'].");'><i class='typcn typcn-delete-outline'></i></span><br><hr>
			                      <img src='content/data/image/sponsor/".$value['logo_spons']."' height='80' width='80'><br>
			                      <small class>".$value['Province_spons']." | ".$value['Adresse_spons']."</small><hr>
			                      <h4>Contact : ".$value['contactSpons']."</h4>
						</div>
				";
			}

		}else{
			echo "Liste vide";
		}
	}

	if (isset($_POST['SupSpons'])) {
		session_start();
		if (isset($_SESSION['id_admin'])) {
			include '../../modele/sponsors/modele.sponsors.php';
			include '../../modele/activite/modele.activite.php';
			include '../../config/connexion.php';
			$modeleActivite = new ActivityAdmin();
			$modele = new ModeleSpons();

			$SupSpons = $_POST['SupSpons'];
			$idAdmin = $_SESSION['id_admin'];

			$modele->DelSpons($SupSpons);

			$typePub = "SPONSORS";
			$descAct = "SUPPRESSION";
		 	$modeleActivite->AddActivite($idAdmin,$typePub,$descAct);

			echo "ok";
		}else{
			echo "Erreur de l'action";
		}
	}

	if (isset($_POST['RecupSponsListeCl'])) {
		include '../../modele/sponsors/modele.sponsors.php';
		include '../../config/connexion.php';
		$modele = new ModeleSpons();

		$donne = $modele->GetSpons();

		if ($donne) {
					echo "
				        <div class='py-2 px-4 text-white mb-3' style='background:#344198;'>
	        				<strong class='small text-uppercase font-weight-bold'>Sponsors</strong>
	        			</div>
	        			<ul class='list-unstyled small text-muted pl-lg-4 font-weight-normal'>
					";
			foreach ($donne as $key => $value) {
				if (isset($value['contactSpons']) && $value['contactSpons']!=NULL || $value['contactSpons']!="") {
					$contacter = "<a href='tel:".$value['contactSpons']."' target='blank'><button class='btn btn-primary' style='width: 100%;'>Contacter</button></a>";
				}else{
					$contacter = "";
				}
					echo "
						 <li class='mb-2 cliclHere'>
						 	<div class='d-flex'>
			                  	<a data-toggle='collapse' href='#detaille".$value['id_spons']."'>".$value['nom_spons']."</a><br>
		                  	</div>
		                  	<div class='collapse' id='detaille".$value['id_spons']."'>
		                  		<hr>
		                  		<div class='col' style='text-align:center;'>
									<small class>".$value['Province_spons']." | ".$value['Adresse_spons']."</small><br>
									<img src='content/data/image/sponsor/".$value['logo_spons']."' width='70' height='70' />
								</div>
								".$contacter."
		                  	</div>
		                </li>
					";
			}
					echo "
							</ul>
					";
		}
	}











?>