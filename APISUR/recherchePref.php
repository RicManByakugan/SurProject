<?php 

	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: PUT, GET, POST");
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	require 'connexion.php';
	
	if(isset($_GET['categorie'])){

		$categorie = $_GET['categorie'];
		$cible = $_GET['cible'];
		$province = $_GET['province'];

		if ($province == "Antananarivo") {
			$antananarivo = "OK";
			$antsiranana = "KO";
			$fianarantsoa = "KO";
			$mahajanga = "KO";
			$toamasina = "KO";
			$toliara = "KO";
		}
		elseif ($province == "Antsiranana") {
			$antananarivo = "KO";
			$antsiranana = "OK";
			$fianarantsoa = "KO";
			$mahajanga = "KO";
			$toamasina = "KO";
			$toliara = "KO";
		}
		elseif ($province == "Fianarantsoa") {
			$antananarivo = "KO";
			$antsiranana = "KO";
			$fianarantsoa = "OK";
			$mahajanga = "KO";
			$toamasina = "KO";
			$toliara = "KO";
		}
		elseif ($province == "Mahajanga") {
			$antananarivo = "OK";
			$antsiranana = "KO";
			$fianarantsoa = "KO";
			$mahajanga = "OK";
			$toamasina = "KO";
			$toliara = "KO";
		}
		elseif ($province == "Toamasina") {
			$antananarivo = "KO";
			$antsiranana = "KO";
			$fianarantsoa = "KO";
			$mahajanga = "KO";
			$toamasina = "OK";
			$toliara = "KO";
		}
		elseif ($province == "Toliara") {
			$antananarivo = "KO";
			$antsiranana = "KO";
			$fianarantsoa = "KO";
			$mahajanga = "KO";
			$toamasina = "KO";
			$toliara = "OK";
		}
		else{
			$antananarivo = "OK";
			$antsiranana = "KO";
			$fianarantsoa = "KO";
			$mahajanga = "KO";
			$toamasina = "KO";
			$toliara = "KO";
		}

		if ($cible == "") {
			$cible = "Tout";
		}

		if ($cible == "JeuneHomme") {
			$cible = "Jeune Homme";
		}
		if ($cible == "JeuneFemme") {
			$cible = "Jeune Femme";
		}

		if ($categorie == "") {
			$sql = "SELECT * FROM publication INNER JOIN diponibilitepub ON publication.id_pub=diponibilitepub.idPubDispo WHERE publication.genrePub='$cible' AND diponibilitepub.Antananarivo='$antananarivo' OR diponibilitepub.Antsiranana='$antsiranana' OR diponibilitepub.Fianarantsoa='$fianarantsoa' OR diponibilitepub.Mahajanga='$mahajanga' OR diponibilitepub.Toamasina='$toamasina' OR diponibilitepub.Toliara='$toliara' ORDER BY publication.id_pub DESC";
		}else{
			$sql = "SELECT * FROM publication INNER JOIN diponibilitepub ON publication.id_pub=diponibilitepub.idPubDispo WHERE publication.categorie_pub='$categorie' AND publication.genrePub='$cible' AND diponibilitepub.Antananarivo='$antananarivo' OR diponibilitepub.Antsiranana='$antsiranana' OR diponibilitepub.Fianarantsoa='$fianarantsoa' OR diponibilitepub.Mahajanga='$mahajanga' OR diponibilitepub.Toamasina='$toamasina' OR diponibilitepub.Toliara='$toliara' ORDER BY publication.id_pub DESC";
		}
		$sqlSur = "SELECT * FROM sur WHERE id_sur=1";


		$publication = [];

		if($result = mysqli_query($con,$sql))
		{
			$pb = 0;
			while($row = mysqli_fetch_assoc($result))
			{
				$resultSur = mysqli_query($con,$sqlSur);
			    $rowSur = mysqli_fetch_assoc($resultSur);
			    $publication[$pb]['contact']= $rowSur['tel_sur']; 
			    
			    $publication[$pb]['id_pub']= $row['id_pub']; 
			    $publication[$pb]['type_pub']= $row['type_pub']; 
			    $publication[$pb]['categorie_pub']= $row['categorie_pub']; 
			    $publication[$pb]['titre_pub']= $row['titre_pub']; 
			    $publication[$pb]['genrePub']= $row['genrePub']; 
			    $publication[$pb]['desc_pub']= $row['desc_pub']; 
			    $publication[$pb]['prix_pub']= $row['prix_pub']; 
			    $publication[$pb]['date_pub']= $row['date_pub']; 
			    $publication[$pb]['heure_pub']= $row['heure_pub']; 

			    $publication[$pb]['type_pub']= $row['type_pub']; 
			    $publication[$pb]['categorie_pub']= $row['categorie_pub']; 
			    $publication[$pb]['genrePub']= $row['genrePub']; 

			    $publication[$pb]['img1_pub']= $row['img1_pub']; 
			    $publication[$pb]['img2_pub']= $row['img2_pub']; 
			    $publication[$pb]['img3_pub']= $row['img3_pub']; 
			    $publication[$pb]['img4_pub']= $row['img4_pub']; 

			    $publication[$pb]['Antananarivo']= $row['Antananarivo']; 
			    $publication[$pb]['Antsiranana']= $row['Antsiranana']; 
			    $publication[$pb]['Fianarantsoa']= $row['Fianarantsoa']; 
			    $publication[$pb]['Mahajanga']= $row['Mahajanga']; 
			    $publication[$pb]['Toamasina']= $row['Toamasina']; 
			    $publication[$pb]['Toliara']= $row['Toliara']; 
			    $pb++;
 			}  
  			echo json_encode(['data'=>$publication]);
		}
	}

 ?>