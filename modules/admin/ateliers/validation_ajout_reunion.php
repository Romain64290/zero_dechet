<?php

/***** Dernière modification : 17/06/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');

// remplace les virgule par des points
// verfication float a faire..............................................................

// préparation connexion
$connect = new connection();
$atelier = new atelier($connect);

$result=$atelier->ajoutReunion($_POST['nom'],$_POST['description'],$_POST['type_reunion'],$_POST['date'],$_POST['heure_debut'],$_POST['adresse'],$_POST['ville'],$_POST['lien_map'],$_POST['limite']);

header('Location:index_admin.php?ajout=ok');