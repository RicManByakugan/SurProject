<?php 

	/**
	 * 
	 */
	class ModelePub
	{
		
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

		public function AddPublication($id_amin,$type_pub,$categorie_pub,$titre_pub,$genrePub,$PrioPub,$desc_pub,$prix_pub,$img1_pub,$img2_pub,$img3_pub,$img4_pub)
		{
			// $im1OK = mysql_real_escape_string($img1_pub);
			// $im2OK = mysql_real_escape_string($img2_pub);
			// $im3OK = mysql_real_escape_string($img3_pub);


			// $descriptionEnvoie = mysql_real_escape_string($desc_pub);
			// $titre_pubEnvoie = mysql_real_escape_string($titre_pub);

			
			$descriptionEnvoie = htmlentities($desc_pub, ENT_QUOTES, "UTF-8");
			$titre_pubEnvoie = htmlentities($titre_pub, ENT_QUOTES, "UTF-8");


			$sql = "INSERT INTO publication(idAdmin_pub,type_pub,categorie_pub,titre_pub,genrePub,PrioPub,desc_pub,prix_pub,img1_pub,img2_pub,img3_pub,img4_pub,date_pub,heure_pub) VALUES('$id_amin','$type_pub','$categorie_pub','$titre_pubEnvoie','$genrePub','$PrioPub','$descriptionEnvoie','$prix_pub','$img1_pub','$img2_pub','$img3_pub','$img4_pub',NOW(),NOW())";
			$this->bdd->exec($sql);
		}
		public function AddDispo($idPub,$one,$two,$three,$four,$five,$six)
		{
			$sql = "INSERT INTO diponibilitepub(idPubDispo,Antananarivo,Antsiranana,Fianarantsoa,Mahajanga,Toamasina,Toliara) VALUES('$idPub','$one','$two','$three','$four','$five','$six')";
			$this->bdd->exec($sql);
		}
		public function UpdateImageDel($nombre,$idPub)
		{
			if ($nombre == 1) {
				$sql = "UPDATE publication SET img1_pub=NULL WHERE id_pub='$idPub'";
				$this->bdd->exec($sql);
			}
			if ($nombre == 2) {
				$sql = "UPDATE publication SET img2_pub=NULL WHERE id_pub='$idPub'";
				$this->bdd->exec($sql);
			}
			if ($nombre == 3) {
				$sql = "UPDATE publication SET img3_pub=NULL WHERE id_pub='$idPub'";
				$this->bdd->exec($sql);
			}
			if ($nombre == 4) {
				$sql = "UPDATE publication SET img4_pub=NULL WHERE id_pub='$idPub'";
				$this->bdd->exec($sql);
			}
		}
		public function MAJPUBDispo($idPub,$one,$two,$three,$four,$five,$six)
		{
			if ($one!="" || $one!=NULL) {
				$sql = "UPDATE diponibilitepub SET Antananarivo='$one' WHERE id_pub='$idPub'";
				$this->bdd->exec($sql);
			}
			if ($two!="" || $two!=NULL) {
				$sql = "UPDATE diponibilitepub SET Antsiranana='$two' WHERE id_pub='$idPub'";
				$this->bdd->exec($sql);
			}
			if ($three!="" || $three!=NULL) {
				$sql = "UPDATE diponibilitepub SET Fianarantsoa='$three' WHERE id_pub='$idPub'";
				$this->bdd->exec($sql);
			}
			if ($four!="" || $four!=NULL) {
				$sql = "UPDATE diponibilitepub SET Mahajanga='$four' WHERE id_pub='$idPub'";
				$this->bdd->exec($sql);
			}
			if ($five!="" || $five!=NULL) {
				$sql = "UPDATE diponibilitepub SET Toamasina='$five' WHERE id_pub='$idPub'";
				$this->bdd->exec($sql);
			}
			if ($six!="" || $six!=NULL) {
				$sql = "UPDATE diponibilitepub SET Toliara='$six' WHERE id_pub='$idPub'";
				$this->bdd->exec($sql);
			}
		}
		public function MAJPUB($idPubModif,$catModif,$nameModif,$genrePub,$PrioPub,$descModif,$prixModif,$imgModif1,$imgModif2,$imgModif3,$imgModif4)
		{
			if ($catModif!="" || $catModif!=NULL) {
				$sql = "UPDATE publication SET categorie_pub='$catModif' WHERE id_pub='$idPubModif'";
				$this->bdd->exec($sql);
			}
			if ($PrioPub!="" || $PrioPub!=NULL) {
				$sql = "UPDATE publication SET PrioPub='$PrioPub' WHERE id_pub='$idPubModif'";
				$this->bdd->exec($sql);
			}
			if ($genrePub!="" || $genrePub!=NULL) {
				$sql = "UPDATE publication SET genrePub='$genrePub' WHERE id_pub='$idPubModif'";
				$this->bdd->exec($sql);
			}
			if ($nameModif!="" || $nameModif!=NULL) {
				$nameModifpubEnvoie = htmlentities($nameModif, ENT_QUOTES, "UTF-8");
				$sql = "UPDATE publication SET titre_pub='$nameModifpubEnvoie' WHERE id_pub='$idPubModif'";
				$this->bdd->exec($sql);
			}
			if ($descModif!="" || $descModif!=NULL) {
				$descModifpubEnvoie = htmlentities($descModif, ENT_QUOTES, "UTF-8");
				$sql = "UPDATE publication SET desc_pub='$descModifpubEnvoie' WHERE id_pub='$idPubModif'";
				$this->bdd->exec($sql);
			}
			if ($prixModif!="" || $prixModif!=NULL) {
				$sql = "UPDATE publication SET prix_pub='$prixModif' WHERE id_pub='$idPubModif'";
				$this->bdd->exec($sql);
			}

			if ($imgModif1!="" || $imgModif1!=NULL) {
				$sql = "UPDATE publication SET img1_pub='$imgModif1' WHERE id_pub='$idPubModif'";
				$this->bdd->exec($sql);
			}
			if ($imgModif2!="" || $imgModif2!=NULL) {
				$sql = "UPDATE publication SET img2_pub='$imgModif2' WHERE id_pub='$idPubModif'";
				$this->bdd->exec($sql);
			}
			if ($imgModif3!="" || $imgModif3!=NULL) {
				$sql = "UPDATE publication SET img3_pub='$imgModif3' WHERE id_pub='$idPubModif'";
				$this->bdd->exec($sql);
			}
			if ($imgModif4!="" || $imgModif4!=NULL) {
				$sql = "UPDATE publication SET img4_pub='$imgModif4' WHERE id_pub='$idPubModif'";
				$this->bdd->exec($sql);
			}

		}
		public function GetPubLowPriceCat($categorie,$idPub)
		{
			$sql = "SELECT MIN(prix_pub) AS prix,titre_pub,id_pub,type_pub,img1_pub,categorie_pub FROM publication WHERE categorie_pub='$categorie'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetDispo($idPub)
		{
			$sql = "SELECT * FROM diponibilitepub WHERE idPubDispo='$idPub'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();	
		}
		public function GetLastPost()
		{
			$sql = "SELECT MAX(id_pub) AS idMax FROM publication";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetAllPost()
		{
			$sql = "SELECT * FROM publication ORDER BY id_pub DESC LIMIT 6";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetAnotherPost($idPub,$type,$cat)
		{
			$sql = "SELECT * FROM publication WHERE type_pub='$type' AND id_pub!='$idPub' AND categorie_pub='$cat' ORDER BY id_pub DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetAllPost3($categorie)
		{
			$sql = "SELECT * FROM publication WHERE type_pub='$categorie' ORDER BY id_pub DESC LIMIT 3";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetPostOffre($nombre)
		{
			$sql = "SELECT * FROM publication WHERE prix_prom IS NOT NULL ORDER BY id_pub DESC LIMIT $nombre";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetAllPost32($categorie)
		{
			$sql = "SELECT * FROM publication WHERE type_pub='$categorie' ORDER BY id_pub DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetAllPostGenre($categorie,$genre)
		{
			$sql = "SELECT * FROM publication WHERE type_pub='$categorie' AND genrePub='$genre' ORDER BY id_pub DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetAllPostGenreCat($categorie,$genre,$cat)
		{
			$sql = "SELECT * FROM publication WHERE type_pub='$categorie' AND genrePub='$genre' AND categorie_pub='$cat' ORDER BY id_pub DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetPostProduit()
		{
			$sql = "SELECT * FROM publication INNER JOIN administration ON publication.idAdmin_pub=administration.id_admin WHERE type_pub = 'PRODUIT' ORDER BY publication.id_pub DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetAllPostProduit($cat)
		{
			$sql = "SELECT * FROM publication INNER JOIN administration ON publication.idAdmin_pub=administration.id_admin WHERE type_pub='PRODUIT' AND categorie_pub='$cat' ORDER BY publication.id_pub DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetPostService()
		{
			$sql = "SELECT * FROM publication INNER JOIN administration ON publication.idAdmin_pub=administration.id_admin WHERE type_pub = 'SERVICE' ORDER BY publication.id_pub DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetAllPostService($cat)
		{
			$sql = "SELECT * FROM publication INNER JOIN administration ON publication.idAdmin_pub=administration.id_admin WHERE type_pub='SERVICE' AND categorie_pub='$cat' ORDER BY publication.id_pub DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetPostFormation()
		{
			$sql = "SELECT * FROM publication INNER JOIN administration ON publication.idAdmin_pub=administration.id_admin WHERE type_pub = 'FORMATION' ORDER BY publication.id_pub DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetAllPostFormation($cat)
		{
			$sql = "SELECT * FROM publication INNER JOIN administration ON publication.idAdmin_pub=administration.id_admin WHERE type_pub='FORMATION' AND categorie_pub='$cat' ORDER BY publication.id_pub DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetPostById($id)
		{
			$sql = "SELECT * FROM publication WHERE id_pub='$id'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetPostCount($categorie)
		{
			$sql = "SELECT COUNT(id_pub) AS nombre FROM publication WHERE type_pub = 'PRODUIT' AND categorie_pub = '$categorie'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetPostCountService($categorie)
		{
			$sql = "SELECT COUNT(id_pub) AS nombre FROM publication WHERE type_pub = 'SERVICE' AND categorie_pub = '$categorie'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function GetPostCountFormation($categorie)
		{
			$sql = "SELECT COUNT(id_pub) AS nombre FROM publication WHERE type_pub = 'FORMATION' AND categorie_pub = '$categorie'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
		public function SuppPub($id_pub)
		{
			$sql = "DELETE FROM publication WHERE id_pub='$id_pub'";
			$this->bdd->exec($sql);
		}
		public function PromotionForPost($id_pub,$pr,$dateProm)
		{
			$sql = "UPDATE publication SET prix_prom=$pr,date_com='$dateProm'  WHERE id_pub='$id_pub'";
				$this->bdd->exec($sql);
			return "ok";
		}
		public function CancelPromotionForPost($id_pub)
		{
			$sql = "UPDATE publication SET prix_prom=NULL,date_com=NULL WHERE id_pub='$id_pub'";
				$this->bdd->exec($sql);
			return "ok";
		}

		public function GetSearch($mot,$cat)
		{
			$sql = "SELECT * FROM publication WHERE titre_pub LIKE '$mot%' OR titre_pub LIKE '%$mot%' OR desc_pub LIKE '$mot%' OR desc_pub LIKE '%$mot%' AND categorie_pub='$cat' ORDER BY id_pub DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetSearchLieu($mot,$lieu)
		{
			$sql = "SELECT * FROM publication INNER JOIN diponibilitepub ON publication.id_pub=diponibilitepub.idPubDispo WHERE publication.titre_pub ORDER BY publication.id_pub DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function GetSearchAll($mot)
		{
			$sql = "SELECT * FROM publication WHERE titre_pub LIKE '$mot%' OR titre_pub LIKE '%$mot%' OR desc_pub LIKE '$mot%' OR desc_pub LIKE '%$mot%' ORDER BY id_pub DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

	}







 ?>