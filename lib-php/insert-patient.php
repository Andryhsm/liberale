<?php

session_start();

require_once 'cnx.php';

$mdp = $_POST['mdpP'];
$conf_mdp = $_POST['conf-mdp'];
$nom = $_POST['nomP'];
$prenom = $_POST['prenomP'];
$email = $_POST['emailP'];
$tel = $_POST['telP'];
$rue = $_POST['rueP'];
$code_postal = $_POST['code-postalP'];
$ville = $_POST['villeP'];
$code_acces = $_POST['code-acces'];
$etage = $_POST['etage'];
$info_sup = $_POST['info-sup'];
$type_soin1 = htmlspecialchars($_POST['type-soinP1']);
$type_soin2 = htmlspecialchars($_POST['type-soinP2']);
$type_soin3 = htmlspecialchars($_POST['type-soinP3']);
$type_soin4 = htmlspecialchars($_POST['type-soinP4']);
$frequence_soin1 = htmlspecialchars($_POST['frequence-soin1']);
$frequence_soin2 = htmlspecialchars($_POST['frequence-soin2']);
$frequence_soin3 = htmlspecialchars($_POST['frequence-soin3']);
$frequence_soin4 = htmlspecialchars($_POST['frequence-soin4']);
$heure1 = htmlspecialchars($_POST['heure1']);
$heure2 = htmlspecialchars($_POST['heure2']);
$heure3 = htmlspecialchars($_POST['heure3']);
$heure4 = htmlspecialchars($_POST['heure4']);

$dossier = '../image-person/';

$fichier = basename($_FILES['photo']['name']);

//Verification fichier
if ($fichier == "") {
    $reponse = $bdd->query("SELECT * FROM infirmiere WHERE emailI = '" . $email . "'");
    $val = $bdd->query("SELECT * FROM patient WHERE emailP = '" . $email . "'");

    $isa = $reponse->rowCount();
    $rep = $val->rowCount();

    if (($isa == "0") && ($rep == "0")) {
        if ($mdp == $conf_mdp) {
            $patient = $val->fetch();
            $bdd->exec("INSERT INTO `patient` (`photo`,`nomP`,`prenomP`,`emailP`,`mdpP`,`telP`,`rueP`,`code-postalP`,`villeP`,`code-acces`,`etage`,`info-sup`,`type-soinP1`,`type-soinP2`,`type-soinP3`,`type-soinP4`,`frequence-soin1`,`frequence-soin2`,`frequence-soin3`,`frequence-soin4`,`heure1`,`heure2`,`heure3`,`heure4`) VALUES ('avatar_patient.png','$nom','$prenom','$email','$mdp','$tel','$rue','$code_postal','$ville','$code_acces','$etage','$info_sup','$type_soin1','$type_soin2','$type_soin3','$type_soin4','$frequence_soin1','$frequence_soin2','$frequence_soin3','$frequence_soin4','$heure1','$heure2','$heure3','$heure4')") or die(print_r($bdd->ErrorInfo()));
            $_SESSION['email'] = $email;
            $_SESSION['nomP'] = $nom;
            $_SESSION['prenomP'] = $prenom;
            $_SESSION['telP'] = $tel;
            $_SESSION['rueP'] = $rue;
            $_SESSION['code-postalP'] = $code_postal;
            $_SESSION['villeP'] = $ville;
            $_SESSION['code-acces'] = $code_acces;
            $_SESSION['etage'] = $etage;
            $_SESSION['info-sup'] = $info_sup;
            $_SESSION['type-soinP1'] = $type_soin1;
            $_SESSION['type-soinP2'] = $type_soin2;
            $_SESSION['type-soinP3'] = $type_soin3;
            $_SESSION['type-soinP4'] = $type_soin4;
            $_SESSION['frequence-soin1'] = $frequence_soin1;
            $_SESSION['frequence-soin2'] = $frequence_soin2;
            $_SESSION['frequence-soin3'] = $frequence_soin3;
            $_SESSION['frequence-soin4'] = $frequence_soin4;
            $_SESSION['photo'] = 'avatar_patient.png';
            $_SESSION['heure1'] = $heure1;
            $_SESSION['heure2'] = $heure2;
            $_SESSION['heure3'] = $heure3;
            $_SESSION['heure4'] = $heure4;
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
                    $patient = $val->fetch();
                    $bdd->exec("INSERT INTO `patient` (`photo`,`nomP`,`prenomP`,`emailP`,`mdpP`,`telP`,`rueP`,`code-postalP`,`villeP`,`code-acces`,`etage`,`info-sup`,`type-soinP1`,`type-soinP2`,`type-soinP3`,`type-soinP4`,`frequence-soin1`,`frequence-soin2`,`frequence-soin3`,`frequence-soin4`,`heure1`,`heure2`,`heure3`,`heure4`) VALUES ('$fichier','$nom','$prenom','$email','$mdp','$tel','$rue','$code_postal','$ville','$code_acces','$etage','$info_sup','$type_soin1','$type_soin2','$type_soin3','$type_soin4','$frequence_soin1','$frequence_soin2','$frequence_soin3','$frequence_soin4','$heure1','$heure2','$heure3','$heure4')") or die(print_r($bdd->ErrorInfo()));
                    $_SESSION['email'] = $email;
                    $_SESSION['nomP'] = $nom;
                    $_SESSION['prenomP'] = $prenom;
                    $_SESSION['telP'] = $tel;
                    $_SESSION['rueP'] = $rue;
                    $_SESSION['code-postalP'] = $code_postal;
                    $_SESSION['villeP'] = $ville;
                    $_SESSION['code-acces'] = $code_acces;
                    $_SESSION['etage'] = $etage;
                    $_SESSION['info-sup'] = $info_sup;
                    $_SESSION['type-soinP1'] = $type_soin1;
                    $_SESSION['type-soinP2'] = $type_soin2;
                    $_SESSION['type-soinP3'] = $type_soin3;
                    $_SESSION['type-soinP4'] = $type_soin4;
                    $_SESSION['frequence-soin1'] = $frequence_soin1;
                    $_SESSION['frequence-soin2'] = $frequence_soin2;
                    $_SESSION['frequence-soin3'] = $frequence_soin3;
                    $_SESSION['frequence-soin4'] = $frequence_soin4;
                    $_SESSION['photo'] = $fichier;
                    $_SESSION['heure1'] = $heure1;
                    $_SESSION['heure2'] = $heure2;
                    $_SESSION['heure3'] = $heure3;
                    $_SESSION['heure4'] = $heure4;
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