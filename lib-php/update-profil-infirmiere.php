<?php

    require_once "crypter-mdp.php";

    require_once 'cnx.php';

    $id = $_POST['idI'];
    $mdp = $_POST['mdpI'];
    $conf_mdp = $_POST['conf-mdpI'];
    $nom = utf8_decode($_POST['nomI']);
    $prenom = utf8_decode($_POST['prenomI']);
    $email = utf8_decode($_POST['emailI']);
    $tel = $_POST['telI'];
    $rue = utf8_decode($_POST['rueI'];
    $code_postal = $_POST['code-postalI']);
    $ville = utf8_decode($_POST['villeI']);
    $type_soin1 = utf8_decode(htmlspecialchars($_POST['type-soin1']));
    $type_soin2 = utf8_decode(htmlspecialchars($_POST['type-soin2']));
    $type_soin3 = utf8_decode(htmlspecialchars($_POST['type-soin3']));
    $type_soin4 = utf8_decode(htmlspecialchars($_POST['type-soin4']));
    $lieu_intervention = utf8_decode($_POST['lieu-intervention']);

    $dossier = '../image-person/';

    $fichier = basename($_FILES['photo']['name']);
    $taille_maxi = 5000000;
    $taille = filesize($_FILES['photo']['tmp_name']);
    $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.PNG', '.JPG', '.JPEG', '.GIF');
    $extension = strrchr($_FILES['photo']['name'], '.');

    if(($type_soin1 == "") && ($type_soin2 == "") && ($type_soin3=="") && ($type_soin4=="") && ($lieu_intervention=="") && ($fichier != ""))
    {
        $bdd->exec("UPDATE `infirmiere` SET `photo` = '".$fichier."', `nomI` = '".$nom."',`prenomI` = '".$prenom."',`emailI` = '".$email."',`mdpI` = '".$mdp."',`telI` = '".$tel."',`rueI` = '".$rue."',`code-postalI` = '".$code_postal."',`villeI` = '".$ville."' WHERE `id`= '".$id."'") or die(print_r($bdd->ErrorInfo()));

                        echo 'Votre profil a bien été modifié';
    } 
    else if($fichier == "")
    {
        if(($type_soin1 == "") && ($type_soin2 == "") && ($type_soin3=="") && ($type_soin4=="") && ($lieu_intervention==""))
        {
            $bdd->exec("UPDATE `infirmiere` SET `nomI` = '".$nom."',`prenomI` = '".$prenom."',`emailI` = '".$email."',`mdpI` = '".$mdp."',`telI` = '".$tel."',`rueI` = '".$rue."',`code-postalI` = '".$code_postal."',`villeI` = '".$ville."' WHERE `id`= '".$id."'") or die(print_r($bdd->ErrorInfo()));

                            echo 'Votre profil a bien été modifié';
        } else {
            $bdd->exec("UPDATE `infirmiere` SET `nomI` = '".$nom."',`prenomI` = '".$prenom."',`emailI` = '".$email."',`mdpI` = '".$mdp."',`telI` = '".$tel."',`rueI` = '".$rue."',`code-postalI` = '".$code_postal."',`villeI` = '".$ville."',`type-soinI1` = '".$type_soin1."',`type-soinI2` = '".$type_soin2."',`type-soinI3` = '".$type_soin3."',`type-soinI4` = '".$type_soin4."',`lieu-intervention` = '".$lieu_intervention."' WHERE `id`= '".$id."'") or die(print_r($bdd->ErrorInfo()));

                            echo 'Votre profil a bien été modifié';
        }
    }

    else 
    {
        if (!in_array($extension, $extensions)) 
        {
            $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg';
            echo($erreur);
        }
        else if ($taille > $taille_maxi) 
        {
            $erreur = 'Le fichier est trop gros!';
            echo($erreur);
        }
        else if(!isset($erreur))
        {
            $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            if(move_uploaded_file($_FILES['photo']['tmp_name'], $dossier . $fichier)) 
            { 
                if ($mdp == $conf_mdp) 
                {

                    $bdd->exec("UPDATE `infirmiere` SET `photo` = '".$fichier."',`nomI` = '".$nom."',`prenomI` = '".$prenom."',`emailI` = '".$email."',`mdpI` = '".$mdp."',`telI` = '".$tel."',`rueI` = '".$rue."',`code-postalI` = '".$code_postal."',`villeI` = '".$ville."',`type-soinI1` = '".$type_soin1."',`type-soinI2` = '".$type_soin2."',`type-soinI3` = '".$type_soin3."',`type-soinI4` = '".$type_soin4."',`lieu-intervention` = '".$lieu_intervention."' WHERE `id`= '".$id."'") or die(print_r($bdd->ErrorInfo()));

                    echo 'Votre profil a bien été modifié';
                    //header("Location: ../index.html");
               } else
                    {echo "Mot de passe non identique";}
            }
            else 
            {
                echo "Echec de l\'upload de l\'image. Veuillez choisir une image dont la taille est moins de 1Mo, ou dont le type est (png, gif, jpg, jpeg) !";
            }
        }
    }
?>  