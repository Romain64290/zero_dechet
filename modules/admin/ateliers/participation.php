<?php

/***** Dernière modification : 27/09/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');

$id_reunion=$_GET['id_reunion'];
$inscription=$_GET['inscription'];


// préparation connexion
$connect = new connection();
$atelier = new atelier($connect);

// verifie si le membre est déja inscrit.
$verifInscription=$atelier->VerifInscription($id_reunion, $_SESSION['id_membre']);  


if ($verifInscription==NULL){$AjouteReponse=$atelier->AjouteReponse($inscription,$id_reunion, $_SESSION['id_membre']); }
else{$ModifReponse=$atelier->ModifReponse($inscription,$id_reunion, $_SESSION['id_membre']);}


header('Location:index_participant.php');