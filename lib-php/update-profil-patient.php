<?php

require_once 'cnx.php';

$id = addslashes($_POST['idP']);
$mdp = addslashes($_POST['mdpP']);
$conf_mdp = addslashes($_POST['conf-mdp']);
$nom = addslashes($_POST['nomP']);
$prenom = addslashes($_POST['prenomP']);
$email = addslashes($_POST['emailP']);
$tel = addslashes($_POST['telP']);
$rue = addslashes($_POST['rueP']);
$code_postal = addslashes($_POST['code-postalP']);
$ville = addslashes($_POST['villeP']);
$code_acces = addslashes($_POST['code-acces']);
$etage = addslashes($_POST['etage']);
$info_sup = addslashes($_POST['info-sup']);
$type_soin1 = addslashes($_POST['type-soinP1']);
$type_soin2 = addslashes($_POST['type-soinP2']);
$type_soin3 = addslashes($_POST['type-soinP3']);
$type_soin4 = addslashes($_POST['type-soinP4']);
$frequence_soin1 = addslashes($_POST['frequence-soin1']);
$frequence_soin2 = addslashes($_POST['frequence-soin2']);
$frequence_soin3 = addslashes($_POST['frequence-soin3']);
$frequence_soin4 = addslashes($_POST['frequence-soin4']);
$heure1 = addslashes($_POST['heure1']);
$heure2 = addslashes($_POST['heure2']);
$heure3 = addslashes($_POST['heure3']);
$heure4 = addslashes($_POST['heure4']);

$dossier = '../image-person/';

$fichier = basename($_FILES['photo']['name']);

if ($fichier == "") {
    if (($mdp == "") && ($conf_mdp == "")) {

        if (($type_soin1 == "") && ($type_soin2 == "") && ($type_soin3 == "") && ($type_soin4 == "") && ($frequence_soin1 == "") && ($frequence_soin2 == "") && ($frequence_soin3 == "") && ($frequence_soin4 == "") && ($heure1 = "") && ($heure2 == "") && ($heure3 == "") && ($heure4 == "")) {

            $bdd->exec("UPDATE `patient` SET `nomP` = '" . $nom . "',`prenomP` = '" . $prenom . "',`emailP` = '" . $email . "',`telP` = '" . $tel . "',`rueP` = '" . $rue . "',`code-postalP` = '" . $code_postal . "',`villeP` = '" . $ville . "',`code-acces` = '" . $code_acces . "',`etage` = '" . $etage . "',`info-sup` = '" . $info_sup . "' WHERE `id`= '" . $id . "'") or die(print_r($bdd->ErrorInfo()));

            echo 'succes';
        } else {

            $bdd->exec("UPDATE `patient` SET `nomP` = '" . $nom . "',`prenomP` = '" . $prenom . "',`emailP` = '" . $email . "',`telP` = '" . $tel . "',`rueP` = '" . $rue . "',`code-postalP` = '" . $code_postal . "',`villeP` = '" . $ville . "',`code-acces` = '" . $code_acces . "',`etage` = '" . $etage . "',`info-sup` = '" . $info_sup . "',`type-soinP1` ='" . $type_soin1 . "',`type-soinP2` = '" . $type_soin2 . "',`type-soinP3` = '" . $type_soin3 . "',`type-soinP4` = '" . $type_soin4 . "',`frequence-soin1` = '" . $frequence_soin1 . "',`frequence-soin2` = '" . $frequence_soin2 . "',`frequence-soin3` = '" . $frequence_soin3 . "',`frequence-soin4` = '" . $frequence_soin4 . "' ,`heure1` = '" . $heure1 . "',`heure2` = '" . $heure2 . "',`heure3` = '" . $heure3 . "',`heure4` ='" . $heure4 . "' WHERE `id`= '" . $id . "'") or die(print_r($bdd->ErrorInfo()));

            echo 'succes';
        }
    } else {

        if ($mdp == $conf_mdp) {

            if (($type_soin1 == "") && ($type_soin2 == "") && ($type_soin3 == "") && ($type_soin4 == "") && ($frequence_soin1 == "") && ($frequence_soin2 == "") && ($frequence_soin3 == "") && ($frequence_soin4 == "") && ($heure1 = "") && ($heure2 == "") && ($heure3 == "") && ($heure4 == "")) {
                $bdd->exec("UPDATE `patient` SET `nomP` = '" . $nom . "',`prenomP` = '" . $prenom . "',`emailP` = '" . $email . "',`mdpP` = '" . $mdp . "',`telP` = '" . $tel . "',`rueP` = '" . $rue . "',`code-postalP` = '" . $code_postal . "',`villeP` = '" . $ville . "',`code-acces` = '" . $code_acces . "',`etage` = '" . $etage . "',`info-sup` = '" . $info_sup . "' WHERE `id`= '" . $id . "'") or die(print_r($bdd->ErrorInfo()));

                echo 'succes';
            } else {
                $bdd->exec("UPDATE `patient` SET `nomP` = '" . $nom . "',`prenomP` = '" . $prenom . "',`emailP` = '" . $email . "',`mdpP` = '" . $mdp . "',`telP` = '" . $tel . "',`rueP` = '" . $rue . "',`code-postalP` = '" . $code_postal . "',`villeP` = '" . $ville . "',`code-acces` = '" . $code_acces . "',`etage` = '" . $etage . "',`info-sup` = '" . $info_sup . "',`type-soinP1` ='" . $type_soin1 . "',`type-soinP2` = '" . $type_soin2 . "',`type-soinP3` = '" . $type_soin3 . "',`type-soinP4` = '" . $type_soin4 . "',`frequence-soin1` = '" . $frequence_soin1 . "',`frequence-soin2` = '" . $frequence_soin2 . "',`frequence-soin3` = '" . $frequence_soin3 . "',`frequence-soin4` = '" . $frequence_soin4 . "' ,`heure1` = '" . $heure1 . "',`heure2` = '" . $heure2 . "',`heure3` = '" . $heure3 . "',`heure4` ='" . $heure4 . "' WHERE `id`= '" . $id . "'") or die(print_r($bdd->ErrorInfo()));

                echo 'succes';
            }
        } else {
            echo "Mot de passe non identique";
        }
    }
} else {

    $taille_maxi = 5000000;
    $taille = filesize($_FILES['photo']['tmp_name']);
    $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.PNG', '.GIF', '.JPG', '.JPEG');
    $extension = strrchr($_FILES['photo']['name'], '.');

    if (!in_array($extension, $extensions)) {
        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg';
    }
    if ($taille > $taille_maxi) {
        $erreur = 'Le fichier est trop gros!';
    }

    if (!isset($erreur)) {
        $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $dossier . $fichier)) {
            if (($mdp == "") && ($conf_mdp == "")) {

                if (($type_soin1 == "") && ($type_soin2 == "") && ($type_soin3 == "") && ($type_soin4 == "") && ($frequence_soin1 == "") && ($frequence_soin2 == "") && ($frequence_soin3 == "") && ($frequence_soin4 == "") && ($heure1 = "") && ($heure2 == "") && ($heure3 == "") && ($heure4 == "")) {

                    $bdd->exec("UPDATE `patient` SET `photo` = '" . $fichier . "',`nomP` = '" . $nom . "',`prenomP` = '" . $prenom . "',`emailP` = '" . $email . "',`telP` = '" . $tel . "',`rueP` = '" . $rue . "',`code-postalP` = '" . $code_postal . "',`villeP` = '" . $ville . "',`code-acces` = '" . $code_acces . "',`etage` = '" . $etage . "',`info-sup` = '" . $info_sup . "' WHERE `id`= '" . $id . "'") or die(print_r($bdd->ErrorInfo()));

                    echo 'succes';
                } else {

                    $bdd->exec("UPDATE `patient` SET `photo` = '" . $fichier . "',`nomP` = '" . $nom . "',`prenomP` = '" . $prenom . "',`emailP` = '" . $email . "',`telP` = '" . $tel . "',`rueP` = '" . $rue . "',`code-postalP` = '" . $code_postal . "',`villeP` = '" . $ville . "',`code-acces` = '" . $code_acces . "',`etage` = '" . $etage . "',`info-sup` = '" . $info_sup . "',`type-soinP1` ='" . $type_soin1 . "',`type-soinP2` = '" . $type_soin2 . "',`type-soinP3` = '" . $type_soin3 . "',`type-soinP4` = '" . $type_soin4 . "',`frequence-soin1` = '" . $frequence_soin1 . "',`frequence-soin2` = '" . $frequence_soin2 . "',`frequence-soin3` = '" . $frequence_soin3 . "',`frequence-soin4` = '" . $frequence_soin4 . "' ,`heure1` = '" . $heure1 . "',`heure2` = '" . $heure2 . "',`heure3` = '" . $heure3 . "',`heure4` ='" . $heure4 . "' WHERE `id`= '" . $id . "'") or die(print_r($bdd->ErrorInfo()));

                    echo 'succes';
                }
            } else {

                if ($mdp == $conf_mdp) {

                    if (($type_soin1 == "") && ($type_soin2 == "") && ($type_soin3 == "") && ($type_soin4 == "") && ($frequence_soin1 == "") && ($frequence_soin2 == "") && ($frequence_soin3 == "") && ($frequence_soin4 == "") && ($heure1 = "") && ($heure2 == "") && ($heure3 == "") && ($heure4 == "")) {
                        $bdd->exec("UPDATE `patient` SET `photo` = '" . $fichier . "',`nomP` = '" . $nom . "',`prenomP` = '" . $prenom . "',`emailP` = '" . $email . "',`mdpP` = '" . $mdp . "',`telP` = '" . $tel . "',`rueP` = '" . $rue . "',`code-postalP` = '" . $code_postal . "',`villeP` = '" . $ville . "',`code-acces` = '" . $code_acces . "',`etage` = '" . $etage . "',`info-sup` = '" . $info_sup . "' WHERE `id`= '" . $id . "'") or die(print_r($bdd->ErrorInfo()));

                        echo 'succes';
                    } else {
                        $bdd->exec("UPDATE `patient` SET `photo` = '" . $fichier . "',`nomP` = '" . $nom . "',`prenomP` = '" . $prenom . "',`emailP` = '" . $email . "',`mdpP` = '" . $mdp . "',`telP` = '" . $tel . "',`rueP` = '" . $rue . "',`code-postalP` = '" . $code_postal . "',`villeP` = '" . $ville . "',`code-acces` = '" . $code_acces . "',`etage` = '" . $etage . "',`info-sup` = '" . $info_sup . "',`type-soinP1` ='" . $type_soin1 . "',`type-soinP2` = '" . $type_soin2 . "',`type-soinP3` = '" . $type_soin3 . "',`type-soinP4` = '" . $type_soin4 . "',`frequence-soin1` = '" . $frequence_soin1 . "',`frequence-soin2` = '" . $frequence_soin2 . "',`frequence-soin3` = '" . $frequence_soin3 . "',`frequence-soin4` = '" . $frequence_soin4 . "' ,`heure1` = '" . $heure1 . "',`heure2` = '" . $heure2 . "',`heure3` = '" . $heure3 . "',`heure4` ='" . $heure4 . "' WHERE `id`= '" . $id . "'") or die(print_r($bdd->ErrorInfo()));

                        echo 'succes';
                    }
                } else {
                    echo "Mot de passe non identique";
                }
            }
        } else {
            echo "Echec de l\'upload de l\'image. Veuillez choisir une image dont la taille est moins de 5Mo, ou dont le type est (png, gif, jpg, jpeg) !";
        }
    } else {
        echo $erreur;
    }
}
?>  