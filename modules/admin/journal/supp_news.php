<?php

/***** Dernière modification : 17/06/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');


$id_news=$_GET['id_news'];

// préparation connexion
$connect = new connection();
$journal = new journal($connect);

$resultat=$journal->suppNews($id_news,$_SESSION["id_membre"]);


header('Location:index.php');
