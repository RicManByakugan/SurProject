<?php 

/**
 * 
 */
class  ModeleAdmin
{
	private $bdd;
	
	function __construct()
	{
		$co = new Connexion();
		$this->bdd = $co->connectBD();
	}

	public function AddAdmin($pseudoUser,$mdpUser,$nomUser,$prenomUser,$contactUser,$posteUser)
	{
		$sql = "INSERT INTO administration(pseudo_admin,mdp_admin,nom_admin,prenom_admin,contact_admin,poste_admin) VALUES('$pseudoUser','$mdpUser','$nomUser','$prenomUser','$contactUser','$posteUser')";
		$this->bdd->exec($sql);
	}
	public function DelImageUser($id_admin)
	{
		$sql = "UPDATE administration SET profil_admin=NULL WHERE id_admin='$id_admin'";
		$this->bdd->exec($sql);
	}
	public function GetUserId($id)
	{
		$sql = "SELECT * FROM administration WHERE id_admin=$id";
		$recup = $this->bdd->query($sql);
		return $donne = $recup->fetch();
	}
	public function GetUserPseudoVer($pseudo)
	{
		$sql = "SELECT * FROM administration WHERE pseudo_admin=$pseudo";
		$recup = $this->bdd->query($sql);
		if ($recup==true) {
			return $donne = $recup->fetch();
		}
	}
	public function GetUserListe()
	{
		$sql = "SELECT * FROM administration WHERE poste_admin IS NOT NULL";
		$recup = $this->bdd->query($sql);
		return $donne = $recup->fetchall();
	}
	public function GetUserListeLicencie()
	{
		$sql = "SELECT * FROM administration WHERE poste_admin IS NULL";
		$recup = $this->bdd->query($sql);
		return $donne = $recup->fetchall();
	}

	public function GetUserAdminCo($pseudo_admin)
	{
		$sql = "SELECT * FROM administration WHERE pseudo_admin	='$pseudo_admin'";
		$recup = $this->bdd->query($sql);
		if ($recup==true) {
			return $donne = $recup->fetch();
		}
	}

	public function UpdateaAdminMdp($id_admin,$mdp)
	{
		$sql = "UPDATE administration SET mdp_admin='$mdp' WHERE id_admin='$id_admin'";
		$this->bdd->exec($sql);
	}

	public function MAJ($id_admin,$nom,$prenom,$contact,$email,$image)
	{
		if ($nom!="" || $nom!=NULL) {
			$sql = "UPDATE administration SET nom_admin='$nom' WHERE id_admin='$id_admin'";
			$this->bdd->exec($sql);
		}
		if ($prenom!="" || $prenom!=NULL) {
			$sql = "UPDATE administration SET prenom_admin='$prenom' WHERE id_admin='$id_admin'";
			$this->bdd->exec($sql);
		}
		if ($contact!="" || $contact!=NULL) {
			$sql = "UPDATE administration SET contact_admin='$contact' WHERE id_admin='$id_admin'";
			$this->bdd->exec($sql);
		}
		if ($email!="" || $email!=NULL) {
			$sql = "UPDATE administration SET email_admin='$email' WHERE id_admin='$id_admin'";
			$this->bdd->exec($sql);
		}
		if ($image!="" || $image!=NULL) {
			$sql = "UPDATE administration SET profil_admin='$image' WHERE id_admin='$id_admin'";
			$this->bdd->exec($sql);
		}
	}
	public function ChangeStatusConnexion($id_admin,$value)
	{
		$now = time();
		if ($value == "ok") {
			$sql = "UPDATE administration SET status_admin='OK' WHERE id_admin='$id_admin'";
				$this->bdd->exec($sql);
			$sql2 = "UPDATE administration SET dernierConnexion='$now' WHERE id_admin='$id_admin'";
			$this->bdd->exec($sql2);
		}else{
			$sql = "UPDATE administration SET status_admin='KO' WHERE id_admin='$id_admin'";
				$this->bdd->exec($sql);
			$sql2 = "UPDATE administration SET dernierConnexion='$now' WHERE id_admin='$id_admin'";
			$this->bdd->exec($sql2);
		}
	}
	public function MAJPosteId($id_admin,$valeur)
	{
		$sql = "UPDATE administration SET poste_admin='$valeur' WHERE id_admin='$id_admin'";
		$this->bdd->exec($sql);
	}
	public function GetOut($id_admin)
	{
		$sql = "UPDATE administration SET poste_admin=NULL WHERE id_admin='$id_admin'";
		$ok = $this->bdd->exec($sql);
		if ($ok) {
			return "ok";
		}else{
			return "Erreur";
		}
	}
	public function DelAdmin($id_admin)
	{
		$sql = "DELETE FROM administration WHERE id_admin='$id_admin'";
		$ok = $this->bdd->exec($sql);
		if ($ok) {
			return "ok";
		}else{
			return "Erreur";
		}
	}
	public function MAJTLue($id,$value)
	{
		$sql = "UPDATE administration SET mdp_admin='$value' WHERE id_admin='$id'";
			$this->bdd->exec($sql);
	}

	// ADMIN FOR USER
	public function GetAllUser()
	{
		$sql = "SELECT * FROM utilisateur";
		$recup = $this->bdd->query($sql);
		return $donne = $recup->fetchall();
	}
	public function GetUserById($idUser)
	{
		$sql = "SELECT * FROM utilisateur WHERE idUser='$idUser'";
		$recup = $this->bdd->query($sql);
		return $donne = $recup->fetch();
	}
	public function RechercheClient($donne)
	{
		$sql = "SELECT * FROM utilisateur INNER JOIN carat ON utilisateur.idUser=carat.idUserPC WHERE carat.numCompte='$donne' OR utilisateur.nomUser LIKE '%".$donne."' OR utilisateur.nomUser LIKE '%".$donne."%' OR utilisateur.prenomUser LIKE '%".$donne."' OR utilisateur.prenomUser LIKE '%".$donne."%'";
		$recup = $this->bdd->query($sql);
		return $donne = $recup->fetchall();
	}
	public function StatusSite($valeur)
	{
		if ($valeur == "off") {
			$sql = "UPDATE sur SET off='ok',ofH=24,ofM=0,ofS=0 WHERE id_sur=1";
			$this->bdd->exec($sql);
		}else{
			$sql = "UPDATE sur SET off=NULL WHERE id_sur=1";
			$this->bdd->exec($sql);
		}
	}
	public function UpdateHourMinuSeco($h,$m,$s)
	{
		$sql = "UPDATE sur SET off='ok',ofH=$h,ofM=$m,ofS=$s WHERE id_sur=1";
			$this->bdd->exec($sql);
	}


}




 ?>