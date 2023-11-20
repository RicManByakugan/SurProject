<?php 
	header('content-type:text/html;charset=utf-8');
	if (isset($_POST['envoiePub'])) {
			include '../../modele/publication/modele.publication.php';
			include '../../modele/activite/modele.activite.php';
			include '../../config/connexion.php';
			$modeleActivite = new ActivityAdmin();
			$modele = new ModelePub();
					
			$idamin = $_POST['idamin'];
			$typePub = $_POST['typePub'];
			$catPub = $_POST['catPub'];
			$GenrePub = $_POST['GenrePub'];
			$nomPub = $_POST['nomPub'];
			$descPub = $_POST['descPub'];
			$prixPub = $_POST['prixPub'];
			$PrioPub = $_POST['PrioPub'];
					
			$img1Pub = $_FILES['img1Pub']['name'];
			$img2Pub = $_FILES['img2Pub']['name'];
			$img3Pub = $_FILES['img3Pub']['name'];
			$img4Pub = $_FILES['img4Pub']['name'];

			$nomFile1 = "";
			$nomFile2 = "";
			$nomFile3 = "";
			$nomFile4 = "";

 			isset($_POST['Antananarivo']) ? $one = "OK" : $one = "NO";
 			isset($_POST['Antsiranana']) ? $two = "OK" : $two = "NO";
 			isset($_POST['Fianarantsoa']) ? $three = "OK" : $three = "NO";
 			isset($_POST['Mahajanga']) ? $four = "OK" : $four = "NO";
 			isset($_POST['Toamasina']) ? $five = "OK" : $five = "NO";
 			isset($_POST['Toliara']) ? $six = "OK" : $six = "NO";


			if ($typePub == "FORMATION") {
					$typeType = 'AjoutPublicationFor';
					$scriptokok = "EnvoieOKF()";
			}
			if ($typePub == "PRODUIT") {
					$typeType = 'AjoutPublication';
					$scriptokok = "EnvoieOKP()";
			}
			if ($typePub == "SERVICE") {
					$typeType = 'AjoutPublicationSer';
					$scriptokok = "EnvoieOKS()";
			}


			if (!empty($img1Pub)) {

					$fileInfo = pathinfo($_FILES['img1Pub']['name']);
					$ext = $fileInfo['extension'];
					$nomFile1 = rand().time().'surimage.'.$ext;
					$target = "../../content/data/image/publication/".$nomFile1;
					
					 	if (file_exists($target) && !empty($img1Pub)) {
					 			$target = rand().$target;
								if (move_uploaded_file($_FILES['img1Pub']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}else{
					 			if (move_uploaded_file($_FILES['img1Pub']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}
			}

			if (!empty($img2Pub)) {
					$fileInfo = pathinfo($_FILES['img2Pub']['name']);
					$ext = $fileInfo['extension'];
					$nomFile2 = rand().time().'surimage.'.$ext;
					$target = "../../content/data/image/publication/".$nomFile2;
					
					 	if (file_exists($target) && !empty($img2Pub)) {
					 			$target = rand().$target;
								if (move_uploaded_file($_FILES['img2Pub']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}else{
					 			if (move_uploaded_file($_FILES['img2Pub']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}
			}

			if (!empty($img3Pub)) {
					$fileInfo = pathinfo($_FILES['img3Pub']['name']);
					$ext = $fileInfo['extension'];
					$nomFile3 = rand().time().'surimage.'.$ext;
					$target = "../../content/data/image/publication/".$nomFile3;
					
					 	if (file_exists($target) && !empty($img3Pub)) {
					 			$target = rand().$target;
								if (move_uploaded_file($_FILES['img3Pub']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}else{
					 			if (move_uploaded_file($_FILES['img3Pub']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}
			}
			if (!empty($img4Pub)) {
					$fileInfo = pathinfo($_FILES['img4Pub']['name']);
					$ext = $fileInfo['extension'];
					$nomFile4 = rand().time().'surimage.'.$ext;
					$target = "../../content/data/image/publication/".$nomFile4;
					
					 	if (file_exists($target) && !empty($img4Pub)) {
					 			$target = rand().$target;
								if (move_uploaded_file($_FILES['img4Pub']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}else{
					 			if (move_uploaded_file($_FILES['img4Pub']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}
			}

	 		$modele->AddPublication($idamin,$typePub,$catPub,$nomPub,$GenrePub,$PrioPub,$descPub,$prixPub,$nomFile1,$nomFile2,$nomFile3,$nomFile4);
	 		
	 		$donneMax = $modele->GetLastPost();
	 		$modele->AddDispo($donneMax['idMax'],$one,$two,$three,$four,$five,$six);
	 		
	 		$descAct = "AJOUT";
	 		$modeleActivite->AddActivite($idamin,$typePub,$descAct);

// echo "OK";

			var_dump($descPub);
	 		echo htmlspecialchars_decode($descPub);


?>
		 <script>
		 	window.top.window.ResetForm('<?php echo $typeType ?>');
		 	window.top.window.<?php echo $scriptokok ?>;
		 </script>
 <?php 

		}

 		if (isset($_POST['modifPubSub'])) {
 			include '../../modele/publication/modele.publication.php';
			include '../../modele/activite/modele.activite.php';
			include '../../config/connexion.php';
			$modeleActivite = new ActivityAdmin();
			$modele = new ModelePub();

			$idPubModif = $_POST['idPubModif'];
			$catModif = $_POST['catModif'];
			$GenreModif = $_POST['GenreModif'];
			$nameModif = $_POST['nameModif'];
			$typa = $_POST['typa'];
			$descModif = $_POST['descModif'];
			$prixModif = $_POST['prixModif'];
			$PrioModif = $_POST['PrioModif'];
			
			$idAdmin = $_POST['userActAdmin'];
			
			$imgModif1 = $_FILES['imgModif1']['name'];
			$imgModif2 = $_FILES['imgModif2']['name'];
			$imgModif3 = $_FILES['imgModif3']['name'];
			$imgModif4 = $_FILES['imgModif4']['name'];

			$nomFile1 = "";
			$nomFile2 = "";
			$nomFile3 = "";
			$nomFile4 = "";

			isset($_POST['AntananarivoMo']) ? $one = "OK" : $one = "NO";
 			isset($_POST['AntsirananaMo']) ? $two = "OK" : $two = "NO";
 			isset($_POST['FianarantsoaMo']) ? $three = "OK" : $three = "NO";
 			isset($_POST['MahajangaMo']) ? $four = "OK" : $four = "NO";
 			isset($_POST['ToamasinaMo']) ? $five = "OK" : $five = "NO";
 			isset($_POST['ToliaraMo']) ? $six = "OK" : $six = "NO";


	 		if ($typa=="FORMATION") {
	 			$valType = "ModifPublicationFormation";
	 			$displayFo = "modifUForModifFor";
	 			$reussie = "ModifOKF()";
	 		}
	 		if ($typa=="SERVICE") {
	 			$valType = "ModifPublicationService";
	 			$displayFo = "modifUserModifSer";
	 			$reussie = "ModifOKS()";
	 		}
	 		if ($typa=="PRODUIT") {
	 			$valType = "ModifPublication";
	 			$displayFo = "modifUserModif";
	 			$reussie = "ModifOKP()";
	 		}


	 		if (!empty($imgModif1)) {
					$fileInfo = pathinfo($_FILES['imgModif1']['name']);
					$ext = $fileInfo['extension'];
					$nomFile1 = rand().time().'surimage.'.$ext;
					$target = "../../content/data/image/publication/".$nomFile1;
					
					 	if (file_exists($target) && !empty($imgModif1)) {
					 			$target = rand().$target;
								if (move_uploaded_file($_FILES['imgModif1']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}else{
					 			if (move_uploaded_file($_FILES['imgModif1']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}
			}

			if (!empty($imgModif2)) {
					$fileInfo = pathinfo($_FILES['imgModif2']['name']);
					$ext = $fileInfo['extension'];
					$nomFile2 = rand().time().'surimage.'.$ext;
					$target = "../../content/data/image/publication/".$nomFile2;
					
					 	if (file_exists($target) && !empty($imgModif2)) {
					 			$target = rand().$target;
								if (move_uploaded_file($_FILES['imgModif2']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}else{
					 			if (move_uploaded_file($_FILES['imgModif2']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}
			}

			if (!empty($imgModif3)) {
					$fileInfo = pathinfo($_FILES['imgModif3']['name']);
					$ext = $fileInfo['extension'];
					$nomFile3 = rand().time().'surimage.'.$ext;
					$target = "../../content/data/image/publication/".$nomFile3;
					
					 	if (file_exists($target) && !empty($imgModif3)) {
					 			$target = rand().$target;
								if (move_uploaded_file($_FILES['imgModif3']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}else{
					 			if (move_uploaded_file($_FILES['imgModif3']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}
			}

			if (!empty($imgModif4)) {
					$fileInfo = pathinfo($_FILES['imgModif4']['name']);
					$ext = $fileInfo['extension'];
					$nomFile4 = rand().time().'surimage.'.$ext;
					$target = "../../content/data/image/publication/".$nomFile4;
					
					 	if (file_exists($target) && !empty($imgModif4)) {
					 			$target = rand().$target;
								if (move_uploaded_file($_FILES['imgModif4']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}else{
					 			if (move_uploaded_file($_FILES['imgModif4']['tmp_name'], $target)) {
									$errora = NULL;
								}
					 	}
			}

			$modele->MAJPUB($idPubModif,$catModif,$nameModif,$GenreModif,$PrioModif,$descModif,$prixModif,$nomFile1,$nomFile2,$nomFile3,$nomFile4);

	 		$modele->MAJPUBDispo($idPubModif,$one,$two,$three,$four,$five,$six);

	 		$descAct = "MODIFICATION";
	 		$modeleActivite->AddActivite($idAdmin,$typa,$descAct);
?>
		 <script>
		 	window.top.window.ResetForm('<?php echo $valType; ?>');
		 	window.top.window.<?php echo $reussie; ?>;
		 	window.top.window.ModifForm('<?php echo $displayFo; ?>');
		 </script>
 <?php 
		 }


 		
 		if (isset($_POST['RecupDonnePubType'])) {
 			include '../../modele/publication/modele.publication.php';
			include '../../config/connexion.php';
			include '../../modele/sur/modele.sur.php';
			$modeleSur = new SurModele();
			$sur = $modeleSur->GetSur();
			$modele = new ModelePub();
			$type = $_POST['TypePost'];

			if ($type == "PRODUIT") {
				$donne1 = $modele->GetAllPost32("PRODUIT");
				$select = "
					<select class='form-control' onchange='RecupAllPostProduit(this.value);'>
						<option></option>
						<option value='Tout'>Tout</option>
						<option value='HIGHTECH'>High-Tech</option>
						<option value='VETEMENT'>Vêtement et chaussures</option>
						<option value='AGROALIMENTAIRE'>Agro-alimentaires</option>
						<option value='JOUER'>Jouer</option>
						<option value='ACCESSOIRE'>Accessoire et autres</option>
					</select>
				";
			}
			elseif ($type == "FORMATION") {
				$donne1 = $modele->GetAllPost32("FORMATION");
				$select = "
					<select class='form-control' onchange='RecupAllPostFormation(this.value);'>
						<option></option>
						<option value='Tout'>Tout</option>
						<option value='LANGUE'>Langue</option>
						<option value='INFORMATIQUE'>Informatique</option>
						<option value='MECANIQUE'>Mécanique Automobile</option>
					</select>
				";
			}
			elseif ($type == "SERVICE") {
				$donne1 = $modele->GetAllPost32("SERVICE");
				$select = "
					<select class='form-control' onchange='RecupAllPostService(this.value);'>
						<option></option>
						<option value='Tout'>Tout</option>
						<option value='TRANSPORT'>Transport</option>
						<option value='EVENTS'>Evenementiel</option>
					</select>
				";
			}
			else{
				$donne1 = NULL;
				$select = "";
			}

			if ($donne1) {
				echo "
					  <div>
					    <section>
					          <header>
						        <!-- <nav class='selectChange'>".$select."</nav> -->
					            <p class='small text-muted small text-uppercase mb-1'>".$type." SUR DISPONIBLE A TOUS MOMENT</p>
					            <h4 class='h6 text-uppercase mb-4'>".$type."S</h4>
					          </header>
			          			<div class='row'>
				";
					foreach ($donne1 as $key => $value) {
						if ($value['img1_pub']!=NULL || $value['img1_pub']!="") {
							$img = "<img src='content/data/image/publication/".$value['img1_pub']."' class='imgSur'/>";
						}else{
							$img = "<img src='content/data/image/logo.png' class='imgSur'/>";
						}

						$dateNowA = date("Y-m-d");
						if ($value['prix_prom'] == NULL && $value['date_com'] == NULL || $value['date_com'] < $dateNowA) {
								$prixreel = $value['prix_pub'];
								$promAfficheClient = "";
						}else{
							$prixreel = $value['prix_pub'] - (($value['prix_pub'] * $value['prix_prom']) / 100);
							$promAfficheClient = "<div class='p-2 badge text-white badge-warning float-right'> -".$value['prix_prom']."% </div>";
						}
						echo "
							 <div class='col-lg-4 col-sm-6'>
				              <div class='product text-center cardSur animecardSur'>
				              ".$promAfficheClient."
				                <div class='position-relative mb-3'>
				                  <div class='badge badge-primary baddab'></div><a style='border:1px;height: 250px;' class='d-block'>".$img."</a>
				                  <div class='product-overlay'>
				                    <ul class='mb-0 list-inline'>
				                      <li class='list-inline-item m-0 p-0' onclick=\"AffichePub(".$value['id_pub'].",'".$value['type_pub']."');ScrollToTo('donnePublication');\"><button class='btn btn-primary btn-sm'><a style='color:#fff;'>DETAILLE <i class='fa fa-eye'></i></a></button></li>
				                      <li class='list-inline-item m-0 p-0'><button class='btn btn-primary btn-sm'><a data-toggle='modal' data-target='#AppelSur' style='color:#fff;'>CONTACTER <i class='fa fa-phone'></i></a></button></li>
				                    </ul>
				                  </div>
				                </div>
				                <h4>".$value['titre_pub']."</h4><hr>
				                <p class='small text-muted'>Prix : ".number_format($prixreel)." Ar</p>
				                <hr>
				              </div>
				            </div>
						";
			 		}	
				echo "
							</div>
						</section>
					</div>
				";
			}

 		}

 		if (isset($_POST['RecupDonnePubTypeLeftCat'])) {
 			$type = $_POST['TypePost'];
 			$categorie = $_POST['RecupDonnePubTypeLeftCat'];
 			
 			if ($type == "PRODUIT") {
 				$cat = "
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostProduit('Tout');\"><a class='reset-anchor'>Tout</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostProduit('HIGHTECH');\"><a class='reset-anchor'>High-Tech</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostProduit('VETEMENT');\"><a class='reset-anchor'>Vêtement et chaussures</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostProduit('AGROALIMENTAIRE');\"><a class='reset-anchor'>Agro-alimentaires</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostProduit('JOUER');\"><a class='reset-anchor'>Jouer</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostProduit('ACCESSOIRE');\"><a class='reset-anchor'>Accessoire et autres</a></li>
 				";
 			}elseif ($type == "FORMATION") {
 				$cat = "
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostFormation('Tout');\"><a class='reset-anchor'>Tout</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostFormation('LANGUE');\"><a class='reset-anchor'>Langue</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostFormation('INFORMATIQUE');\"><a class='reset-anchor'>Informatique</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostFormation('MECANIQUE');\"><a class='reset-anchor'>Mécanique Automobile</a></li>
 				";
 			}elseif ($type == "SERVICE") {
 				$cat = "
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostService('Tout');\"><a class='reset-anchor'>Tout</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostService('TRANSPORT');\"><a class='reset-anchor'>Transport</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostService('EVENTS');\"><a class='reset-anchor'>Evenementiel</a></li>
 				";
 			}


 			echo "
				<div class='py-2 px-4 text-white mb-3' style='background:#344198;'>
				    <strong class='small text-uppercase font-weight-bold'>Categorie</strong>
				</div>

				<ul class='list-unstyled small text-muted pl-lg-4 font-weight-normal'>
					".$cat."
				</ul>

				
				<div class='py-2 px-4 text-white mb-3' style='background:#344198;'>
				    <strong class='small text-uppercase font-weight-bold'>GENRE ".$categorie."</strong>
				</div>
				<ul class='list-unstyled small text-muted pl-lg-4 font-weight-normal'>
					<li class='mb-2 cliclHere' onclick=\"RecupAllPostTypeGenreCat('".$type."','".$categorie."','Tout');\"><a class='reset-anchor'>Pour tout le monde</a></li>
					<li class='mb-2 cliclHere' onclick=\"RecupAllPostTypeGenreCat('".$type."','".$categorie."','Homme');\"><a class='reset-anchor'>Homme</a></li>
					<li class='mb-2 cliclHere' onclick=\"RecupAllPostTypeGenreCat('".$type."','".$categorie."','Femme');\"><a class='reset-anchor'>Femme</a></li>
					<li class='mb-2 cliclHere' onclick=\"RecupAllPostTypeGenreCat('".$type."','".$categorie."','Jeune Homme');\"><a class='reset-anchor'>Jeune Homme</a></li>
					<li class='mb-2 cliclHere' onclick=\"RecupAllPostTypeGenreCat('".$type."','".$categorie."','Jeune Femme');\"><a class='reset-anchor'>Jeune Femme</a></li>
					<li class='mb-2 cliclHere' onclick=\"RecupAllPostTypeGenreCat('".$type."','".$categorie."','Ado');\"><a class='reset-anchor'>Ado</a></li>
					<li class='mb-2 cliclHere' onclick=\"RecupAllPostTypeGenreCat('".$type."','".$categorie."','Enfant');\"><a class='reset-anchor'>Enfant</a></li>
				</ul>
 			";

 		}

 		if (isset($_POST['RecupDonnePubTypeLeft'])) {
 		
 			$type = $_POST['TypePost'];

 			if ($type == "PRODUIT") {
 				$cat = "
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostProduit('Tout');\"><a class='reset-anchor'>Tout</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostProduit('HIGHTECH');\"><a class='reset-anchor'>High-Tech</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostProduit('VETEMENT');\"><a class='reset-anchor'>Vêtement et chaussures</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostProduit('AGROALIMENTAIRE');\"><a class='reset-anchor'>Agro-alimentaires</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostProduit('JOUER');\"><a class='reset-anchor'>Jouer</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostProduit('ACCESSOIRE');\"><a class='reset-anchor'>Accessoire et autres</a></li>
 				";
 			}elseif ($type == "FORMATION") {
 				$cat = "
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostFormation('Tout');\"><a class='reset-anchor'>Tout</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostFormation('LANGUE');\"><a class='reset-anchor'>Langue</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostFormation('INFORMATIQUE');\"><a class='reset-anchor'>Informatique</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostFormation('MECANIQUE');\"><a class='reset-anchor'>Mécanique Automobile</a></li>
 				";
 			}elseif ($type == "SERVICE") {
 				$cat = "
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostService('Tout');\"><a class='reset-anchor'>Tout</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostService('TRANSPORT');\"><a class='reset-anchor'>Transport</a></li>
 					<li class='mb-2 cliclHere' onclick=\"RecupAllPostService('EVENTS');\"><a class='reset-anchor'>Evenementiel</a></li>
 				";
 			}


 			echo "
				<div class='py-2 px-4 text-white mb-3' style='background:#344198;'>
				    <strong class='small text-uppercase font-weight-bold'>Categorie</strong>
				</div>

				<ul class='list-unstyled small text-muted pl-lg-4 font-weight-normal'>
					".$cat."
				</ul>

				<div class='py-2 px-4 text-white mb-3' style='background:#344198;'>
				    <strong class='small text-uppercase font-weight-bold'>GENRE</strong>
				</div>
				<ul class='list-unstyled small text-muted pl-lg-4 font-weight-normal'>
					<li class='mb-2 cliclHere' onclick=\"RecupAllPostTypeGenre('".$type."','Tout');\"><a class='reset-anchor'>Pour tout le monde</a></li>
					<li class='mb-2 cliclHere' onclick=\"RecupAllPostTypeGenre('".$type."','Homme');\"><a class='reset-anchor'>Homme</a></li>
					<li class='mb-2 cliclHere' onclick=\"RecupAllPostTypeGenre('".$type."','Femme');\"><a class='reset-anchor'>Femme</a></li>
					<li class='mb-2 cliclHere' onclick=\"RecupAllPostTypeGenre('".$type."','Jeune Homme');\"><a class='reset-anchor'>Jeune Homme</a></li>
					<li class='mb-2 cliclHere' onclick=\"RecupAllPostTypeGenre('".$type."','Jeune Femme');\"><a class='reset-anchor'>Jeune Femme</a></li>
					<li class='mb-2 cliclHere' onclick=\"RecupAllPostTypeGenre('".$type."','Ado');\"><a class='reset-anchor'>Ado</a></li>
					<li class='mb-2 cliclHere' onclick=\"RecupAllPostTypeGenre('".$type."','Enfant');\"><a class='reset-anchor'>Enfant</a></li>
				</ul>
 			";
 		}

 		if (isset($_POST['RecupDonneTypePubGenre'])) {
 			include '../../modele/publication/modele.publication.php';
			include '../../config/connexion.php';
			include '../../modele/sur/modele.sur.php';
 			$modeleSur = new SurModele();
			$sur = $modeleSur->GetSur();
			$modele = new ModelePub();

			$type = $_POST['RecupDonneTypePubGenre'];
			$genre = $_POST['genre'];

			if ($type == "PRODUIT") {
				$donne1 = $modele->GetAllPostGenre("PRODUIT",$genre);
			}
			elseif ($type == "FORMATION") {
				$donne1 = $modele->GetAllPostGenre("FORMATION",$genre);
			}
			elseif ($type == "SERVICE") {
				$donne1 = $modele->GetAllPostGenre("SERVICE",$genre);
			}
			else{
				$donne1 = NULL;
			}

			echo "
				<div>
					    <section>
					          <header>
					            <p class='small text-muted small text-uppercase mb-1'>".$type." SUR DISPONIBLE A TOUS MOMENT</p>
					            <h4 class='h6 text-uppercase mb-4'>".$type."S POUR : ".$genre."</h4>
					          </header>
			";

			if ($donne1) {
				echo "
			          			<div class='row'>
				";
					foreach ($donne1 as $key => $value) {
						if ($value['img1_pub']!=NULL || $value['img1_pub']!="") {
							$img = "<img src='content/data/image/publication/".$value['img1_pub']."' class='imgSur'/>";
						}else{
							$img = "<img src='content/data/image/logo.png' class='imgSur'/>";
						}
						$dateNowA = date("Y-m-d");
						if ($value['prix_prom'] == NULL && $value['date_com'] == NULL || $value['date_com'] < $dateNowA) {
								$prixreel = $value['prix_pub'];
								$promAfficheClient = "";
						}else{
							$prixreel = $value['prix_pub'] - (($value['prix_pub'] * $value['prix_prom']) / 100);
							$promAfficheClient = "<div class='p-2 badge text-white badge-warning float-right'> -".$value['prix_prom']."% </div>";
						}
						echo "
							 <div class='col-lg-4 col-sm-6'>
				              <div class='product text-center cardSur animecardSur'>
							  ".$promAfficheClient."
				                <div class='position-relative mb-3'>
				                  <div class='badge badge-primary baddab'></div><a style='border:1px;height: 250px;' class='d-block'>".$img."</a>
				                  <div class='product-overlay'>
				                    <ul class='mb-0 list-inline'>
				                      <li class='list-inline-item m-0 p-0' onclick=\"AffichePub(".$value['id_pub'].",'".$value['type_pub']."');ScrollToTo('donnePublication');\"><button class='btn btn-primary btn-sm'><a style='color:#fff;'>DETAILLE <i class='fa fa-eye'></i></a></button></li>
				                      <li class='list-inline-item m-0 p-0'><button class='btn btn-primary btn-sm'><a data-toggle='modal' data-target='#AppelSur' style='color:#fff;'>CONTACTER <i class='fa fa-phone'></i></a></button></li>
				                    </ul>
				                  </div>
				                </div>
				                <h4>".$value['titre_pub']."</h4><hr>
				                <p class='small text-muted'>Prix : ".number_format($prixreel)." Ar</p>
				                <hr>
				              </div>
				            </div>
						";
			 		}	
				echo "
							</div>
				";
			}else{
				echo "
					<hr>
					<h4 align='center' class='h6 text-uppercase'>ARRIVAGE NON DISPONIBLE POUR : ".$genre."</h4>
				";
			}
			echo "
						</section>
					</div>
			";
 		}
 		if (isset($_POST['RecupDonneTypePubGenreCat'])) {
 			include '../../modele/publication/modele.publication.php';
			include '../../config/connexion.php';
			include '../../modele/sur/modele.sur.php';
 			$modeleSur = new SurModele();
			$sur = $modeleSur->GetSur();
			$modele = new ModelePub();

			$type = $_POST['RecupDonneTypePubGenreCat'];
			$genre = $_POST['genre'];
			$cat = $_POST['cat'];

			if ($type == "PRODUIT") {
				$donne1 = $modele->GetAllPostGenreCat("PRODUIT",$genre,$cat);
			}
			elseif ($type == "FORMATION") {
				$donne1 = $modele->GetAllPostGenreCat("FORMATION",$genre,$cat);
			}
			elseif ($type == "SERVICE") {
				$donne1 = $modele->GetAllPostGenreCat("SERVICE",$genre,$cat);
			}
			else{
				$donne1 = NULL;
			}

			echo "
				<div>
					    <section>
					          <header>
					            <p class='small text-muted small text-uppercase mb-1'>".$type." SUR DISPONIBLE A TOUS MOMENT CATEGORIE : ".$cat."</p>
					            <h4 class='h6 text-uppercase mb-4'>".$type."S de ".$cat." POUR : ".$genre."</h4>
					          </header>
			";

			if ($donne1) {
				echo "
			          			<div class='row'>
				";
					foreach ($donne1 as $key => $value) {
						if ($value['img1_pub']!=NULL || $value['img1_pub']!="") {
							$img = "<img src='content/data/image/publication/".$value['img1_pub']."' class='imgSur'/>";
						}else{
							$img = "<img src='content/data/image/logo.png' class='imgSur'/>";
						}
						$dateNowA = date("Y-m-d");
						if ($value['prix_prom'] == NULL && $value['date_com'] == NULL || $value['date_com'] < $dateNowA) {
							$prixreel = $value['prix_pub'];
							$promAfficheClient = "";
						}else{
							$prixreel = $value['prix_pub'] - (($value['prix_pub'] * $value['prix_prom']) / 100);
							$promAfficheClient = "<div class='p-2 badge text-white badge-warning float-right'> -".$value['prix_prom']."% </div>";
						}
						echo "
							 <div class='col-lg-4 col-sm-6'>
				              <div class='product text-center cardSur animecardSur'>
							  ".$promAfficheClient."
				                <div class='position-relative mb-3'>
				                  <div class='badge badge-primary baddab'></div><a style='border:1px;height: 250px;' class='d-block'>".$img."</a>
				                  <div class='product-overlay'>
				                    <ul class='mb-0 list-inline'>
				                      <li class='list-inline-item m-0 p-0' onclick=\"AffichePub(".$value['id_pub'].",'".$value['type_pub']."');ScrollToTo('donnePublication');\"><button class='btn btn-primary btn-sm'><a style='color:#fff;'>DETAILLE <i class='fa fa-eye'></i></a></button></li>
				                      <li class='list-inline-item m-0 p-0'><button class='btn btn-primary btn-sm'><a data-toggle='modal' data-target='#AppelSur' style='color:#fff;'>CONTACTER <i class='fa fa-phone'></i></a></button></li>
				                    </ul>
				                  </div>
				                </div>
				                <h4>".$value['titre_pub']."</h4><hr>
				                <p class='small text-muted'>Prix : ".number_format($prixreel)." Ar</p>
				                <hr>
				              </div>
				            </div>
						";
			 		}	
				echo "
							</div>
				";
			}else{
				echo "
					<hr>
					<h4 align='center' class='h6 text-uppercase'>ARRIVAGE NON DISPONIBLE POUR : ".$genre."</h4>
				";
			}
			echo "
						</section>
					</div>
			";
 		}



 		if (isset($_POST['RecupDonnePub'])) {
 			include '../../modele/publication/modele.publication.php';
			include '../../config/connexion.php';
			include '../../modele/sur/modele.sur.php';
			$modeleSur = new SurModele();
			$sur = $modeleSur->GetSur();
			$modele = new ModelePub();

			$donne1 = $modele->GetAllPost3("PRODUIT");
			$scriptP = "RecupAllPostType('PRODUIT')";
	 		$scriptF = "RecupAllPostType('FORMATION')";
	 		$scriptS = "RecupAllPostType('SERVICE')";

			if ($donne1) {
				echo "
					  <div>
					    <section>
						    	<!-- <div class='py-2 px-4 text-white mb-3' style='background:#344198;'>
			        				<strong class='small text-uppercase font-weight-bold'>Sponsors</strong>
			        			</div> -->
					          <header>
					            <p class='small text-muted small text-uppercase mb-1'>PRODUIT SUR DISPONIBLE A TOUS MOMENT</p>
					            <h4 class='h6 text-uppercase mb-4'>PRODUITS</h4>
					          </header>
			          			<div class='row'>
				";
					foreach ($donne1 as $key => $value) {
						if ($value['img1_pub']!=NULL || $value['img1_pub']!="") {
							$img = "<img src='content/data/image/publication/".$value['img1_pub']."' class='imgSur'/>";
						}else{
							$img = "<img src='content/data/image/logo.png' class='imgSur'/>";
						}
						$dateNowA = date("Y-m-d");
						if ($value['prix_prom'] == NULL && $value['date_com'] == NULL || $value['date_com'] < $dateNowA) {
								$prixreel = $value['prix_pub'];
								$promAfficheClient = "";
						}else{
							$prixreel = $value['prix_pub'] - (($value['prix_pub'] * $value['prix_prom']) / 100);
							$promAfficheClient = "<div class='p-2 badge text-white badge-warning float-right'> -".$value['prix_prom']."% </div>";
						}
						echo "
							 <div class='col-lg-4 col-sm-6'>
				              <div class='product text-center cardSur animecardSur'>
							  ".$promAfficheClient."
				                <div class='position-relative mb-3'>
				                  <div class='badge badge-primary baddab'></div><a style='border:1px;height: 250px;' class='d-block'>".$img."</a>
				                  <div class='product-overlay'>
				                    <ul class='mb-0 list-inline'>
				                      <li class='list-inline-item m-0 p-0' onclick=\"ScrollToTo('donnePublication');AffichePub(".$value['id_pub'].",'PRODUIT');\"><button class='btn btn-primary btn-sm'><a style='color:#fff;'>DETAILLE <i class='fa fa-eye'></i></a></button></li>
				                      <li class='list-inline-item m-0 p-0'><button class='btn btn-primary btn-sm'><a data-toggle='modal' data-target='#AppelSur' style='color:#fff;'>CONTACTER <i class='fa fa-phone'></i></a></button></li>
				                    </ul>
				                  </div>
				                </div>
				                <h4>".$value['titre_pub']."</h4><hr>
				                <p class='small text-muted'>Prix : ".number_format($prixreel)." Ar</p>
				                <hr>
				              </div>
				            </div>
						";
			 		}
		 		echo "
							</div>
							<nav aria-label='navigation container'>
					        	<ul class='pagination justify-content-center justify-content-lg-end'>
					                <li class='page-item cliclHere' onclick=\"".$scriptP."\"><a class='page-link' aria-label='Next'><span aria-hidden='true'><i class='fa fa-plus-circle'></i> PLUS DE PRODUIT</span></a></li>
					            </ul>
					        </nav>
				 ";
	 		}
			$donne2 = $modele->GetAllPost3("SERVICE");
			if ($donne2) {
				echo "
					<br>
							<header>
					            <p class='small text-muted small text-uppercase mb-1'>SERVICE SUR DISPONIBLE A TOUS MOMENT</p>
					            <h4 class='h6 text-uppercase mb-4'>SERVICES</h4>
					          </header>
			          			<div class='row'>
				";
				foreach ($donne2 as $key => $value) {
					if ($value['img1_pub']!=NULL || $value['img1_pub']!="") {
						$img = "<img src='content/data/image/publication/".$value['img1_pub']."' class='imgSur' />";
					}else{
						$img = "<img src='content/data/image/logo.png' class='imgSur'/>";
					}
					$dateNowA = date("Y-m-d");
					if ($value['prix_prom'] == NULL && $value['date_com'] == NULL || $value['date_com'] < $dateNowA) {
							$prixreel = $value['prix_pub'];
							$promAfficheClient = "";
					}else{
						$prixreel = $value['prix_pub'] - (($value['prix_pub'] * $value['prix_prom']) / 100);
						$promAfficheClient = "<div class='p-2 badge text-white badge-warning float-right'> -".$value['prix_prom']."% </div>";
					}

		 			echo "
		 				 <div class='col-lg-4 col-sm-6'>
			              <div class='product text-center cardSur animecardSur'>
		 				 	".$promAfficheClient."
			                <div class='position-relative mb-3'>
			                  <div class='badge badge-primary baddab'></div><a style='border:1px;height: 250px;' class='d-block'>".$img."</a>
			                  <div class='product-overlay'>
			                    <ul class='mb-0 list-inline'>
			                       <li class='list-inline-item m-0 p-0' onclick=\"ScrollToTo('donnePublication');AffichePub(".$value['id_pub'].",'SERVICE');\"><button class='btn btn-primary btn-sm'><a style='color:#fff;'>DETAILLE <i class='fa fa-eye'></i></a></button></li>
				                    <li class='list-inline-item m-0 p-0'><button class='btn btn-primary btn-sm'><a data-toggle='modal' data-target='#AppelSur' style='color:#fff;'>CONTACTER <i class='fa fa-phone'></i></a></button></li>
			                    </ul>
			                  </div>
			                </div>
			                <h4>".$value['titre_pub']."</h4><hr>
			                <p class='small text-muted'>Prix : ".number_format($prixreel)." Ar</p>
			                <hr>
			              </div>
			            </div>
		 			";
		 		}
			echo "
					</div>
					<nav aria-label='navigation container'>
				        	<ul class='pagination justify-content-center justify-content-lg-end'>
				                <li class='page-item cliclHere' onclick=\"".$scriptS."\"><a class='page-link' aria-label='Next'><span aria-hidden='true'><i class='fa fa-plus-circle'></i> PLUS DE SERVICE</span></a></li>
				            </ul>
				        </nav>
			";
	 		}

			$donne3 = $modele->GetAllPost3("FORMATION");
			if ($donne3) {
					echo "
						<br>
							<header>
					            <p class='small text-muted small text-uppercase mb-1'>FORMATION SUR DISPONIBLE A TOUS MOMENT</p>
					            <h4 class='h6 text-uppercase mb-4'>FORMATIONS</h4>
					          </header>
			          			<div class='row'>
					";
					foreach ($donne3 as $key => $value) {
						if ($value['img1_pub']!=NULL || $value['img1_pub']!="") {
							$img = "<img src='content/data/image/publication/".$value['img1_pub']."' class='imgSur'/>";
						}else{
							$img = "<img src='content/data/image/logo.png' class='imgSur'/>";
						}
						$dateNowA = date("Y-m-d");
						if ($value['prix_prom'] == NULL && $value['date_com'] == NULL || $value['date_com'] < $dateNowA) {
								$prixreel = $value['prix_pub'];
								$promAfficheClient = "";
						}else{
							$prixreel = $value['prix_pub'] - (($value['prix_pub'] * $value['prix_prom']) / 100);
							$promAfficheClient = "<div class='p-2 badge text-white badge-warning float-right'> -".$value['prix_prom']."% </div>";
						}
			 			echo "
			 				 <div class='col-lg-4 col-sm-6'>
				              <div class='product text-center cardSur animecardSur'>
			 				  ".$promAfficheClient."
				                <div class='position-relative mb-3'>
				                  <div class='badge badge-primary baddab'></div><a style='border:1px;height: 250px;' class='d-block'>".$img."</a>
				                  <div class='product-overlay'>
				                    <ul class='mb-0 list-inline'>
				                      <li class='list-inline-item m-0 p-0' onclick=\"ScrollToTo('donnePublication');AffichePub(".$value['id_pub'].",'FORMATION');\"><button class='btn btn-primary btn-sm'><a style='color:#fff;'>DETAILLE <i class='fa fa-eye'></i></a></button></li>
				                      <li class='list-inline-item m-0 p-0'><button class='btn btn-primary btn-sm'><a data-toggle='modal' data-target='#AppelSur' style='color:#fff;'>CONTACTER <i class='fa fa-phone'></i></a></button></li>
				                    </ul>
				                  </div>
				                </div>
				                <h4>".$value['titre_pub']."</h4><hr>
				                <p class='small text-muted'>Prix : ".number_format($prixreel)." Ar</p>
				                <hr>
				              </div>
				            </div>
			 			";
			 		}
		 		echo "
							</div>
							<nav aria-label='navigation container'>
					        	<ul class='pagination justify-content-center justify-content-lg-end'>
					                <li class='page-item cliclHere' onclick=\"".$scriptF."\"><a class='page-link' aria-label='Next'><span aria-hidden='true'><i class='fa fa-plus-circle'></i> PLUS DE FORMATION</span></a></li>
					            </ul>
					        </nav>

						</section>
				    </div>
				";
	 		}
 		}


 		if (isset($_POST['RecupDonnePubProduit'])) {
 			include '../../modele/publication/modele.publication.php';
			include '../../config/connexion.php';
			include '../../modele/sur/modele.sur.php';
			$modeleSur = new SurModele();
			$sur = $modeleSur->GetSur();
			$modele = new ModelePub();

			$cat = $_POST['cat'];
			if ($cat=="Tout") {
				$donne = $modele->GetAllPost32("PRODUIT");
			}else{
				$donne = $modele->GetAllPostProduit($cat);
			}
			$select = "
					<select class='form-control' onchange='RecupAllPostProduit(this.value);'>
						<option></option>
						<option value='Tout'>Tout</option>
						<option value='HIGHTECH'>High-Tech</option>
						<option value='VETEMENT'>Vêtement et chaussures</option>
						<option value='AGROALIMENTAIRE'>Agro-alimentaires</option>
						<option value='JOUER'>Jouer</option>
						<option value='ACCESSOIRE'>Accessoire et autres</option>
					</select>
			";
			echo "
				  <div>
				    <section>
				          <header>
				          	<!-- <nav class='selectChange'>".$select."</nav>-->
				            <p class='small text-muted small text-uppercase mb-1'>PRODUIT</p>
				            <h4 class='h6 text-uppercase mb-4'>".$cat."</h4>
				          </header>
		          			<div class='container row'>
			";
			if ($donne) {
				foreach ($donne as $key => $value) {
					if ($value['img1_pub']!=NULL || $value['img1_pub']!="") {
						$img = "<img src='content/data/image/publication/".$value['img1_pub']."' class='imgSur' />";
					}else{
						$img = "<img src='content/data/image/logo.png' class='imgSur'/>";
					}
					$dateNowA = date("Y-m-d");
					if ($value['prix_prom'] == NULL && $value['date_com'] == NULL || $value['date_com'] < $dateNowA) {
							$prixreel = $value['prix_pub'];
							$promAfficheClient = "";
					}else{
						$prixreel = $value['prix_pub'] - (($value['prix_pub'] * $value['prix_prom']) / 100);
						$promAfficheClient = "<div class='p-2 badge text-white badge-warning float-right'> -".$value['prix_prom']."% </div>";
					}

		 			echo "
		 				<div class='col-lg-4 col-sm-6'>
			              <div class='product text-center cardSur animecardSur'>
		 				  ".$promAfficheClient."
			                <div class='position-relative mb-3'>
			                  <div class='badge badge-primary baddab'></div><a style='border:1px;height: 250px;' class='d-block'>".$img."</a>
			                  <div class='product-overlay'>
			                    <ul class='mb-0 list-inline'>
			                       <li class='list-inline-item m-0 p-0' onclick=\"ScrollToTo('donnePublication');AffichePub(".$value['id_pub'].",'".$value['type_pub']."');\"><button class='btn btn-primary btn-sm'><a style='color:#fff;'>DETAILLE <i class='fa fa-eye'></i></a></button></li>
				                      <li class='list-inline-item m-0 p-0'><button class='btn btn-primary btn-sm'><a data-toggle='modal' data-target='#AppelSur' style='color:#fff;'>CONTACTER <i class='fa fa-phone'></i></a></button></li>
			                    </ul>
			                  </div>
			                </div>
			                <h4>".$value['titre_pub']."</h4><hr>
			                <p class='small text-muted'>Prix : ".number_format($prixreel)." Ar</p>
			                <hr>
			              </div>
			            </div>
		 			";
		 		}
	 		}else{
	 			    echo "
		 			    <header>
	 						<p class='small text-center text-muted text-uppercase mb-1'>Arrivage en attente de publication</p>
	 					</header>
	 			    ";
	 		}
	 		echo "
						</div>
					</section>
			    </div>
			";
 		}

 		if (isset($_POST['RecupDonnePubService'])) {
 			include '../../modele/publication/modele.publication.php';
			include '../../config/connexion.php';
			include '../../modele/sur/modele.sur.php';
			$modeleSur = new SurModele();
			$modele = new ModelePub();
			$sur = $modeleSur->GetSur();

			$cat = $_POST['cat'];
			if ($cat=="Tout") {
				$donne = $modele->GetAllPost32("SERVICE");
			}else{
				$donne = $modele->GetAllPostService($cat);
			}

			$select = "
					<select class='form-control' onchange='RecupAllPostService(this.value);'>
						<option></option>
						<option value='Tout'>Tout</option>
						<option value='TRANSPORT'>Transport</option>
						<option value='EVENTS'>Evenementiel</option>
					</select>
			";
			echo "
				  <div>
				    <section>
				          <header>
				          	<!-- <nav class='selectChange'>".$select."</nav>-->
				            <p class='small text-muted small text-uppercase mb-1'>SERVICE</p>
				            <h4 class='h6 text-uppercase mb-4'>".$cat."</h4>
				          </header>
		          			<div class='container row'>
			";
			if ($donne) {
				foreach ($donne as $key => $value) {
					if ($value['img1_pub']!=NULL || $value['img1_pub']!="") {
						$img = "<img src='content/data/image/publication/".$value['img1_pub']."' class='imgSur' />";
					}else{
						$img = "<img src='content/data/image/logo.png' class='imgSur'/>";
					}
					$dateNowA = date("Y-m-d");
					if ($value['prix_prom'] == NULL && $value['date_com'] == NULL || $value['date_com'] < $dateNowA) {
							$prixreel = $value['prix_pub'];
							$promAfficheClient = "";
					}else{
						$prixreel = $value['prix_pub'] - (($value['prix_pub'] * $value['prix_prom']) / 100);
						$promAfficheClient = "<div class='p-2 badge text-white badge-warning float-right'> -".$value['prix_prom']."% </div>";
					}

		 			echo "
		 				<div class='col-lg-4 col-sm-6'>
			              <div class='product text-center cardSur animecardSur'>
		 				  ".$promAfficheClient." 
			                <div class='position-relative mb-3'>
			                  <div class='badge badge-primary baddab'></div><a style='border:1px;height: 250px;' class='d-block'>".$img."</a>
			                  <div class='product-overlay'>
			                    <ul class='mb-0 list-inline'>
			                       <li class='list-inline-item m-0 p-0' onclick=\"ScrollToTo('donnePublication');AffichePub(".$value['id_pub'].",'".$value['type_pub']."');\"><button class='btn btn-primary btn-sm'><a style='color:#fff;'>DETAILLE <i class='fa fa-eye'></i></a></button></li>
				                   <li class='list-inline-item m-0 p-0'><button class='btn btn-primary btn-sm'><a data-toggle='modal' data-target='#AppelSur' style='color:#fff;'>CONTACTER <i class='fa fa-phone'></i></a></button></li>
			                    </ul>
			                  </div>
			                </div>
			                <h4>".$value['titre_pub']."</h4><hr>
			                <p class='small text-muted'>Prix : ".number_format($prixreel)." Ar</p>
			                <hr>
			              </div>
			            </div>
		 			";
		 		}
	 		}else{
	 			    echo "
		 			    <header>
	 						<p class='small text-center text-muted small text-uppercase mb-1'>Arrivage en attente de publication</p>
	 					</header>
	 			    ";
	 		}
	 		echo "
						</div>
					</section>
			    </div>
			";
 		}

 		if (isset($_POST['RecupDonnePubFormation'])) {
 			include '../../modele/publication/modele.publication.php';
			include '../../config/connexion.php';
			include '../../modele/sur/modele.sur.php';
			$modeleSur = new SurModele();
			$modele = new ModelePub();
			$sur = $modeleSur->GetSur();

			$cat = $_POST['cat'];
			if ($cat=="Tout") {
				$donne = $modele->GetAllPost32("FORMATION");
			}else{
				$donne = $modele->GetAllPostFormation($cat);
			}
			$donne = $modele->GetAllPostFormation($cat);
			$select = "
					<select class='form-control' onchange='RecupAllPostFormation(this.value);'>
						<option></option>
						<option value='Tout'>Tout</option>
						<option value='LANGUE'>Langue</option>
						<option value='INFORMATIQUE'>Informatique</option>
						<option value='MECANIQUE'>Mécanique Automobile</option>
					</select>
			";
			echo "
					  <div>
					    <section>
					          <header>
					          	<!-- <nav class='selectChange'>".$select."</nav>-->
					            <p class='small text-muted small text-uppercase mb-1'>FORMATION</p>
					            <h4 class='h6 text-uppercase mb-4'>".$cat."</h4>
					          </header>
			          			<div class='container row'>
			";
			if ($donne) {
				foreach ($donne as $key => $value) {
					if ($value['img1_pub']!=NULL || $value['img1_pub']!="") {
						$img = "<img src='content/data/image/publication/".$value['img1_pub']."' class='imgSur' />";
					}else{
						$img = "<img src='content/data/image/logo.png' class='imgSur'/>";
					}
					$dateNowA = date("Y-m-d");
					if ($value['prix_prom'] == NULL && $value['date_com'] == NULL || $value['date_com'] < $dateNowA) {
							$prixreel = $value['prix_pub'];
							$promAfficheClient = "";
					}else{
						$prixreel = $value['prix_pub'] - (($value['prix_pub'] * $value['prix_prom']) / 100);
						$promAfficheClient = "<div class='p-2 badge text-white badge-warning float-right'> -".$value['prix_prom']."% </div>";
					}
		 			echo "
		 				<div class='col-lg-4 col-sm-6'>
			              <div class='product text-center cardSur animecardSur'>
		 				  ".$promAfficheClient."
			                <div class='position-relative mb-3'>
			                  <div class='badge badge-primary baddab'></div><a style='border:1px;height: 250px;' class='d-block'>".$img."</a>
			                  <div class='product-overlay'>
			                    <ul class='mb-0 list-inline'>
			                      <li class='list-inline-item m-0 p-0' onclick=\"ScrollToTo('donnePublication');AffichePub(".$value['id_pub'].",'".$value['type_pub']."');\"><button class='btn btn-primary btn-sm'><a style='color:#fff;'>DETAILLE <i class='fa fa-eye'></i></a></button></li>
				                   <li class='list-inline-item m-0 p-0'><button class='btn btn-primary btn-sm'><a data-toggle='modal' data-target='#AppelSur' style='color:#fff;'>CONTACTER <i class='fa fa-phone'></i></a></button></li>
			                    </ul>
			                  </div>
			                </div>
			                <h4>".$value['titre_pub']."</h4><hr>
			                <p class='small text-muted'>Prix : ".number_format($prixreel)." Ar</p>
			                <hr>
			              </div>
			            </div>
		 			";
		 		}
	 		}else{
	 			    echo "
		 			    <header>
	 						<p class='small text-center text-muted small text-uppercase mb-1'>Arrivage en attente de publication</p>
	 					</header>
	 			    ";
	 		}
	 		echo "
						</div>
					</section>
			    </div>
			";
 		}


 		if (isset($_POST['Recherche'])) {
 			include '../../modele/publication/modele.publication.php';
			include '../../config/connexion.php';
			$modele = new ModelePub();
			$Recherche = $_POST['Recherche'];
			$Categorie = $_POST['Categorie'];
			if ($Categorie == "Tout Categorie") {
				$donne = $modele->GetSearchAll($Recherche);
			}else{
				$donne = $modele->GetSearch($Recherche,$Categorie);
			}
			echo "<h3>Recherche : ".$Recherche."</h3><hr>";
			if ($donne) {
				echo "<div class='row'>";
				foreach ($donne as $key => $value) {
					if ($value['img1_pub']!=NULL || $value['img1_pub']!="") {
						$url = "content/data/image/publication/".$value['img1_pub'];
					}else{
						$url = "content/data/image/logo.png";
					}
					$dateNowA = date("Y-m-d");
					if ($value['prix_prom'] == NULL && $value['date_com'] == NULL || $value['date_com'] < $dateNowA) {
							$prixreel = $value['prix_pub'];
							$promAfficheClient = "";
					}else{
						$prixreel = $value['prix_pub'] - (($value['prix_pub'] * $value['prix_prom']) / 100);
						$promAfficheClient = "<div class='p-2 badge text-white badge-warning float-right'> -".$value['prix_prom']."% </div>";
					}
					echo "
							<div class='listeR col-sm-2' onclick=\"AffichePub(".$value['id_pub'].",'".$value['type_pub']."');ScrollToTo('donnePublication');\";'>
								".$promAfficheClient."
								<img src='".$url."' width='60' height='60'><hr>
								<div>
									<h6>".$value['titre_pub']." <br> <small>(".number_format($prixreel)." Ar)</small></h6>
								</div>
							</div>
					";
				}
				echo "</div>";
			}else{
				echo "Aucune donnée pour votre recherche : <b>".$Recherche."</b>";
			}

 		}
 		// if (isset($_POST['Recherche'])) {
 		// 	include '../../modele/publication/modele.publication.php';
			// include '../../config/connexion.php';
			// $modele = new ModelePub();
			// $Recherche = $_POST['Recherche'];
			// $Categorie = $_POST['Categorie'];
			// if ($Categorie == "Tout Categorie") {
			// 	$donne = $modele->GetSearchAll($Recherche);
			// }else{
			// 	$donne = $modele->GetSearch($Recherche,$Categorie);
			// }
			// echo "<h3>Recherche : ".$Recherche."</h3><hr>";
			// if ($donne) {
			// 	echo "<div class='row'>";
			// 	foreach ($donne as $key => $value) {
			// 		if ($value['img1_pub']!=NULL || $value['img1_pub']!="") {
			// 			$url = "content/data/image/publication/".$value['img1_pub'];
			// 		}else{
			// 			$url = "content/data/image/logo.png";
			// 		}

			// 		echo "
			// 				<div class='listeR col-sm-2' onclick=\"AffichePub(".$value['id_pub'].",'".$value['type_pub']."');ScrollToTo('donnePublication');\";'>
			// 					<img src='".$url."' width='60' height='60'><hr>
			// 					<div>
			// 						<h6>".$value['titre_pub']." <br> <small>(".number_format($value['prix_pub'])." Ar)</small></h6>
			// 					</div>
			// 				</div>
			// 		";
			// 	}
			// 	echo "</div>";
			// }else{
			// 	echo "Aucune donnée pour votre recherche : <b>".$Recherche."</b>";
			// }

			// $donneAutre = $modele->GetAllPost32($Categorie);
			// echo "
			// 	<hr>
			// 	<div>
			// 		    <section>
			// 		          <header>
			// 		            <p class='small text-muted small text-uppercase mb-1'>A VOIR AUSSI</p>
			// 		          </header>
			//           			<div class='container row'>
			// ";
			// if ($donneAutre) {
			// 	foreach ($donneAutre as $key => $value) {
			// 		if ($value['img1_pub']!=NULL || $value['img1_pub']!="") {
			// 			$url = "content/data/image/publication/".$value['img1_pub'];
			// 		}else{
			// 			$url = "content/data/image/logo.png";
			// 		}

			// 		echo "
			// 				<div class='listeR col-sm-2' onclick=\"AffichePub(".$value['id_pub'].",'".$value['type_pub']."');ScrollToTo('donnePublication');\";'>
			// 					<img src='".$url."' width='60' height='60'><hr>
			// 					<div>
			// 						<h6>".$value['titre_pub']." <br> <small>(".number_format($value['prix_pub'])." Ar)</small></h6>
			// 					</div>
			// 				</div>
			// 		";
			// 	}
			// }
			// echo "
			// 			</div>
			// 		</section>
			//     </div>
			// ";

 		// }
		if (isset($_POST['RechercheLieu'])) {
 			include '../../modele/publication/modele.publication.php';
			include '../../config/connexion.php';
			$modele = new ModelePub();
			$Recherche = $_POST['RechercheLieu'];
			$lieuRe = $_POST['lieuRe'];
			if ($lieuRe == "Tout") {
				$donne = $modele->GetSearchAll($Recherche);
			}else{
				$donne = $modele->GetSearchLieu($Recherche,$lieuRe);
			}
			echo "<h3>Recherche : ".$Recherche."</h3><hr>";
			if ($donne) {
				echo "<div class='row'>";
				foreach ($donne as $key => $value) {
					if ($value['img1_pub']!=NULL || $value['img1_pub']!="") {
						$url = "content/data/image/publication/".$value['img1_pub'];
					}else{
						$url = "content/data/image/logo.png";
					}

					echo "
							<div class='listeR col-sm-2' onclick=\"AffichePub(".$value['id_pub'].",'".$value['type_pub']."');ScrollToTo('donnePublication');\";'>
								<img src='".$url."' width='60' height='60'><hr>
								<div>
									<h6>".$value['titre_pub']." <br> (<small>".number_format($value['prix_pub'])." Ar</small></h6>
								</div>
							</div>
					";
				}
				echo "</div>";
			}else{
				echo "Aucune donnée pour votre recherche : <b>".$Recherche."</b>";
			}

 		}


 		if (isset($_POST['AffichePubA'])) {
 			session_start();
 			include '../../modele/publication/modele.publication.php';
 			include '../../modele/activiteUser/modele.activiteUser.php';
			include '../../modele/utilisateurNav/modele.usernav.php';
			include '../../modele/sur/modele.sur.php';
			include '../../config/connexion.php';
			$modele = new ModelePub();
			$modeleSur = new SurModele();
			$modeleUser = new ActivityUser();
			$modeleUserNav = new ModeleUserNav();

			$AffichePub = $_POST['AffichePubA'];
			$useragent = $_POST['useragent'];
			$platform = $_POST['platform'];
			$product = $_POST['product'];

			$donneDispo = $modele->GetDispo($AffichePub);
			$donne = $modele->GetPostById($AffichePub);
			$sur = $modeleSur->GetSur();


			if ($donne['img1_pub']!=NULL && $donne['img1_pub']!="") {
				$img1 = "<img id='imgOneACAAA".$donne['id_pub']."' src='content/data/image/publication/".$donne['img1_pub']."' onclick=\"ShowImage('modelaC','imgOneACAAA".$donne['id_pub']."','imgOneCC','descC','".$donne['titre_pub']."');\">";
				$img1c = "<img class='demo cursor' src='content/data/image/publication/".$donne['img1_pub']."'  style='width:100%;' height='60' onclick='currentSlide(1)'>";
				$url1 = "content/data/image/publication/".$donne['img1_pub'];
			}else{
				$img1 = "<img src='content/data/image/logo.png'/>";
				$img1c = "";
				$url1 = "content/data/image/logo.png";
			}


			$donneUserNav = $modeleUserNav->GetUserNav($useragent,$platform,$product);
			if ($donneUserNav) {
				$userPanNav = "<button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#UserPanierNav' onclick=\"AddToCartNav(".$AffichePub.",1);\">AJOUTER <i class='fa fa-shopping-cart'></i></button>";
			}else{
				$userPanNav = "";
			}
	
			if (isset($_SESSION['idUser'])) {
				$idUserSeee = $_SESSION['idUser'];
				$descUs = "VOIR";
				$modeleUser->AddUserActSeeing($idUserSeee,$AffichePub,$descUs);
				$userPan = "<button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#UserPanier' onclick=\"AddToCart(".$AffichePub.",1);\">AJOUTER <i class='fa fa-shopping-cart'></i></button>";
			}else{
				$userPan = "";
			}

			if ($donne['img2_pub']!=NULL && $donne['img2_pub']!="") {
				$img2 = "<img id='imgOneAC2".$donne['id_pub']."' src='content/data/image/publication/".$donne['img2_pub']."' onclick=\"ShowImage('modelaC2','imgOneAC2".$donne['id_pub']."','imgOneCC2','descC2','".$donne['titre_pub']."');\">";
				$img2c = "<img class='demo cursor' src='content/data/image/publication/".$donne['img2_pub']."' style='width:100%;' height='60' onclick='currentSlide(2)'>";
			}else{
				$img2 = "";
				$img2c = "";
			}

			if ($donne['img3_pub']!=NULL && $donne['img3_pub']!="") {
				$img3 = "<img id='imgOneAC3".$donne['id_pub']."' src='content/data/image/publication/".$donne['img3_pub']."' onclick=\"ShowImage('modelaC3','imgOneAC3".$donne['id_pub']."','imgOneCC3','descC3','".$donne['titre_pub']."');\">";
				$img3c = "<img class='demo cursor' src='content/data/image/publication/".$donne['img3_pub']."' style='width:100%;' height='60' onclick='currentSlide(3)'>";
			}else{
				$img3 = "";
				$img3c = "";
			}

			if ($donne['img4_pub']!=NULL && $donne['img4_pub']!="") {
				$img4 = "<img id='imgOneAC4".$donne['id_pub']."' src='content/data/image/publication/".$donne['img4_pub']."' onclick=\"ShowImage('modelaC4','imgOneAC4".$donne['id_pub']."','imgOneCC4','descC4','".$donne['titre_pub']."');\">";
				$img4c = "<img class='demo cursor' src='content/data/image/publication/".$donne['img4_pub']."' style='width:100%;' height='60' onclick='currentSlide(4)'>";
			}else{
				$img4 = "";
				$img4c = "";
			}

			if ($donne['desc_pub']!="" || $donne['desc_pub']!=NULL) {
				$descDetaille = "
					<p class='text-small'>".nl2br($donne['desc_pub'])."</p>
				";
			}else{
				$descDetaille = "";
			}

			if ($donne['img1_pub']!=NULL && $donne['img2_pub']==NULL && $donne['img3_pub']==NULL && $donne['img4_pub']==NULL ) {
				$img1c = "";
			}
			if ($donne['img1_pub']!="" && $donne['img2_pub']=="" && $donne['img3_pub']=="" && $donne['img4_pub']=="" ) {
				$img1c = "";
			}

			$donneDispo['Antananarivo'] == "OK" ? $disp1 = "<li class='px-3 py-2 mb-1 bg-white'><strong class='text-uppercase'>Lieu: </strong><span class='ml-2 text-muted text-uppercase'>Antananarivo</span></li>" : $disp1 = "";
			$donneDispo['Antsiranana'] == "OK" ? $disp2 = "<li class='px-3 py-2 mb-1 bg-white'><strong class='text-uppercase'>Lieu: </strong><span class='ml-2 text-muted text-uppercase'>Antsiranana</span></li>" : $disp2 = "";
			$donneDispo['Fianarantsoa'] == "OK" ? $disp3 = "<li class='px-3 py-2 mb-1 bg-white'><strong class='text-uppercase'>Lieu: </strong><span class='ml-2 text-muted text-uppercase'>Fianarantsoa</span></li>" : $disp3 = "";
			$donneDispo['Mahajanga'] == "OK" ? $disp4 = "<li class='px-3 py-2 mb-1 bg-white'><strong class='text-uppercase'>Lieu: </strong><span class='ml-2 text-muted text-uppercase'>Mahajanga</span></li>" : $disp4 = "";
			$donneDispo['Toamasina'] == "OK" ? $disp5 = "<li class='px-3 py-2 mb-1 bg-white'><strong class='text-uppercase'>Lieu: </strong><span class='ml-2 text-muted text-uppercase'>Toamasina</span></li>" : $disp5 = "";
			$donneDispo['Toliara'] == "OK" ? $disp6 = "<li class='px-3 py-2 mb-1 bg-white'><strong class='text-uppercase'>Lieu: </strong><span class='ml-2 text-muted text-uppercase'>Toliara</span></li>" : $disp6 = "";

			$dateNow = date("Y-m-d");

			if ($donne['prix_prom'] == NULL && $donne['date_com'] == NULL || $donne['date_com'] < $dateNow) {
				$prixreel = $donne['prix_pub'];
				$small = "";
				$dateProm = "";
				$promAfficheClient = "";
			}else{
				$prixreel = $donne['prix_pub'] - (($donne['prix_pub'] * $donne['prix_prom']) / 100);
				$small = "<strike class='small h6'>Prix : ".number_format($donne['prix_pub'])." Ar ou ".number_format($donne['prix_pub']*5)." Fmg</strike>";
				list($yo,$mo,$do) = explode("-", $donne['date_com']);
				$dateProm = "<hr><p class='small h6 text-primary text-uppercase'>Fin de l'offre : ".$do."/".$mo."/".$yo."</p>";
				$promAfficheClient = "<span class='p-2 badge badge-warning float-right'> -".$donne['prix_prom']."% </span>";
			}
			

 			echo "
				    <div class='py-2 px-4 text-white' style='background:#344198;'>
	        				<strong class='small text-uppercase font-weight-bold'>".$donne['type_pub']." SUR A TOUS MOMENT : ".$donne['titre_pub']."</strong>
	        		</div> 
 					<div class='row'>
						<div class='col-lg-5'>
								<div class=''>
									<div class='mySlides' style='display:block;'>
		           						 ".$img1."
									</div>
									<div id='modelaC' class='modal'>
									  <span class='close' onclick=\"Close('modelaC');\">&times;</span>
									  <img class='modal-content' id='imgOneCC'>
									  <div id='descC' class='text-center' style='color: #fff;'></div>
									</div>

									<div class='mySlides'>
		           						 ".$img2."
									</div>
									<div id='modelaC2' class='modal'>
									  <span class='close' onclick=\"Close('modelaC2');\">&times;</span>
									  <img class='modal-content' id='imgOneCC2'>
									  <div id='descC2' class='text-center' style='color: #fff;'></div>
									</div>

									<div class='mySlides'>
		           						 ".$img3."
									</div>
									<div id='modelaC3' class='modal'>
									  <span class='close' onclick=\"Close('modelaC3');\">&times;</span>
									  <img class='modal-content' id='imgOneCC3'>
									  <div id='descC3' class='text-center' style='color: #fff;'></div>
									</div>

									<div class='mySlides'>
		           						 ".$img4."
									</div>
									<div id='modelaC4' class='modal'>
									  <span class='close' onclick=\"Close('modelaC4');\">&times;</span>
									  <img class='modal-content' id='imgOneCC4'>
									  <div id='descC4' class='text-center' style='color: #fff;'></div>
									</div>

									<br>
									<!-- <div class='caption-container'>
							            <p id='caption'></p>
							        </div> -->

							        <div class='row'>
							        	<div class='column' style='margin:10px;'>
							              ".$img1c."
							            </div>
							            <div class='column' style='margin:10px;'>
							              ".$img2c."
							            </div>
							            <div class='column' style='margin:10px;'>
							              ".$img3c."
							            </div>
							            <div class='column' style='margin:10px;'>
							              ".$img4c."
							            </div>
							        </div>
								</div>
						</div>
						<div class='col-lg-7'>
							<br>
							<div class=''>
								".$promAfficheClient."
								<h1 class='titreH' align='left'>".$donne['titre_pub']."</h1>								
								<p class='text-muted lead'>".$small."</p>
								<hr>
								<p class='text-muted lead'>Prix : ".number_format($prixreel)." Ar ou ".number_format($prixreel*5)." Fmg</p>

								".$dateProm."
								".$descDetaille."
								<hr>
								".$userPanNav."	
								".$userPan."	
								<a data-toggle='modal' data-target='#AppelSur' style='color:#fff;'><button class='btn btn-primary btn-sm'>CONTACTER <i class='fa fa-phone'></i></button></a>
								<button class='btn btn-primary btn-sm' onclick=\"ScrollToTo('anotherPostAnother');\">POURSUIVRE LA VISITE <i class='fa fa-eye'></i></button>
								<!--<a class='cliclHere' style='color:#fff;'><button class='btn btn-primary btn-sm'>AUTRE ".$donne['categorie_pub']."</button></a>-->
								<br><br>
								<ul class='list-unstyled small d-inline-block'>
									<div class='row'>
										<div class='col'>
							                ".$disp1."
							                ".$disp2."
							                ".$disp3."
							                ".$disp4."
							                ".$disp5."
							                ".$disp6."
						                </div>
										<div class='col'>
							                <li class='px-3 py-2 mb-1 bg-white'><strong class='text-uppercase'>Type:</strong><span class='ml-2 text-muted'>".$donne['type_pub']."</span></li>
							                <li class='px-3 py-2 mb-1 bg-white'><strong class='text-uppercase'>Categorie:</strong><span class='ml-2 text-muted'>".$donne['categorie_pub']."</span></li>
							                <li class='px-3 py-2 mb-1 bg-white'><strong class='text-uppercase'>Pour : </strong><span class='ml-2 text-muted text-uppercase'>".$donne['genrePub']."</span></li>
						                </div>
					                </div>
					            </ul>
							</div>
						</div>
					</div>
					<div class='caption-container'>
						<p></p>
					</div>
					<br>

					<div>
				    <section id='anotherPostAnother'>
				          <header>
				            <p class='small text-muted small text-uppercase mb-1'>".$donne['type_pub']."</p>
				            <h4 class='h6 text-uppercase mb-4'>Autre article en relation</h4>
				          </header>
		          			<div class='row'>
 			";
 			$donneAnother = $modele->GetAnotherPost($donne['id_pub'],$donne['type_pub'],$donne['categorie_pub']);
 			if ($donneAnother) {
 				foreach ($donneAnother as $key => $value) {
					if ($value['img1_pub']!=NULL || $value['img1_pub']!="") {
						$img = "<img src='content/data/image/publication/".$value['img1_pub']."' class='imgSur' />";
					}else{
						$img = "<img src='content/data/image/logo.png' class='imgSur'/>";
					}
					$dateNowA = date("Y-m-d");
					if ($value['prix_prom'] == NULL && $value['date_com'] == NULL || $value['date_com'] < $dateNowA) {
							$prixreel = $value['prix_pub'];
							$promAfficheClient = "";
					}else{
						$prixreel = $value['prix_pub'] - (($value['prix_pub'] * $value['prix_prom']) / 100);
						$promAfficheClient = "<div class='p-2 badge text-white badge-warning float-right'> -".$value['prix_prom']."% </div>";
					}
		 			echo "
		 				<div class='col-lg-4 col-sm-6'>
			              <div class='product text-center cardSur animecardSur'>
			                ".$promAfficheClient."
			                <div class='position-relative mb-3'>
			                  <div class='badge badge-primary baddab'></div><a style='border:1px;height: 250px;' class='d-block'>".$img."</a>
			                  <div class='product-overlay'>
			                    <ul class='mb-0 list-inline'>
			                      <li class='list-inline-item m-0 p-0' onclick=\"AffichePub(".$value['id_pub'].",'".$value['type_pub']."');ScrollToTo('donnePublication');\"><a style='color:#fff;' class='btn btn-primary btn-sm'>DETAILLE <i class='fa fa-eye'></i></a></li>
			                      <li class='list-inline-item m-0 p-0'><a data-toggle='modal' data-target='#AppelSur' class='btn btn-primary btn-sm' style='color:#fff;'>CONTACTER <i class='fa fa-phone'></i></a></li>
			                    </ul>
			                  </div>
			                </div>
			                <h4>".$value['titre_pub']."</h4><hr>
			                <p class='small text-muted'>Prix : ".number_format($prixreel)." Ar</p>
			                <hr>
			              </div>
			            </div>
		 			";
		 		}
 			}else{
 				echo "
 					<header class='container'>
 						<p class='small text-center text-muted text-uppercase mb-1'>Arrivage en attente de publication</p>
 					</header>
 				";
 			}
 			echo "
						</div>
					</section>
			    </div>
			";

 		}

 		if (isset($_POST['loadOffre'])) {
			include '../../modele/sur/modele.sur.php';
			include '../../config/connexion.php';
 			include '../../modele/publication/modele.publication.php';
			$modele = new ModelePub();
			$donne = $modele->GetPostOffre(1);
			echo "
				<div class='slider-item' style='background-image:url(content/data/image/lolo.png);'>
	             <div class='overlay'></div>
	             <div class='container'>
	                <div class='row no-gutters slider-text align-items-center justify-content-center'>
	                    <div class='col-md-12 ftco-animate'>
	                        <div class='text w-100 text-center'>
	                            <h2>Solution Unique et Rapide</h2>
	                            <h1 class='mb-3'>BIENVENUE</h1>
	                            <button class='btn btn-primary btn-lg' onclick=\"ScrollToTo('secondary-bar')\">Visiter</button>
	                        </div>
	                    </div>
	                </div>
	             </div>
	          </div>
			";
 			// if ($donne) {
 			// 	foreach ($donne as $key => $value) {
 			// 		if ($value['img1_pub']!=NULL && $value['img1_pub']!="") {
				// 		$img1 = "<img src='content/data/image/publication/".$value['img1_pub']."'>";
				// 	}else{
				// 		$img1 = "<img src='content/data/image/logo.png'>";
				// 	}
				// 	list($yo,$mo,$do) = explode("-", $value['date_com']);
	 		// 		echo "
    //   					<div class='slider-item' style='background-image:url(content/data/image/lolo.png);'>
	   //      				<div class='overlay'></div>
				//             <div class='container'>
				// 	            <div class='row'>
				// 	                <div class='col-sm-8'>
				// 	                    <div class='row slider-text align-items-center justify-content-center'>
				// 	                      <div class='col-md-12'>
				// 	                        <div class='container text w-100'>
				// 	                            <div class='row'>
				// 	                                <div class='col-sm-12 d-flex'>
				// 	                                    <div style='width: 50%;'>
				// 	                                        ".$img1."
				// 	                                    </div> 
				// 	                                    <div class='ml-5'>
				// 	                                        <h3>".$value['titre_pub']."</h3>
				// 	                                        <hr>
				// 	                                        <small>".substr($value['desc_pub'], 0, 25)." ...</small>
				// 	                                        <hr>
				// 	                                        <h4>Prix : <strike>".$value['prix_pub']." ou ".($value['prix_pub']*5)."</strike></h4>
				// 	                                    </div>
				// 	                                </div>
				// 	                            </div>
				// 	                             <button class='mt-3 btn btn-block btn-primary btn-lg' onclick='AffichePub(".$value['id_pub'].")'>Voir</button>
				// 	                        </div>
				// 	                      </div>
				// 	                    </div>
				// 	                </div>
				// 	                <div class='col-sm-4'>
				// 	                    <div class='row no-gutters slider-text align-items-center justify-content-center'>
				// 	                      <div class='col-md-12 ftco-animate'>
				// 	                        <div class='text text-center'>
				// 	                            <h1 class='mb-3'>-".$value['prix_prom']."%</h1>
				// 	                            <h4 class='mb-3'>FIN DE L'OFFRE : ".$do."-".$mo."-".$yo."</h4>
				// 	                        </div>
				// 	                      </div>
				// 	                    </div>
				// 	                </div>
				// 	            </div>
				//             </div>
    //   					</div>
	 		// 		";
 			// 	}
 			// }else{
 			// 	echo "";
 			// }
 		}



  ?>