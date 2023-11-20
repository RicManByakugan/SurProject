<?php 
	/**
	 * 
	 */
	class Commande
	{
		
		private $bdd;

		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}

		public function AddCommande($idComCoUser,$idComUser,$idComPub,$QtCom,$opCom,$numCom,$adreCom,$proCom)
		{
			$sql = "INSERT INTO commandeuser(idComCoUser,idComUser,idComPub,QtCom,opCom,numCom,adreCom,proCom,statusCom,dateCom,heureCom) VALUES('$idComCoUser','$idComUser','$idComPub','$QtCom','$opCom','$numCom','$adreCom','$proCom','ENVOIE',NOW(),NOW())";
			$this->bdd->exec($sql);
		}
		public function TestIC($idComCoUser)
		{
			$sqlVeri = "SELECT * FROM commandeuser WHERE idComCoUser='$idComCoUser'AND statusCom='ENVOIE'";
			$recup = $this->bdd->query($sqlVeri);
			$donne = $recup->fetch();
			if ($donne) {
				return "ko";				
			}else{
				return "ok";
			}
		}

		public function RecupCommande($idUser)
		{
			$sql = "SELECT * FROM commandeuser INNER JOIN publication ON commandeuser.idComPub=publication.id_pub WHERE commandeuser.idComUser='$idUser' AND commandeuser.statusCom='ENVOIE' ORDER BY commandeuser.idComFait DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function RecupCommandeCo($idCo)
		{
			$sql = "SELECT * FROM commandeuser INNER JOIN publication ON commandeuser.idComPub=publication.id_pub WHERE commandeuser.idComCoUser='$idCo' ORDER BY commandeuser.idComFait DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function RecupUserCommande($idCo)
		{
			$sql = "SELECT * FROM commandeuser INNER JOIN utilisateur ON commandeuser.idComUser=utilisateur.idUser WHERE commandeuser.idComCoUser='$idCo'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function RecupCommandeCoUser($idCo)
		{
			$sql = "SELECT * FROM commandeuser INNER JOIN publication ON commandeuser.idComPub=publication.id_pub WHERE commandeuser.idComCoUser='$idCo' ORDER BY commandeuser.idComFait DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

		public function RecupCommandeId($idUser)
		{
			$sql = "SELECT DISTINCT idComCoUser,dateCom,heureCom,statusCom FROM commandeuser WHERE commandeuser.idComUser='$idUser' AND commandeuser.statusCom!='ANNULER' ORDER BY idComFait DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function AnnuleCommande($idComCoUser)
		{
			$sql = "UPDATE commandeuser SET statusCom='ANNULER' WHERE idComCoUser='$idComCoUser'"; 
			$this->bdd->exec($sql);
		}

		public function GetCommandeNumCo($idNumco)
		{
			$sql = "SELECT DISTINCT idComCoUser FROM commandeuser WHERE idComCoUser='$idNumco'";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}

		// ----------------------------------------------------------------------------------------------------------------
		public function RecupAllCommande()
		{
			$sql = "SELECT DISTINCT idComCoUser,nomUser,prenomUser,imageUser,dateCom,heureCom,statusCom FROM commandeuser INNER JOIN utilisateur ON commandeuser.idComUser=utilisateur.idUser WHERE commandeuser.statusCom='ENVOIE' ORDER BY commandeuser.idComFait DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function RecupAllCommandeStatusS($st)
		{
			$sql = "SELECT DISTINCT idComCoUser,nomUser,prenomUser,imageUser,dateCom,heureCom,statusCom FROM commandeuser INNER JOIN utilisateur ON commandeuser.idComUser=utilisateur.idUser WHERE commandeuser.statusCom='$st' ORDER BY commandeuser.idComFait DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}
		public function RecupAllCommandeIdCo($idComCoUser)
		{
			$sql = "SELECT * FROM commandeuser INNER JOIN utilisateur ON commandeuser.idComUser=utilisateur.idUser WHERE commandeuser.idComCoUser='$idComCoUser' ORDER BY commandeuser.idComFait";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

		public function DeclineCommande($idComCoUser,$motif)
		{
			$motifEnvoie = htmlentities($motif, ENT_QUOTES, "UTF-8");
			$sql = "UPDATE commandeuser SET statusCom='DECLINER',causeDec='$motifEnvoie' WHERE idComCoUser='$idComCoUser'"; 
			$this->bdd->exec($sql);
		}

		public function LivreCommande($idComCoUser)
		{
			$sql = "UPDATE commandeuser SET statusCom='LIVRAISON' WHERE idComCoUser='$idComCoUser'"; 
			$this->bdd->exec($sql);
		}
		public function ConclureCommande($idComCoUser)
		{
			$sql = "UPDATE commandeuser SET statusCom='VALIDER' WHERE idComCoUser='$idComCoUser'"; 
			$this->bdd->exec($sql);
		}
		public function SupIDCommande($idComCoUser)
		{
			$sql = "DELETE FROM commandeuser WHERE idComCoUser='$idComCoUser'"; 
			$this->bdd->exec($sql);
		}



		// public function SupCommande($idPan)
		// {
		// 	$sql = "DELETE FROM commandeuser WHERE idCommande='$idPan'";
		// 		$this->bdd->exec($sql);
		// }
		// public function VideCommande($idUser)
		// {
		// 	$sql = "DELETE FROM Commande WHERE idUserCommande='$idUser'";
		// 		$this->bdd->exec($sql);
		// }

		// public function UpdateQtePub($idCommande,$Qte)
		// {
		// 	$sql = "UPDATE Commande SET QtCommande='$Qte' WHERE idCommande='$idCommande'";
		// 	$this->bdd->exec($sql);
		// }
		// public function UpdateDeleteCommande($idCommande)
		// {
		// 	$sql = "DELETE FROM '";
		// 	$this->bdd->exec($sql);
		// }

	}

 ?>