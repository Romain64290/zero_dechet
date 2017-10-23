<?php

/***** Dernière modification : 12/09/2016, Romain TALDU	*****/


require(__DIR__ .'/../../../include/verif_session.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');

// préparation connexion
$connect = new connection();
$atelier = new atelier($connect);

$id_reunion=$_GET['id_reunion'];

$afficheReunion=$atelier->infosReunion($id_reunion);
$aficheInscrits=$atelier->afficheInscrits($id_reunion);


$date_expl=explode(" ",$afficheReunion['date_reunion']);
$heure=explode(":",$date_expl[1]);
$heure=$heure[0].":".$heure[1];
$date_debut=explode("-",$date_expl[0]);


 ?>

<!DOCTYPE html>

<html>
  <head>

<style>

td {
height:25px; 
text-align:left;
border-width:1px;
border-style:solid; 
border-color:black;
padding-left:5px;
}

h5{
color:#006997;
}

h4{
color:#006997;
}
</style>

  </head>
 
  <body class="hold-transition skin-blue sidebar-mini">
  
  	<div align="center"><img src="../../../dist/img/logo_zero.jpg" width="60" height="61"><h4>Atelier "Famille zéro déchet"</h4>
  		
            <h5> <b><?php echo htmlspecialchars($afficheReunion['nom_reunion']); ?>, le <?php echo "$date_debut[2]/$date_debut[1]"; ?> à <?php echo $heure; ?></b><br>
   	 <?php echo  htmlspecialchars($afficheReunion['adresse']); ?>, <?php echo  $afficheReunion['nom_commune']; ?> <br>
    <u>Participants</u> : <?php echo $afficheReunion['nbr_participants']; ?> / <?php  if($afficheReunion['limite_participants']=="0" ){echo "Illimité";}else{echo $afficheReunion['limite_participants'];} ?>
    </h5>
  
</div><br>




    <table cellspacing="0" style="width: 100%; border: solid 1px black;  background: #E7E7E7; text-align: center; font-size: 8pt;">
        <tr>
            <th style="width: 5%;" >#</th>
            <th style="width: 30%;">Nom / Prénom</th>
            <th style="width: 20%; ">Téléphone</th>
            <th style="width: 30%; ">Email</th>
            <th style="width: 15%; ">Commune</th>

        </tr>
       
    </table>
<table cellspacing="0" style="width: 100%; border: solid 1px black; background: #F7F7F7; text-align: center; font-size: 9pt;border-collapse:collapse;">
       
<?php

	
 /* affichage de la liste des inscrits */
                                    
$afficheInscrits=$atelier->afficheInscrits($id_reunion); 


$compteur = 1;

foreach($afficheInscrits as $key){
			
		$id_membre=$key->id_membre;
		$nom=htmlspecialchars($key->nom_membre);
		$prenom=htmlspecialchars($key->prenom_membre);
		$telephone=htmlspecialchars($key->telephone);
		$email=htmlspecialchars($key->email);
		$commune=$key->commune;
		
		
	
		
		 
if($compteur % 2 == 0){echo "<tr  style=\"background: #FFF;\">";}else{echo "<tr  style=\"background: #f0F0F0;\">";}
			
            echo"<td style=\"width:5%;\">$compteur</td>
            <td style=\"width: 30%; \">$nom $prenom</td>
            <td style=\"width: 20%; \">$telephone</td>
            <td style=\"width: 30%; \">$email</td>      
            <td style=\"width: 15%; \">$commune</td>";
			

echo"</tr>";
     
$compteur++;		                           
                  
}                 
                  
/* Fin de l'affichage de la liste des Inscrits */   


 

?>
 </table>	
 
 
</body>
</html>