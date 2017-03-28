<?php
 session_start(); 
	
	require 'cnx.php';

	$email = $_POST['email'];
	$mdp = $_POST['mdp'];

	try 
	{
		$reponse = $bdd->query("SELECT * FROM infirmiere WHERE emailI = '".$email."'");
		$query = $bdd->query("SELECT * FROM patient WHERE emailP = '".$email."'");

			$isa = $reponse->rowCount();
			$rep = $query->rowCount();

			if ($isa == "1") 
			{
				$val = $reponse->fetch();
				if(($val['emailI'] == $email))
				{
					if (($val['mdpI'] == $mdp)) 
					{
						$_SESSION['email'] = $email;
						$_SESSION['nomI'] = $val["nomI"];
						$_SESSION['prenomI'] = $val["prenomI"];
						$_SESSION['telI'] = $val["telI"];
                                                $_SESSION['rueI'] = $val["rueI"];
                                                $_SESSION['code-postalI'] = $val["code-postalI"];
                                                $_SESSION['villeI'] = $val["villeI"];
						$_SESSION['type-soinI1'] = $val["type-soinI1"];
                                                $_SESSION['type-soinI2'] = $val["type-soinI2"];
                                                $_SESSION['type-soinI3'] = $val["type-soinI3"];
                                                $_SESSION['type-soinI4'] = $val["type-soinI4"];
                                                $_SESSION['lieu-intervention'] = $val["lieu-intervention"];
						$_SESSION['photo'] = $val['photo'];


						echo("Infirmière");
					} else 
					{
						echo("Mot de passe incorrect !");
					}
				}
			} else 
			{
				if($rep =="1")
				{
					$patient = $query->fetch();
					if(($patient['emailP'] == $email))
					{
						if (($patient['mdpP'] == $mdp)) 
						{
							$_SESSION['email'] = $email;
							$_SESSION['nomP'] = $patient['nomP'];
							$_SESSION['prenomP'] = $patient['prenomP'];
							$_SESSION['telP'] = $patient['telP'];
                                                        $_SESSION['rueP'] = $patient['rueP'];
                                                        $_SESSION['code-postalP'] = $patient['code-postalP'];
							$_SESSION['villeP'] = $patient['villeP'];
                                                        $_SESSION['code-acces'] = $patient['code-acces'];
                                                        $_SESSION['etage'] = $patient['etage'];
                                                        $_SESSION['info-sup'] = $patient['info-sup'];
							$_SESSION['type-soinP1'] = $patient['type-soinP1'];
                                                        $_SESSION['type-soinP2'] = $patient['type-soinP2'];
                                                        $_SESSION['type-soinP3'] = $patient['type-soinP3'];
                                                        $_SESSION['type-soinP4'] = $patient['type-soinP4'];
                                                        $_SESSION['frequence-soin1'] = $patient['frequence-soin1'];
                                                        $_SESSION['frequence-soin2'] = $patient['frequence-soin2'];
                                                        $_SESSION['frequence-soin3'] = $patient['frequence-soin3'];
                                                        $_SESSION['frequence-soin4'] = $patient['frequence-soin4'];
                                                        $_SESSION['photo'] = $patient['photo'];
							$_SESSION['heure1'] = $patient['heure1'];
                                                        $_SESSION['heure2'] = $patient['heure2'];
                                                        $_SESSION['heure3'] = $patient['heure3'];
                                                        $_SESSION['heure4'] = $patient['heure4'];

							echo("Patient");
						} else 
						{
							echo("Mot de passe incorrect !");
						}
					}
					else
					{
						echo("Cette adresse e-mail n'existe pas !");
					}
				} else {
					echo("Cette adresse e-mail n'existe pas !");
				}
			}

	}
	catch (PDOException $e) {
		die('Erreur : ' . $e->getMessage());
	}

?>