<?php

/***** Dernière modification : 12/09/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');

$id_reunion=$_GET['id_reunion'];
$id_membre=$_GET['id_user'];

// préparation connexion
$connect = new connection();
$atelier = new atelier($connect);

$atelier->supUser($id_membre,$id_reunion); 

header('Location:edit_reunion.php?id_reunion='.$id_reunion);