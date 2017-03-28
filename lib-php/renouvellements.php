<?php
	
	require 'connexion.php';

	// déclarations et instantiation des variables a envoyer recu par AJAX
	$departement = utf8_decode($_POST['departement']);
	$datelivraison = utf8_decode($_POST['datelivraison']);
	$heure = utf8_decode($_POST['heure']);
	$livreur = utf8_decode($_POST['livreur']);
	$mail = utf8_decode($_POST['mail']);
	$nom = utf8_decode($_POST['nom']);
	$prenom = utf8_decode($_POST['prenom']);
	$adresse = utf8_decode($_POST['adresse']);
	$adresse2 = utf8_decode($_POST['adresse2']);
	$mobile = utf8_decode($_POST['mobile']);
	$fixe = utf8_decode($_POST['fixe']);
	$commande = utf8_decode($_POST['commande']);
	$genre = utf8_decode($_POST['genre']);
	$codepostal = utf8_decode($_POST['codepostal']);
	$ville = utf8_decode($_POST['ville']);
	$type_patient = utf8_decode($_POST['type_patient']);
	$code = utf8_decode($_POST['code']);

	$nomComplet = utf8_decode($_POST['nomComplet']);
	$contact = utf8_decode($_POST['contact']);
	$adresseComplet = utf8_decode($_POST['adresseComplet']);


	$date_insertion = date('Y-m-d');


	// déclaration et instanciation des variables a envoyer par mail
	$message = utf8_decode(nl2br(($_POST['message'])));

	// sujet du mail
	$sujet = 'Demande de renouvellement ( '.$nom.' - '.$codepostal.' '.$ville.')';
	// destinataire du mail
	$destinataire = 'rado.ratrimosoa@medsoft-sante.fr; fanou.ralaivao@medsoft-sante.fr; infos@medsoft-sante.fr; renouvellement@medsoft-sante.fr; thierry.halison@medsoft-sante.fr; anny-laure.benga@medsoft-sante.fr';

	$header ='Content-Type: text/html; charset="ISO-8859-1"'."\n";
	$header .='Content-Transfer-Encoding: 8bit';

	try 
	{
		$requete = $bdd->prepare(" INSERT INTO renouvellements(departement, datelivraison, heure, livreur, mail, nom, adresse, mobile, commande, genre, type_patient, code, date_insertion) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$requete->execute(array($departement, $datelivraison, $heure, $livreur, $mail, $nomComplet, $adresseComplet, $contact, $commande, $genre, $type_patient, $code, $date_insertion)) or die(print_r($requete->errorInfo(), TRUE));
		
		echo "La commande a bien été ajouté ! Vérifier votre boite mail après confirmation. Merci de votre confiance!";

		mail($destinataire, $sujet, $message, $header);
		$requete->closeCursor();
	} 
	catch (Exception $e) 
	{
		echo " Erreur lors de l'ajout de la nouvelle commande !";
	}

	// Fin de l'insertion
?>