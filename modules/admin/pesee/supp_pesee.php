<?php

/***** Dernière modification : 17/06/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');


$id_pesee=$_GET['id_pesee'];

// préparation connexion
$connect = new connection();
$pesee = new pesee($connect);

$resultat=$pesee->suppPesee($id_pesee);


header('Location:index.php');
