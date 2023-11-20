<?php 
	/**
	 * 
	 */
	class ModeleSpons
	{
		
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

		public function AddSpons($idAdmin_sponsn,$nom_spons,$contactSpons,$logo_spons,$provinceSpons,$adresseSpons)
		{
			$sql = "INSERT INTO sponsors(idAdmin_spons,nom_spons,contactSpons,logo_spons,Province_spons,Adresse_spons,date_spons,heure_spons) VALUES('$idAdmin_sponsn','$nom_spons','$contactSpons','$logo_spons','$provinceSpons','$adresseSpons',NOW(),NOW())";
			$this->bdd->exec($sql);
		}

		public function GetSpons()
		{
			$sql = "SELECT * FROM sponsors ORDER BY id_spons DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function DelSpons($idSpons)
		{
			$sql = "DELETE FROM sponsors WHERE id_spons='$idSpons'";
			$this->bdd->exec($sql);
		}



	}




 ?>