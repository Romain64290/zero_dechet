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
$journal = new journal($connect);

$resultat=$journal->ajoutNews($_SESSION["id_membre"],$_POST['titre'],$_POST['news']);

header('Location:index.php?ajout=ok');

