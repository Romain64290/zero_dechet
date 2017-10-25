<?php

/***** Dernière modification : 27/10/2016, Romain TALDU	*****/

 class dashboard {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
    }
/**************************************************************************
 Affichage des infos d'un membre
***************************************************************************/  

function InfosMembre($id_membre)
  {
  
  try{
    	
		$select = $this->con->prepare('SELECT * 
		FROM membres 
                WHERE id_membre=:id_membre
                ');	
		
                $select->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
                $select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'affichage des infos d'un membre</b>\n";
	throw $e;
        exit;
    }
	 
 return $data;
  } 
  
  /**************************************************************************
 Affichage des cumuls des pesées d'un membre
***************************************************************************/  

function Cumul($id_membre)
  {
  
$OM = $this->con->prepare('SELECT SUM(ordures_menageres) AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre
 ');	
$OM->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
$OM->execute();
$dataOM = $OM->fetch();

$tri = $this->con->prepare('SELECT SUM(tri_selectif) AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre
 ');	
$tri->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
$tri->execute();
$datatri = $tri->fetch();

$compost = $this->con->prepare('SELECT SUM(compost) AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre
 ');	
$compost->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
$compost->execute();
$datacompost = $compost->fetch();

$verre = $this->con->prepare('SELECT SUM(verre  ) AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre
 ');	
$verre->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
$verre->execute();
$dataverre = $verre->fetch();

$textile = $this->con->prepare('SELECT SUM(dechetterie) AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre
 ');	
$textile->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
$textile->execute();
$datatextile = $textile->fetch();


$marron = $this->con->prepare('SELECT SUM(bac_marron) AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre
 ');	
$marron->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
$marron->execute();
$datamarron = $marron->fetch();

$dataOM=number_format($dataOM['nbr'], 4, '.', '');
$datatri=number_format($datatri['nbr'], 4, '.', '');
$datacompost=number_format($datacompost['nbr'], 4, '.', '');
$dataverre=number_format($dataverre['nbr'], 4, '.', '');
$datatextile=number_format($datatextile['nbr'], 4, '.', '');
$datamarron=number_format($datamarron['nbr'], 4, '.', '');

$data=$dataOM.",".$datatri.",".$datacompost.",".$dataverre.",".$datatextile.",".$datamarron;	
    
 return $data;
  } 
  
   /**************************************************************************
 Affichage projection d'un membre
***************************************************************************/  

function projection($id_membre,$type_dechet)
  {
 
    
 // reucpération de la somme de pesee   
   $result=$this->Cumul($id_membre);
   $result= explode(",",$result);
      

   
  // recupération de la date de la derniere pesee
   if($type_dechet==0){$type_dechet2="ordures_menageres";}
   if($type_dechet==1){$type_dechet2="tri_selectif";}
   if($type_dechet==2){$type_dechet2="compost";}
   if($type_dechet==3){$type_dechet2="verre";}
   if($type_dechet==4){$type_dechet2="dechetterie";}
   if($type_dechet==5){$type_dechet2="bac_marron";}
   
   try{
    	
		$select = $this->con->prepare('SELECT * 
		FROM membre_has_pesee 
                WHERE id_membre=:id_membre AND '.$type_dechet2.' <>0
                ORDER BY date DESC
                ');	
		
                $select->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
                $select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'affichage des infos d'un membre</b>\n";
	throw $e;
        exit;
                
    }
   
   
  // calcul du nombre de jour entre la derniere pesse et le 1er decembre
   $derniere_date=$data['date']; 
   $datetime1 = date_create($derniere_date);
   $datetime2 = date_create('2017-12-01');
   $interval = date_diff($datetime1, $datetime2);
   $nbr_jour=$interval->days;
   

 // calcul nombre personne du foyer
  $NbrPersFoyer=$this->InfosMembre($id_membre);
   $NbrPersFoyer=$NbrPersFoyer['foyer_adulte']+$NbrPersFoyer['foyer_enfant']+$NbrPersFoyer['foyer_bebe'];
   
 // Projection SUM / nbre personne / nbre jour * 365
 $projection=$result[$type_dechet]/$NbrPersFoyer/$nbr_jour*365;


   
   //return $result[$type_dechet];
   // return $nbr_jour;
    //return $NbrPersFoyer;
    return $projection;
  }
  
}