<?php
session_start();
if ((!isset($_SESSION['email'])) || (empty($_SESSION['email']))) {
    header("Location: ../login.html");
}

include_once "cnx.php";

$req = $bdd->query("SELECT * FROM patient WHERE emailP = '" . $_SESSION['email'] . "'");
$data = $req->fetch();
?>

<!DOCTYPE html>
<html lang="fr-FR" class="no-js">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta name="viewport" content="width=device-width">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>modification profil</title>

        <meta name="robots" content="noindex,follow">
        <link rel="stylesheet" href="../others/index.css" type="text/css" media="all">
        <!-- 
                <link rel="stylesheet" id="bootstrap-css" href="./others/bootstrap.min.css" type="text/css"> -->
        <link rel="stylesheet" id="animate-css" href="../others/animate.css" type="text/css">
        <link rel="stylesheet" id="magee-shortcode-css" href="../others/shortcode.css" type="text/css">
        <link rel="stylesheet" id="wds_frontend-css" href="../others/wds_frontend.css" type="text/css" media="all">
        <link rel="stylesheet" id="wds_effects-css" href="../others/wds_effects.css" type="text/css" media="all">
        <link rel="stylesheet" id="wds_font-awesome-css" href="../others/font-awesome(1).css" type="text/css" media="all">
        <link rel="stylesheet" id="wonderplugin-slider-css-css" href="../others/wonderpluginsliderengine.css" type="text/css" media="all">
        <link rel="stylesheet" id="parent-style-css" href="../others/style.css" type="text/css" media="all">

        <link href="../bootstrap/css/paper.css" rel="stylesheet">
        <script src="../bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="./others/jquery.js.téléchargement"></script>

        <script type="text/javascript">
            /* <![CDATA[ */
            var object = {"ajaxurl": "http:\/\/localhost\/wordpress\/wp-admin\/admin-ajax.php"};
            /* ]]> */
        </script>

        <script src="js/jssor.slider-22.2.10.min.js" type="text/javascript"></script>

        <!-- Meta OG tags by Kiwi Social Sharing Plugin -->
        <meta property="og:type" content="article"> 
        <meta property="og:title" content="Alchem">
        <meta property="og:image" content="http://localhost/wordpress/wp-content/plugins/kiwi-social-share/admin/images/placeholder-image.png">
        <meta property="og:url" content="http://localhost/wordpress/">
        <meta property="og:site_name" content="">
        <meta property="article:published_time" content="2017-02-28T18:11:19+00:00">
        <meta property="article:modified_time" content="2017-02-28T18:11:19+00:00">
        <meta property="og:updated_time" content="2017-02-28T18:11:19+00:00">
        <!--/end meta tags by Kiwi Social Sharing Plugin --><style id="cw_css">#about {
                margin-top:14rem!important
            }
            .col-sm-12,div.col-sm-8.col-sm-offset-2 {
                margin-top:-70rem!important
            }
            .alert
            {
                position: absolute;
                top: 35%;
                left: 5%;
                z-index: 0;
                background-color: rgba(84, 46, 90, 0.66);
                border-radius: 10px;
                border-color: rgb(84, 46, 90);
                font-size: 1.4em;
            }
            .btn_up
            {
                position: fixed;
                bottom: 10px;
                right: 15px;
                height: 80px;
                width: 80px;
                padding: 0;
            }

            #returnOnTop
            {
                display: none;
                cursor: pointer;
            }</style><!-- <meta name="vfb" version="2.9.2" /> -->
        <style type="text/css">
        </style></head>
    <body class="home page-template page-template-template-frontpage page-template-template-frontpage-php page page-id-40 has-slider">
        <div class="wrapper ">
            <div class="top-wrap">
                <header class="header-style-1 header-wrap  logo-left">


                    <div class="main-header " style="display: block;">
                        <div class="container">
                            <div class="logo-box alchem_header_style alchem_default_logo">
                                <img class="site-logo normal_logo" alt="" src="../others/Logo-ousoft-HD.png">

                            </div>
                            <button class="site-nav-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <i class="fa fa-bars fa-2x"></i>
                            </button>
                            <nav class="site-nav" role="navigation" style="">
                                <ul id="menu-main" class="main-nav">
                                    <li id="menu-item-71" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-71"><a href="../carte.php"><span class="menu-item-label">Carte</span></a></li>
                                    <li id="menu-item-71" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-71"><a href="./modifierprofil.php"><span class="menu-item-label">Modifier mon profil</span></a></li>
                                    <li id="menu-item-71" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-71"><a href="../contact1.html"><span class="menu-item-label">Contact</span></a></li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-71"><a href="./deconnexion.php"><span class="menu-item-label">Deconnexion</span></a></li>
                                </ul>                    
                            </nav>
                        </div>
                    </div>
                    <!-- sticky header -->
                    <div class="fxd-header logo-left" style="top: 0px; display: none;">
                        <div class="container">
                            <div class="logo-box text-left alchem_header_style alchem_default_logo">
                                <a href="#">
                                    <img class="site-logo normal_logo" alt="" src="../others/Logo-ousoft-HD.png">
                                </a>

                            </div>
                            <button class="site-nav-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <i class="fa fa-bars fa-2x"></i>
                            </button>
                            <nav class="site-nav" role="navigation" style="">
                                <ul id="menu-main1" class="main-nav">
                                    <li id="menu-item-71" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-71"><a href="../carte.php"><span class="menu-item-label">Carte</span></a></li>
                                    <li id="menu-item-71" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-71"><a href="./modifierprofil.php"><span class="menu-item-label">Modifier mon profil</span></a></li>
                                    <li id="menu-item-71" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-71"><a href="../contact1.html"><span class="menu-item-label">Contact</span></a></li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-71"><a href="./deconnexion.php"><span class="menu-item-label">Deconnexion</span></a></li>
                                </ul>                    
                            </nav>
                        </div>
                    </div>

                    <div class="clear"></div>
                </header>     
            </div>
            <div id="alchem-home-sections">

                <section class="section magee-section alchem-home-section-1 alchem-home-style-0" id="section-2">
                    <div class="section-content">
                        <div class="container">
                            <div class="alchem-animated animated fadeInRight" data-animationduration="0.9" data-animationtype="fadeInRight" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
                                <div class="magee-promo-box">
                                    <div class="promo-info">
                                        <h2 style="text-align: center" class="section-title alchem_section_4_title"><strong>Modifier votre profil</strong></h2><br>

                                        <div class="row">
                                            <form method="POST" action="update-profil-patient.php" id="form-filter" class="form-horizontal" enctype="multipart/form-data">
                                                <fieldset>
                                                    <div class="col-lg-7">

                                                        <div class="form-group">
                                                            <h4>Vos informations personnels :</h4><br>
                                                            <label for="nom" class="col-sm-2 control-label">Nom:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" placeholder="nom" required="" class="form-control" name="nomP" id="nomP" value="<?php echo($data['nomP']); ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group hidden">
                                                            <div class="col-sm-9">
                                                                <input type="text" placeholder="nom" required="" class="form-control" name="idP" id="idP" value="<?php echo($data['id']); ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="prenom" class="col-sm-2 control-label">Prenom:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" placeholder="prenom" required="" class="form-control" name="prenomP" id="prenomP" value="<?php echo($data['prenomP']); ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="email" class="col-sm-2 control-label">Email:</label>
                                                            <div class="col-sm-9">
                                                                <input type="email" required="" placeholder="email" class="form-control" name="emailP" id="emailP" value="<?php echo($data['emailP']); ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="mdp" class="col-sm-2 control-label">Mot de passe:</label>
                                                            <div class="col-sm-9">
                                                                <input type="password" placeholder="mot de passe" class="form-control" name="mdpP" id="mdpP">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="conf-mdp" class="col-sm-2 control-label"></label>
                                                            <div class="col-sm-9">
                                                                <input type="password" placeholder="confirmation du mot de passe" class="form-control" name="conf-mdp" id="conf-mdp">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tel" class="col-sm-2 control-label">Téléphone:</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" required="" placeholder="téléphone" class="form-control" name="telP" id="telP" value="<?php echo($data['telP']); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tel" class="col-sm-2 control-label">Adresse:</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" required="" placeholder="numéro et nom de rue" class="form-control" name="rueP" id="rueP" value="<?php echo($data['rueP']); ?>">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <input type="number" required="" placeholder="code postal" class="form-control" name="code-postalP" id="code-postalP" value="<?php echo($data['code-postalP']); ?>">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <input type="text" required="" placeholder="ville" class="form-control" name="villeP" id="villeP" value="<?php echo($data['villeP']); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tel" class="col-sm-2 control-label"></label>
                                                            <div class="col-sm-3">
                                                                <input type="text" placeholder="code d'accès" class="form-control" name="code-acces" id="code-acces" value="<?php echo($data['code-acces']); ?>">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <input type="text" placeholder="etage" class="form-control" name="etage" id="etage" value="<?php echo($data['etage']); ?>">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <input type="text" placeholder="info supplémentaire" class="form-control" name="info-sup" id="info-sup" value="<?php echo($data['info-sup']); ?>">
                                                            </div>
                                                        </div><br><br>


                                                        <div class="panel panel-info" id="listeSoins">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title">Vos informations de soins :</h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="">
                                                                    <p><b><?php echo($data['type-soinP1']); ?></b> : <u><?php echo($data['frequence-soin1']) ?> fois</u> par jour, aux heures <b><u><?php echo($data['heure1']) ?></u></b>.</p>
                                                                    <p><b><?php echo($data['type-soinP2']); ?></b> : <u><?php echo($data['frequence-soin2']) ?> fois</u> par jour, aux heures <b><u><?php echo($data['heure2']) ?></u></b>.</p>
                                                                    <p><b><?php echo($data['type-soinP3']); ?></b> : <u><?php echo($data['frequence-soin3']) ?> fois</u> par jour, aux heures <b><u><?php echo($data['heure3']) ?></u></b>.</p>
                                                                    <p><b><?php echo($data['type-soinP4']); ?></b> : <u><?php echo($data['frequence-soin4']) ?> fois</u> par jour, aux heures <b><u><?php echo($data['heure4']) ?></u></b>.</p>
                                                                </div>
                                                                <div class="btn btn-warning" id="changesoins" onClick="changeSoins();"> Changer mes informations de soins</div>
                                                            </div>
                                                        </div>

                                                        <div class="hidden" id="infosSoins">
                                                            <h4>Changer vos informations de soins :</h4><br>

                                                            <div class="form-group col-sm-6">
                                                                <label for="tel" class="col-sm-5 control-label">Type de soin:</label>
                                                                <div class="col-sm-7">
                                                                    <select name="type-soinP1" required="" onchange="autre()" class="form-control" id="select1">
                                                                        <option value="">-----choisir-----</option>
                                                                        <option value="Cicatrisation">Cicatrisation</option>
                                                                        <option value="Stomarhérapie">Stomathérapie</option>
                                                                        <option value="Perfusion">Perfusion</option>
                                                                        <option value="Sondage">Sondage</option>
                                                                    </select>                    
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label for="tel" class="col-sm-5 control-label">Fréquence des soins:</label>
                                                                <div class="col-sm-7">
                                                                    <select name="frequence-soin1" required="" class="form-control">
                                                                        <option value="">-----choisir-----</option>
                                                                        <option value="1">X 1</option>
                                                                        <option value="2">X 2</option>
                                                                        <option value="3">X 3</option>
                                                                        <option value="4">X 4</option>
                                                                        <option value="5">X 5</option>
                                                                    </select>                    
                                                                </div>
                                                            </div>
                                                            <script>
                                                                $(document).ready(function ()
                                                                {
                                                                    $('[name="type-soinP1"]').val("<?php echo($data['type-soinP1']) ?>");
                                                                });
                                                            </script>
                                                            <div class="form-group">
                                                                <label for="heure" class="col-sm-2 control-label">Heure des soins:</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" required="" placeholder="heure par fréquence de soin" class="form-control" name="heure1" id="heure1">
                                                                </div>
                                                            </div>

                                                            <script>

                                                                function autre() {
                                                                    var selection = document.getElementById("select1").value;
                                                                    if (selection === "Cicatrisation")
                                                                    {
                                                                        var element = document.getElementById("cica1");
                                                                        element.parentNode.removeChild(element);
                                                                        var element = document.getElementById("cica2");
                                                                        element.parentNode.removeChild(element);
                                                                        var element = document.getElementById("cica3");
                                                                        element.parentNode.removeChild(element);
                                                                    }
                                                                    else if (selection === "Stomarhérapie")
                                                                    {
                                                                        var element = document.getElementById("stoma1");
                                                                        element.parentNode.removeChild(element);
                                                                        var element = document.getElementById("stoma2");
                                                                        element.parentNode.removeChild(element);
                                                                        var element = document.getElementById("stoma3");
                                                                        element.parentNode.removeChild(element);
                                                                    }
                                                                    else if (selection === "Perfusion")
                                                                    {
                                                                        var element = document.getElementById("perf1");
                                                                        element.parentNode.removeChild(element);
                                                                        var element = document.getElementById("perf2");
                                                                        element.parentNode.removeChild(element);
                                                                        var element = document.getElementById("perf3");
                                                                        element.parentNode.removeChild(element);
                                                                    }
                                                                    else if (selection === "Sondage")
                                                                    {
                                                                        var element = document.getElementById("sondage1");
                                                                        element.parentNode.removeChild(element);
                                                                        var element = document.getElementById("sondage2");
                                                                        element.parentNode.removeChild(element);
                                                                        var element = document.getElementById("sondage3");
                                                                        element.parentNode.removeChild(element);
                                                                    }
                                                                    document.querySelector("#autre").style.display = (window.getComputedStyle(document.querySelector('#autre')).display == 'none') ? "block" : "hide";
                                                                }

                                                            </script>
                                                            <div id="autre" style="display: none;">
                                                                <div class="form-group col-sm-6">
                                                                    <label for="tel" class="col-sm-5 control-label">Autre type de soin:</label>
                                                                    <div class="col-sm-7">
                                                                        <select name="type-soinP2" onchange="autre1()" class="form-control" id="select2">
                                                                            <option value="">-----choisir-----</option>
                                                                            <option value="Cicatrisation" id="cica1">Cicatrisation</option>
                                                                            <option value="Stomarhérapie" id="stoma1">Stomathérapie</option>
                                                                            <option value="Perfusion" id="perf1">Perfusion</option>
                                                                            <option value="Sondage" id="sondage1">Sondage</option>
                                                                        </select>                    
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-6">
                                                                    <label for="tel" class="col-sm-5 control-label">Fréquence des soins:</label>
                                                                    <div class="col-sm-7">
                                                                        <select name="frequence-soin2" class="form-control">
                                                                            <option value="">-----choisir-----</option>
                                                                            <option value="1">X 1</option>
                                                                            <option value="2">X 2</option>
                                                                            <option value="3">X 3</option>
                                                                            <option value="4">X 4</option>
                                                                            <option value="5">X 5</option>
                                                                        </select>                    
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="heure" class="col-sm-2 control-label">Heure des soins:</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" placeholder="heure par fréquence de soin" class="form-control" name="heure2" id="heure2">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <script>

                                                                function autre1() {
                                                                    var selection = document.getElementById("select2").value;
                                                                    if (selection === "Cicatrisation")
                                                                    {
                                                                        var element = document.getElementById("cica2");
                                                                        element.parentNode.removeChild(element);
                                                                        var element = document.getElementById("cica3");
                                                                        element.parentNode.removeChild(element);
                                                                    }
                                                                    if (selection === "Stomarhérapie")
                                                                    {
                                                                        var element = document.getElementById("stoma2");
                                                                        element.parentNode.removeChild(element);
                                                                        var element = document.getElementById("stoma3");
                                                                        element.parentNode.removeChild(element);
                                                                    }
                                                                    if (selection === "Perfusion")
                                                                    {
                                                                        var element = document.getElementById("perf2");
                                                                        element.parentNode.removeChild(element);
                                                                        var element = document.getElementById("perf3");
                                                                        element.parentNode.removeChild(element);
                                                                    }
                                                                    if (selection === "Sondage")
                                                                    {
                                                                        var element = document.getElementById("sondage2");
                                                                        element.parentNode.removeChild(element);
                                                                        var element = document.getElementById("sondage3");
                                                                        element.parentNode.removeChild(element);
                                                                    }
                                                                    document.querySelector("#autre1").style.display = (window.getComputedStyle(document.querySelector('#autre1')).display == 'none') ? "block" : "hide";
                                                                }

                                                            </script>
                                                            <div id="autre1" style="display: none;">
                                                                <div class="form-group col-sm-6">
                                                                    <label for="tel" class="col-sm-5 control-label">Autre type de soin:</label>
                                                                    <div class="col-sm-7">
                                                                        <select name="type-soinP3" onchange="autre2()" class="form-control" id="select3">
                                                                            <option value="">-----choisir-----</option>
                                                                            <option value="Cicatrisation" id="cica2">Cicatrisation</option>
                                                                            <option value="Stomarhérapie" id="stoma2">Stomathérapie</option>
                                                                            <option value="Perfusion" id="perf2">Perfusion</option>
                                                                            <option value="Sondage" id="sondage2">Sondage</option>
                                                                        </select>                    
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-6">
                                                                    <label for="tel" class="col-sm-5 control-label">Fréquence des soins:</label>
                                                                    <div class="col-sm-7">
                                                                        <select name="frequence-soin3" class="form-control">
                                                                            <option value="">-----choisir-----</option>
                                                                            <option value="1">X 1</option>
                                                                            <option value="2">X 2</option>
                                                                            <option value="3">X 3</option>
                                                                            <option value="4">X 4</option>
                                                                            <option value="5">X 5</option>
                                                                        </select>                    
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="heure" class="col-sm-2 control-label">Heure des soins:</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" placeholder="heure par fréquence de soin" class="form-control" name="heure3" id="heure3">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <script>

                                                                function autre2() {
                                                                    var selection = document.getElementById("select3").value;
                                                                    if (selection === "Cicatrisation")
                                                                    {
                                                                        var element = document.getElementById("cica3");
                                                                        element.parentNode.removeChild(element);
                                                                    }
                                                                    if (selection === "Stomarhérapie")
                                                                    {
                                                                        var element = document.getElementById("stoma3");
                                                                        element.parentNode.removeChild(element);
                                                                    }
                                                                    if (selection === "Perfusion")
                                                                    {
                                                                        var element = document.getElementById("perf3");
                                                                        element.parentNode.removeChild(element);
                                                                    }
                                                                    if (selection === "Sondage")
                                                                    {
                                                                        var element = document.getElementById("sondage3");
                                                                        element.parentNode.removeChild(element);
                                                                    }
                                                                    document.querySelector("#autre2").style.display = (window.getComputedStyle(document.querySelector('#autre2')).display == 'none') ? "block" : "hide";
                                                                }

                                                            </script>
                                                            <div id="autre2" style="display: none;">
                                                                <div class="form-group col-sm-6">
                                                                    <label for="tel" class="col-sm-5 control-label">Autre type de soin:</label>
                                                                    <div class="col-sm-7">
                                                                        <select name="type-soinP4" class="form-control">
                                                                            <option value="">-----choisir-----</option>
                                                                            <option value="Cicatrisation" id="cica3">Cicatrisation</option>
                                                                            <option value="Stomarhérapie" id="stoma3">Stomathérapie</option>
                                                                            <option value="Perfusion" id="perf3">Perfusion</option>
                                                                            <option value="Sondage" id="sondage3">Sondage</option>
                                                                        </select>                    
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-6">
                                                                    <label for="tel" class="col-sm-5 control-label">Fréquence des soins:</label>
                                                                    <div class="col-sm-7">
                                                                        <select name="frequence-soin4" class="form-control">
                                                                            <option value="">-----choisir-----</option>
                                                                            <option value="1">X 1</option>
                                                                            <option value="2">X 2</option>
                                                                            <option value="3">X 3</option>
                                                                            <option value="4">X 4</option>
                                                                            <option value="5">X 5</option>
                                                                        </select>                    
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="heure" class="col-sm-2 control-label">Heure des soins:</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" placeholder="heure par fréquence de soin" class="form-control" name="heure4" id="heure4">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <br>
                                                        <div class="form-group">
                                                            <label for="ajout" class="col-sm-2 control-label"></label>
                                                            <div class="col-sm-8">
                                                                <button type="submit" id="insert" class="btn btn-primary">Valider les changements&nbsp;&nbsp;&nbsp; <i class="glyphicon glyphicon-edit"></i> </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-5">
                                                        <div class="panel panel-info">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title">Photo:</h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="col-md-9">
                                                                    <input name="photo" id="photo" type="file" class="hidden">
                                                                    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                                                                    <span class="help-block"></span>
                                                                </div><br>
                                                                <div class="row col-lg-offset-2">
                                                                    <div id="image_preview">
                                                                        <img class="thumbnail img-responsive" style="vertical-align: center;" width="300px" heigth="300px" src="../image-person/<?php echo($data['photo']); ?>">
                                                                        <blockqoute id="titre"><?php echo($data['photo']); ?></blockqoute>
                                                                    </div><br>
                                                                    <button class="btn btn-warning" id="changeTof" onClick="change();"> Changer ma photo de profil</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

            <button class="btn btn-primary hidden btn-lg" id="triggerwarning" data-toggle="modal" data-target="#loginerror"></button>
            <div class="modal" id="loginerror">
                <div class="modal-dialog">
                    <div class="modal-content alert alert-dismissible alert-info col-lg-12">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="ferme">&times;</button>
                            <h4 class="modal-title" style="text-align: center;">Message</h4>
                        </div>
                        <div class="modal-body">
                            <div class="warning" id="erreur_inscription"></div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>


                    <div class="btn_up">
                      <img src="img/retour-en-haut.png" class="img-responsive" id="returnOnTop">
                    </div>


            <!--Footer-->
            <footer class="">

                <div class="footer-info-area">
                    <div class="container text-center alchem_footer_social_icon_1"> 
                        <!-- <ul class="footer-sns"><li><a  rel="" href="http://localhost/wordpress/#" data-placemeynt="top" data-toggle="tooltip" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li><li><a  rel="" href="http://localhost/wordpress/#" data-placement="top" data-toggle="tooltip" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li><li><a  rel="" href="http://localhost/wordpress/#" data-placement="top" data-toggle="tooltip" title="" data-original-title="YouTube"><i class="fa fa-youtube"></i></a></li><li><a  rel="" href="http://localhost/wordpress/#" data-placement="top" data-toggle="tooltip" title="" data-original-title="Skype"><i class="fa fa-skype"></i></a></li><li><a  rel="" href="http://localhost/wordpress/#" data-placement="top" data-toggle="tooltip" title="" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a></li><li><a  rel="" href="http://localhost/wordpress/#" data-placement="top" data-toggle="tooltip" title="" data-original-title="Email"><i class="fa fa-envelope"></i></a></li></ul>                    <div class="clearfix"></div>
                        -->
                        <div class="site-info">
                            <a href="#" >OUSOFT SAS</a>. 38 Rue de la convention, 94270, Le Kremlin-Bicêtre.</div>
                    </div>
                </div>          
            </footer>
        </div>  

        <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../others/owl.carousel.min.js.téléchargement"></script>
        <script type="text/javascript">
                                                                        /* <![CDATA[ */
                                                                        var alchem_params = {"ajaxurl": "http:\/\/localhost\/wordpress\/wp-admin\/admin-ajax.php", "themeurl": "http:\/\/localhost\/wordpress\/wp-content\/themes\/alchem", "responsive": "yes", "site_width": "1170px", "sticky_header": "yes", "show_search_icon": "yes", "slider_autoplay": "yes", "slideshow_speed": "3000", "portfolio_grid_pagination_type": "pagination", "blog_pagination_type": "pagination", "global_color": "#fdd200", "admin_ajax_nonce": "2ed3a22947", "admin_ajax": "http:\/\/localhost\/wordpress\/wp-admin\/admin-ajax.php", "isMobile": "0", "footer_sticky": "0"};
                                                                        /* ]]> */
        </script>
        <script type="text/javascript" src="../others/main.js.téléchargement">
        </script>
        <script type="text/javascript">
            function change()
            {
                $('#photo').trigger('click');
            };

            function changeSoins()
            {
                $('#listeSoins').addClass('hidden');
                $('#infosSoins').removeClass('hidden');
                $('[name="type-soinP1"]').val("");
                $('[name="type-soinP2"]').val("");
                $('[name="type-soinP3"]').val("");
                $('[name="type-soinP4"]').val("");
                
                $('[name="frequence-soin1"]').val("");
                $('[name="frequence-soin2"]').val("");
                $('[name="frequence-soin3"]').val("");
                $('[name="frequence-soin4"]').val("");
                
                $('[name="heure1"]').val("");
                $('[name="heure2"]').val("");
                $('[name="heure3"]').val("");
                $('[name="heure4"]').val("");
            };

            $(function () {
                // A chaque sélection de fichier
                $('#form-filter').find('input[name="photo"]').on('change', function (e)
                {
                    var files = $(this)[0].files;

                    if (files.length > 0) {
                        var file = files[0],
                                $image_preview = $('#image_preview');

                        // Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
                        $image_preview.find('.thumbnail').removeClass('hidden');
                        $image_preview.find('img').attr('src', window.URL.createObjectURL(file));
                        $image_preview.find('h4').html(file.name);
                        $image_preview.find('#titre').html(file.name);
                    }
                });
            });

            $('#insert').click(function (e)
            {
                e.preventDefault();

                var form = $('#form-filter').get(0);
                var formData = new FormData(form);// get the form data
                // on envoi formData vers mail.php
                $.ajax({
                    type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url: 'update-profil-patient.php', // the url where we want to POST
                    data: formData, // our data object
                    dataType: 'text', // what type of data do we expect back from the server
                    processData: false,
                    contentType: false,
                    success: function (server_response)
                    {
                        if (server_response === "succes")
                        {
                            window.location.href = "carte.html";
                        }
                        else
                        {
                            $('#erreur_inscription').html('<p>' + server_response + '</p>');
                            $('#triggerwarning').trigger('click');
                            setTimeout(function () {
                                $('#ferme').trigger('click');
                            }, 4000);
                        }
                    },
                    error: function (server_response)
                    {
                        alert(server_response);
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function ()
            {
                $('[name="type-soinP1"]').val("<?php echo($data['type-soinP1']); ?>");
                $('[name="type-soinP2"]').val("<?php echo($data['type-soinP2']); ?>");
                $('[name="type-soinP3"]').val("<?php echo($data['type-soinP3']); ?>");
                $('[name="type-soinP4"]').val("<?php echo($data['type-soinP4']); ?>");
                
                $('[name="frequence-soin1"]').val("<?php echo($data['frequence-soin1']); ?>");
                $('[name="frequence-soin2"]').val("<?php echo($data['frequence-soin2']); ?>");
                $('[name="frequence-soin3"]').val("<?php echo($data['frequence-soin3']); ?>");
                $('[name="frequence-soin4"]').val("<?php echo($data['frequence-soin4']); ?>");
                
                $('[name="heure1"]').val("<?php echo($data['heure1']); ?>");
                $('[name="heure2"]').val("<?php echo($data['heure2']); ?>");
                $('[name="heure3"]').val("<?php echo($data['heure3']); ?>");
                $('[name="heure4"]').val("<?php echo($data['heure4']); ?>");
                
                $('#returnOnTop').hide();
                $('#returnOnTop').click(function () {
                    //e.preventDefault();
                    $('html,body').animate({scrollTop: 0}, 'slow');
                });
            });

            $(window).scroll(function ()
            {
                if ($(window).scrollTop() == 0)
                    $('#returnOnTop').fadeOut();
                else
                    $('#returnOnTop').fadeIn();
            });

        </script>
    </body>
</html>
