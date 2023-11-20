<?php 
	/**
	 * 
	 */
	class CommandeR
	{
		
		private $bdd;

		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

		public function RecupAllCommandeIdCo($idComCoUser)
		{
			$sql = "SELECT * FROM utlisateurnavcommande INNER JOIN utlisateurnav ON utlisateurnavcommande.idUserNCa=utlisateurnav.idusernav WHERE utlisateurnavcommande.idCoNamerNCa='$idComCoUser' ORDER BY utlisateurnavcommande.idComFaitNCa";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

		public function RecupCommandeCo($idCo)
		{
			$sql = "SELECT * FROM utlisateurnavcommande INNER JOIN publication ON utlisateurnavcommande.idPubNCa=publication.id_pub WHERE utlisateurnavcommande.idCoNamerNCa='$idCo' ORDER BY utlisateurnavcommande.idComFaitNCa DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function RecupUserCommande($idCo)
		{
			$sql = "SELECT * FROM utlisateurnavcommande INNER JOIN utlisateurnav ON utlisateurnavcommande.idUserNCa=utlisateurnav.idusernav WHERE utlisateurnavcommande.idCoNamerNCa='$idCo'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

		public function DeclineCommande($idComCoUser,$motif)
		{
			$motifEnvoie = htmlentities($motif, ENT_QUOTES, "UTF-8");
			$sql = "UPDATE utlisateurnavcommande SET statusNCa='DECLINER',causeDNCa='$motifEnvoie' WHERE idCoNamerNCa='$idComCoUser'"; 
			$this->bdd->exec($sql);
		}

		public function LivreCommande($idComCoUser)
		{
			$sql = "UPDATE utlisateurnavcommande SET statusNCa='LIVRAISON' WHERE idCoNamerNCa='$idComCoUser'"; 
			$this->bdd->exec($sql);
		}
		public function ConclureCommande($idComCoUser)
		{
			$sql = "UPDATE utlisateurnavcommande SET statusNCa='VALIDER' WHERE idCoNamerNCa='$idComCoUser'"; 
			$this->bdd->exec($sql);
		}

		// LISTE COL-6
		public function RecupAllCommande()
		{
			$sql = "SELECT DISTINCT idCoNamerNCa,Platform,Product,DateNCa,HeureNCa,statusNCa FROM utlisateurnavcommande INNER JOIN utlisateurnav ON utlisateurnavcommande.idUserNCa=utlisateurnav.idusernav WHERE utlisateurnavcommande.statusNCa='ENVOIE' ORDER BY utlisateurnavcommande.idComFaitNCa DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

		public function RecupAllCommandeStatusS($st)
		{
			$sql = "SELECT DISTINCT idCoNamerNCa,Platform,Product,DateNCa,HeureNCa,statusNCa FROM utlisateurnavcommande INNER JOIN utlisateurnav ON utlisateurnavcommande.idUserNCa=utlisateurnav.idusernav WHERE utlisateurnavcommande.statusNCa='$st' ORDER BY utlisateurnavcommande.idComFaitNCa DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

	}

 ?>