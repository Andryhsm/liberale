<?php

	$nom = utf8_decode($_POST['nom']);
	$email = utf8_decode($_POST['email']);
	$sujetContact = utf8_decode($_POST['sujet']);
	$sujet = "Mr/Mme " .$nom. " - ".$sujetContact." .";
	$messageContact = utf8_decode($_POST['message']);

	$message = "<html><head><title></title></head><body><p> {$messageContact} <br><br> {$email}</p></body></html>";

	$headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $destinataire = "andrinirina.stian@imedsoft.fr; andry.andrianaivo@imedsoft.fr; thierry.halison@medsoft-sante.fr; rado.ratrimosoa@medsoft-sante.fr";

	try 
	{
		if(mail($destinataire, $sujet, $message, $headers))
		{
			echo("Votre message a bien été transmis ! Nous vous contacterons dans les plus bref délais! Merci de votre confiance!");
		} else {
			echo("Une erreur est survennue lors de l'envoi de votre message. Veuillez réessayer dans un instant s'il vous plaît! Merci. " .$message);
		}
	} catch (Exception $e) {
		echo("Erreur : " .$e->getMessage());
	}

?>