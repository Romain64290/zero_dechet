<?php

/***** Dernière modification : 12/09/2016, Romain TALDU	*****/


require(__DIR__ .'/../../../include/verif_session.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');

// préparation connexion
$connect = new connection();
$atelier = new atelier($connect);


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
  		
     
  
</div><br>




    <table cellspacing="0" style="width: 100%; border: solid 1px black;  background: #E7E7E7; text-align: center; font-size: 8pt;">
        <tr>
            <th style="width: 3%;" >#</th>
            <th style="width: 25%;">Nom / Prénom</th>
            <th style="width: 12%; ">Téléphone</th>
            <th style="width: 25%; ">Email</th>
            <th style="width: 35%; ">Ateliers séléctionnés</th>

        </tr>
       
    </table>
<table cellspacing="0" style="width: 100%; border: solid 1px black; background: #F7F7F7; text-align: center; font-size: 9pt;border-collapse:collapse;">
       
<?php

	
 /* affichage de la liste des inscrits */
                                    
$afficheMembres=$atelier->afficheMembres(); 


$compteur = 1;

foreach($afficheMembres as $key){
			
		$id_membre=$key->id_membre;
		$nom=htmlspecialchars($key->nom_membre);
		$prenom=htmlspecialchars($key->prenom_membre);
		$telephone=htmlspecialchars($key->telephone);
		$email=htmlspecialchars($key->email);
		
		
		
	
		
		 
if($compteur % 2 == 0){echo "<tr  style=\"background: #FFF;\">";}else{echo "<tr  style=\"background: #f0F0F0;\">";}
			
            echo"<td style=\"width:3%;\">$compteur</td>
            <td style=\"width: 25%; \">$nom $prenom</td>
            <td style=\"width: 12%; \">$telephone</td>
            <td style=\"width: 25%; \">$email</td>      
            <td style=\"width: 35%; \">";
            

$afficheAtelierMembre=$atelier->afficheAtelierMembre($id_membre);

foreach($afficheAtelierMembre as $key){
    
            $nom_reunion=htmlspecialchars($key->nom_reunion);
            $date_reunion=$key->date_reunion; 
            
            echo "- $nom_reunion <br>";
    
}
			

echo"</td></tr>";
     
$compteur++;		                           
                  
}                 
                  
/* Fin de l'affichage de la liste des Inscrits */   


 

?>
 </table>	
 
 
</body>
</html>