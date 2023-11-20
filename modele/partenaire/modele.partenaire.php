<?php 
	/**
	 * 
	 */
	class ModelePartenaire
	{
		
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

		public function AddPart($idAdmin_partenairea,$nom_partenairea,$contactpartenairea,$logo_partenairea,$provinceParta,$adresseParta)
		{
			$sql = "INSERT INTO partenaire(idAdmin_partenaire,nom_partenaire,contactpartenaire,logo_partenaire,province_partenaire,adresse_partenaire,date_partenaire,heure_partenaire) VALUES('$idAdmin_partenairea','$nom_partenairea','$contactpartenairea','$logo_partenairea','$provinceParta','$adresseParta',NOW(),NOW())";
			$this->bdd->exec($sql);
		}

		public function GetPart()
		{
			$sql = "SELECT * FROM partenaire ORDER BY id_partenaire DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function DelPart($idPart)
		{
			$sql = "DELETE FROM partenaire WHERE id_partenaire='$idPart'";
			$this->bdd->exec($sql);
		}



	}




 ?>