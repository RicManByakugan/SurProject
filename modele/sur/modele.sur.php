<?php 

	/**
	 * 
	 */
	class SurModele
	{
		
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}
		public function UpdateCoordonne($contact,$email)
		{
			if ($contact!="" || $contact!=NULL) {
				$sql = "UPDATE sur SET tel_sur='$contact' WHERE id_sur=1";
				$this->bdd->exec($sql);
			}
			if ($email!="" || $email!=NULL) {
				$sql = "UPDATE sur SET email_sur='$email' WHERE id_sur=1";
				$this->bdd->exec($sql);
			}
		}
		public function UpdatePhone($phone2,$phone3,$phoneAnother)
		{
			if ($phone2!="" || $phone2!=NULL) {
				$sql = "UPDATE sur SET tel_sur2='$phone2' WHERE id_sur=1";
				$this->bdd->exec($sql);
			}
			if ($phone3!="" || $phone3!=NULL) {
				$sql = "UPDATE sur SET tel_sur3='$phone3' WHERE id_sur=1";
				$this->bdd->exec($sql);
			}
			if ($phoneAnother!="" || $phoneAnother!=NULL) {
				$sql = "UPDATE sur SET autre_tel='$phoneAnother' WHERE id_sur=1";
				$this->bdd->exec($sql);
			}
		}
		public function UpdateReseau($fb,$you,$insta,$twi)
		{
			if ($fb!="" || $fb!=NULL) {
				$sql = "UPDATE sur SET fbSur='$fb' WHERE id_sur=1";
				$this->bdd->exec($sql);
			}
			if ($you!="" || $you!=NULL) {
				$sql = "UPDATE sur SET youSur='$you' WHERE id_sur=1";
				$this->bdd->exec($sql);
			}
			if ($insta!="" || $insta!=NULL) {
				$sql = "UPDATE sur SET instaSur='$insta' WHERE id_sur=1";
				$this->bdd->exec($sql);
			}
			if ($twi!="" || $twi!=NULL) {
				$sql = "UPDATE sur SET twiSur='$twi' WHERE id_sur=1";
				$this->bdd->exec($sql);
			}
		}
		public function UpdateDate($arrivage,$prom)
		{
			if ($arrivage!="" || $arrivage!=NULL) {
				$sql = "UPDATE sur SET newArrivage_sur='$arrivage' WHERE id_sur=1";
				$this->bdd->exec($sql);
			}
			if ($prom!="" || $prom!=NULL) {
				$sql = "UPDATE sur SET newProm_sur='$prom' WHERE id_sur=1";
				$this->bdd->exec($sql);
			}
		}
		public function SetNullValue($champs)
		{
			$sql = "UPDATE sur SET $champs=NULL WHERE id_sur=1";
			$this->bdd->exec($sql);
		}
		public function GetSur()
		{
			$sql = "SELECT * FROM sur WHERE id_sur=1";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetch();
		}
	}




 ?>