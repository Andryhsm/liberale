<?php

session_start();


require_once 'cnx.php';

$mdp = $_POST['mdpI'];
$conf_mdp = $_POST['conf-mdpI'];
$nom = $_POST['nomI'];
$prenom = $_POST['prenomI'];
$email = $_POST['emailI'];
$tel = $_POST['telI'];
$rue = $_POST['rueI'];
$code_postal = $_POST['code-postalI'];
$ville = $_POST['villeI'];
$type_soin1 = htmlspecialchars($_POST['type-soin1']);
$type_soin2 = htmlspecialchars($_POST['type-soin2']);
$type_soin3 = htmlspecialchars($_POST['type-soin3']);
$type_soin4 = htmlspecialchars($_POST['type-soin4']);
$lieu_intervention = $_POST['lieu-intervention'];

$mdp = utf8_decode($mdp);
$conf_mdp = utf8_decode($conf_mdp);
$nom = utf8_decode($nom);
$prenom = utf8_decode($prenom);
$email = utf8_decode($email);
$tel = utf8_decode($tel);
$rue = utf8_decode($rue);
$code_postal = utf8_decode($code_postal);
$ville = utf8_decode($ville);
$type_soin1 = utf8_decode($type_soin1);
$type_soin2 = utf8_decode($type_soin2);
$type_soin3 = utf8_decode($type_soin3);
$type_soin4 = utf8_decode($type_soin4);
$lieu_intervention = utf8_decode($lieu_intervention);

$dossier = '../image-person/';

$fichier = basename($_FILES['photo']['name']);

//Verification fichier
if ($fichier == "") {
    $fichier = "avatar_inf.jpg";
    $reponse = $bdd->query("SELECT * FROM infirmiere WHERE emailI = '" . $email . "'");
    $val = $bdd->query("SELECT * FROM patient WHERE emailP = '" . $email . "'");

    $isa = $reponse->rowCount();
    $rep = $val->rowCount();

    if (($isa == "0") && ($rep == "0")) {
        if ($mdp == $conf_mdp) {

            $inf = $reponse->fetch();

            $bdd->exec("INSERT INTO `infirmiere` (`photo`,`nomI`,`prenomI`,`emailI`,`mdpI`,`telI`,`rueI`,`code-postalI`,`villeI`,`type-soinI1`,`type-soinI2`,`type-soinI3`,`type-soinI4`,`lieu-intervention`) VALUES ('$fichier','$nom','$prenom','$email','$mdp','$tel','$rue','$code_postal','$ville','$type_soin1','$type_soin2','$type_soin3','$type_soin4','$lieu_intervention')") or die(print_r($bdd->ErrorInfo()));

            $_SESSION['email'] = $email;
            $_SESSION['nomI'] = $nom;
            $_SESSION['prenomI'] = $prenom;
            $_SESSION['telI'] = $tel;
            $_SESSION['rueI'] = $rue;
            $_SESSION['code-postalI'] = $code_postal;
            $_SESSION['villeI'] = $ville;
            $_SESSION['type-soinI1'] = $type_soin1;
            $_SESSION['type-soinI2'] = $type_soin2;
            $_SESSION['type-soinI3'] = $type_soin3;
            $_SESSION['type-soinI4'] = $type_soin4;
            $_SESSION['lieu-intervention'] = $lieu_intervention;
            $_SESSION['photo'] = $fichier;
            echo 'succes';
        } else
            echo "Mot de passe non identique";
    } else {
        echo 'Email déjà employée';
    }
} else {
    $taille_maxi = 1000000;
    $taille = filesize($_FILES['photo']['tmp_name']);
    $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.PNG', '.JPG', '.JPEG', '.GIF');
    $extension = strrchr($_FILES['photo']['name'], '.');

    if (!in_array($extension, $extensions)) {
        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg';
    }
    if ($taille > $taille_maxi) {
        $erreur = 'Le fichier est trop gros!';
    }

    if (!isset($erreur)) {
        $fichier = strtr($fichier, 'Ã€Ã�Ã‚ÃƒÃ„Ã…Ã‡ÃˆÃ‰ÃŠÃ‹ÃŒÃ�ÃŽÃ�Ã’Ã“Ã”Ã•Ã–Ã™ÃšÃ›ÃœÃ�Ã Ã¡Ã¢Ã£Ã¤Ã¥Ã§Ã¨Ã©ÃªÃ«Ã¬Ã­Ã®Ã¯Ã°Ã²Ã³Ã´ÃµÃ¶Ã¹ÃºÃ»Ã¼Ã½Ã¿', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $dossier . $fichier)) {
            $reponse = $bdd->query("SELECT * FROM infirmiere WHERE emailI = '" . $email . "'");
            $val = $bdd->query("SELECT * FROM patient WHERE emailP = '" . $email . "'");

            $isa = $reponse->rowCount();
            $rep = $val->rowCount();

            if (($isa == "0") && ($rep == "0")) {
                if ($mdp == $conf_mdp) {

                    $inf = $reponse->fetch();

                    $bdd->exec("INSERT INTO `infirmiere` (`photo`,`nomI`,`prenomI`,`emailI`,`mdpI`,`telI`,`rueI`,`code-postalI`,`villeI`,`type-soinI1`,`type-soinI2`,`type-soinI3`,`type-soinI4`,`lieu-intervention`) VALUES ('$fichier','$nom','$prenom','$email','$mdp','$tel','$rue','$code_postal','$ville','$type_soin1','$type_soin2','$type_soin3','$type_soin4','$lieu_intervention')") or die(print_r($bdd->ErrorInfo()));

                    $_SESSION['email'] = $email;
                    $_SESSION['nomI'] = $nom;
                    $_SESSION['prenomI'] = $prenom;
                    $_SESSION['telI'] = $tel;
                    $_SESSION['rueI'] = $rue;
                    $_SESSION['code-postalI'] = $code_postal;
                    $_SESSION['villeI'] = $ville;
                    $_SESSION['type-soinI1'] = $type_soin1;
                    $_SESSION['type-soinI2'] = $type_soin2;
                    $_SESSION['type-soinI3'] = $type_soin3;
                    $_SESSION['type-soinI4'] = $type_soin4;
                    $_SESSION['lieu-intervention'] = $lieu_intervention;
                    $_SESSION['photo'] = $fichier;
                    echo 'succes';
                } else
                    echo "Mot de passe non identique";
            } else {
                echo 'Email déjà employée';
            }
        } else {
            echo 'Echec de l\'upload de l\'image. Veuillez choisir une image dont la taille est moins de 1Mo, ou dont le type est (png, gif, jpg, jpeg) !';
        }
    } else {
        echo $erreur;
    }
}
?>  