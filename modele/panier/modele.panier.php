<?php 
	/**
	 * 
	 */
	class Panier
	{
		
		private $bdd;

		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

		public function AddPanier($idUserPanier,$idPubPanier,$QtPanier)
		{
			$sqlVeri = "SELECT * FROM panier WHERE idUserPanier='$idUserPanier' AND idPubPanier='$idPubPanier' AND statusPanier='ATTENTE'";
			$recup = $this->bdd->query($sqlVeri);
			$donne = $recup->fetch();
			if ($donne) {
				return "ko";				
			}else{
				$sql = "INSERT INTO panier(idUserPanier,idPubPanier,QtPanier,statusPanier,datePanier,heurePanier) VALUES('$idUserPanier','$idPubPanier','$QtPanier','ATTENTE',NOW(),NOW())";
				$this->bdd->exec($sql);
				return "ok";
			}
		}

		public function RecupPanier($idUser)
		{
			$sql = "SELECT * FROM panier INNER JOIN publication ON panier.idPubPanier=publication.id_pub WHERE panier.idUserPanier='$idUser' AND panier.statusPanier='ATTENTE' ORDER BY panier.idPanier DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

		public function SupPanier($idPan)
		{
			$sql = "DELETE FROM panier WHERE idPanier='$idPan'";
				$this->bdd->exec($sql);
		}
		public function VidePanier($idUser)
		{
			$sql = "DELETE FROM panier WHERE idUserPanier='$idUser'";
			$this->bdd->exec($sql);
		}

		public function UpdateQtePub($idPanier,$Qte)
		{
			$sql = "UPDATE panier SET QtPanier='$Qte' WHERE idPanier='$idPanier'";
			$this->bdd->exec($sql);
		}
		public function AccepteCoAttente($idUser)
		{
			$sql = "UPDATE panier SET statusPanier='VALIDER' WHERE idUserPanier='$idUser'";
			$this->bdd->exec($sql);
		}
		public function UpdateDeletePanier($idPanier)
		{
			$sql = "DELETE FROM '";
			$this->bdd->exec($sql);
		}

	}

 ?>