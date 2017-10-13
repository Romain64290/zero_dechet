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
$pesee = new pesee($connect);

// transforme les "," en "."
$om=strtr($_POST['om'],",",".");
$cs=strtr($_POST['cs'],",",".");
$compost=strtr($_POST['compost'],",",".");
$verre=strtr($_POST['verre'],",",".");
$decheterie=strtr($_POST['decheterie'],",",".");
$bac_marron=strtr($_POST['bac_marron'],",",".");

$om=keepOnlyNumeric($om);
$cs=keepOnlyNumeric($cs);
$compost=keepOnlyNumeric($compost);
$verre=keepOnlyNumeric($verre);
$decheterie=keepOnlyNumeric($decheterie);
$bac_marron=keepOnlyNumeric($bac_marron);

function keepOnlyNumeric($text){ 
   $strOnlyNumeric = ''; 
   $len = strlen($text); 
   for($i = 0; $i < $len; $i++) { 
      if(strpos("0123456789.", $text[$i]) !== FALSE) $strOnlyNumeric .= $text[$i]; 
   } 
   return $strOnlyNumeric; 
} 


$resultat=$pesee->ajoutPesee($_SESSION["id_membre"],$_POST['date'],$om,$cs,$compost,$verre,$decheterie,$bac_marron,$_POST['remarques']);


header('Location:index.php?ajout=ok');

