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
 Affichage des infos d'un membre
***************************************************************************/  

function NbreMembre()
  {
  
    // faire un sum des 3 colones
    
  try{
    	
		$select = $this->con->prepare('SELECT (SUM(foyer_adulte)+SUM(foyer_enfant)+SUM(foyer_bebe)) AS nbr
                FROM membres
                     ');
		
              
                $select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors du calcul de la somme des membres</b>\n";
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
 
 $projection=number_format($projection, 4, '.', '');

  return $projection;
  }
  
    /**************************************************************************
 Affichage projection d'un membre
***************************************************************************/  

function datasetMembre($id_membre,$type_dechet)
  {
  
  // calcul nombre personne du foyer
  //$NbrPersFoyer=$this->InfosMembre($id_membre);
   //$NbrPersFoyer=$NbrPersFoyer['foyer_adulte']+$NbrPersFoyer['foyer_enfant']+$NbrPersFoyer['foyer_bebe'];
   
   
  
   
 // periode 1 (1/12 - 15/12)
 $select1 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2017-12-1 00:00:00' AND date < '2017-12-16 00:00:00'
 ");	
  $select1->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select1->execute();
  $data1 = $select1->fetch();
  $data1=number_format($data1['nbr'], 4, '.', '');
  
   // periode 2 (16/12 - 31/12)
 $select2 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2017-12-16 00:00:00' AND date < '2018-01-01 00:00:00'
 ");	
  $select2->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select2->execute();
  $data2 = $select2->fetch();
  $data2=number_format($data2['nbr'], 4, '.', '');
  
     // periode 3 (1/01 - 15/01)
 $select3 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2018-01-01 00:00:00' AND date < '2018-01-16 00:00:00'
 ");	
  $select3->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select3->execute();
  $data3 = $select3->fetch();
  $data3=number_format($data3['nbr'], 4, '.', '');
  
     // periode 4 (16/01 - 31/01)
 $select4 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2018-01-16 00:00:00' AND date < '2018-02-01 00:00:00'
 ");	
  $select4->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select4->execute();
  $data4 = $select4->fetch();
  $data4=number_format($data4['nbr'], 4, '.', '');
  
     // periode 5 (01/02 - 15/02)
 $select5 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2018-02-01 00:00:00' AND date < '2018-02-16 00:00:00'
 ");	
  $select5->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select5->execute();
  $data5 = $select5->fetch();
  $data5=number_format($data5['nbr'], 4, '.', '');
  
     // periode 6 (16/02 - 28/02)
 $select6 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2018-02-16 00:00:00' AND date < '2018-03-01 00:00:00'
 ");	
  $select6->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select6->execute();
  $data6 = $select6->fetch();
  $data6=number_format($data6['nbr'], 4, '.', '');
  
     // periode 7 (01/03 - 15/03)
 $select7 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2018-03-01 00:00:00' AND date < '2018-03-16 00:00:00'
 ");	
  $select7->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select7->execute();
  $data7 = $select7->fetch();
  $data7=number_format($data7['nbr'], 4, '.', '');
  
     // periode 8 (16/03 - 31/03)
 $select8 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2018-03-16 00:00:00' AND date < '2018-04-01 00:00:00'
 ");	
  $select8->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select8->execute();
  $data8 = $select8->fetch();
  $data8=number_format($data8['nbr'], 4, '.', '');
  
     // periode 9 (1/04 - 15/04)
 $select9 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2018-04-01 00:00:00' AND date < '2018-04-16 00:00:00'
 ");	
  $select9->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select9->execute();
  $data9 = $select2->fetch();
  $data9=number_format($data9['nbr'], 4, '.', '');
  
    // periode 10 (16/04 - 31/04)
 $select10 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2018-04-16 00:00:00' AND date < '2018-05-01 00:00:00'
 ");	
  $select10->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select10->execute();
  $data10 = $select10->fetch();
  $data10=number_format($data10['nbr'], 4, '.', '');
    
    
    $data=$data1.",".$data2.",".$data3.",".$data4.",".$data5.",".$data6.",".$data7.",".$data8.",".$data9.",".$data10;
    return $data;
  }

    /**************************************************************************
 Affichage projection d'un membre
***************************************************************************/  

function datasetMembres($type_dechet)
  {
  
   
   
 // periode 1 (1/12 - 15/12)
 $select1 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE  date >= '2017-12-1 00:00:00' AND date < '2017-12-16 00:00:00'
 ");	
    $select1->execute();
  $data1 = $select1->fetch();
  $data1=number_format($data1['nbr'], 4, '.', '');
  
   // periode 2 (16/12 - 31/12)
 $select2 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE  date >= '2017-12-16 00:00:00' AND date < '2018-01-01 00:00:00'
 ");	
  $select2->execute();
  $data2 = $select2->fetch();
  $data2=number_format($data2['nbr'], 4, '.', '');
  
     // periode 3 (1/01 - 15/01)
 $select3 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE date >= '2018-01-01 00:00:00' AND date < '2018-01-16 00:00:00'
 ");	
  $select3->execute();
  $data3 = $select3->fetch();
  $data3=number_format($data3['nbr'], 4, '.', '');
  
     // periode 4 (16/01 - 31/01)
 $select4 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE  date >= '2018-01-16 00:00:00' AND date < '2018-02-01 00:00:00'
 ");	
  $select4->execute();
  $data4 = $select4->fetch();
  $data4=number_format($data4['nbr'], 4, '.', '');
  
     // periode 5 (01/02 - 15/02)
 $select5 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE  date >= '2018-02-01 00:00:00' AND date < '2018-02-16 00:00:00'
 ");	
  $select5->execute();
  $data5 = $select5->fetch();
  $data5=number_format($data5['nbr'], 4, '.', '');
  
     // periode 6 (16/02 - 28/02)
 $select6 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE  date >= '2018-02-16 00:00:00' AND date < '2018-03-01 00:00:00'
 ");	
 $select6->execute();
  $data6 = $select6->fetch();
  $data6=number_format($data6['nbr'], 4, '.', '');
  
     // periode 7 (01/03 - 15/03)
 $select7 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE date >= '2018-03-01 00:00:00' AND date < '2018-03-16 00:00:00'
 ");	
  $select7->execute();
  $data7 = $select7->fetch();
  $data7=number_format($data7['nbr'], 4, '.', '');
  
     // periode 8 (16/03 - 31/03)
 $select8 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE date >= '2018-03-16 00:00:00' AND date < '2018-04-01 00:00:00'
 ");	
  $select8->execute();
  $data8 = $select8->fetch();
  $data8=number_format($data8['nbr'], 4, '.', '');
  
     // periode 9 (1/04 - 15/04)
 $select9 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE date >= '2018-04-01 00:00:00' AND date < '2018-04-16 00:00:00'
 ");	
  $select9->execute();
  $data9 = $select2->fetch();
  $data9=number_format($data9['nbr'], 4, '.', '');
  
    // periode 10 (16/04 - 31/04)
 $select10 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE  date >= '2018-04-16 00:00:00' AND date < '2018-05-01 00:00:00'
 ");	
  $select10->execute();
  $data10 = $select10->fetch();
  $data10=number_format($data10['nbr'], 4, '.', '');
    
    
    $data=$data1.",".$data2.",".$data3.",".$data4.",".$data5.",".$data6.",".$data7.",".$data8.",".$data9.",".$data10;
    return $data;
  } 
}