<?php 


	/**
	 * 
	 */
	class MessageModele
	{
		
		private $bdd;
	
		function __construct()
		{
			$co = new Connexion();
			$this->bdd = $co->connectBD();
		}
		public function AddMessage($idAdmin,$containMess,$img1,$img2,$img3)
		{
			$containMessbEnvoie = htmlentities($containMess, ENT_QUOTES, "UTF-8");
			$img1Envoie = htmlentities($img1, ENT_QUOTES, "UTF-8");
			$img2bEnvoie = htmlentities($img2, ENT_QUOTES, "UTF-8");
			$img3Envoie = htmlentities($img3, ENT_QUOTES, "UTF-8");
			$sql = "INSERT INTO message(idAdmin_mess,contain_mess,imageMess1,imageMess2,imageMess3,date_mess,heure_mess) VALUES('$idAdmin','$containMessbEnvoie','$img1Envoie','$img2bEnvoie','$img3Envoie',NOW(),NOW())";
			$this->bdd->exec($sql);
		}

		public function GetMessage()
		{
			$sql = "SELECT * FROM message INNER JOIN administration ON message.idAdmin_mess=administration.id_admin ORDER BY message.id_message DESC";
			$recup = $this->bdd->query($sql);
			return $donne = $recup->fetchall();
		}

		
	}








 ?>