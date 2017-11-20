<?php

/***** Dernière modification : 27/10/2016, Romain TALDU	*****/

 class recherche {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
    }

      
/**************************************************************************
 Affichage des réunions
***************************************************************************/  

function afficheMembres()
  {
  
  try{
    	
		$select = $this->con->prepare('SELECT * 
		FROM membres 
                WHERE id_typemembre=1
                ORDER BY nom_membre ASC');	
				
		$select->execute();
		
		$data = $select->fetchAll(PDO::FETCH_OBJ);
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors des membres</b>\n";
	throw $e;
        exit;
    }
	 
 return $data;
  } 
  
  
      
/**************************************************************************
 Affichage des infos d'un membre
***************************************************************************/  

function InfosMembre($id_membre,$email)
  {
  
  try{
    	
		$select = $this->con->prepare('SELECT * 
		FROM membres 
                WHERE id_membre=:id_membre AND email=:email
                ');	
		
                $select->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
                $select->bindParam(':email', $email, PDO::PARAM_STR);	
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
  
 
  /***********************************************************************
 * Affiche les pesees d'un membre
 **************************************************************************/
  
 function affichePesee($id_membre)
  {
   
   
	try{
$select = $this->con->prepare('SELECT *
FROM membre_has_pesee
WHERE id_membre= :id_membre
ORDER BY date DESC, id_pesee DESC');

$select->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	

$select->execute();
	}
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'affichage des peseees d'un membre </b>\n";
	throw $e;
        exit;
    }

 $result = $select->fetchAll(PDO::FETCH_OBJ);
 
 return $result;
      
   
}

 /***********************************************************************
 * Affiche les pesees d'un membre
 **************************************************************************/
  
 function dernierePesse($id_membre)
  {
   
   
	try{
$select = $this->con->prepare('SELECT *
FROM membre_has_pesee
WHERE id_membre= :id_membre
ORDER BY date DESC, id_pesee DESC');

$select->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	

$select->execute();
	}
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'affichage des peseees d'un membre </b>\n";
	throw $e;
        exit;
    }

 $result = $select->fetch();
 
 return $result['date'];
      
   
}

/**************************************************************************
 Affichage des réunions
***************************************************************************/  

function afficheAtelierMembre($id_membre)
  {
  
  try{
    	
		$select = $this->con->prepare('SELECT * 
		FROM membre_has_reunion
                INNER JOIN reunion ON reunion.id_reunion=membre_has_reunion.id_reunion
                WHERE id_membre=:id_membre AND presence=1
		ORDER BY date_reunion DESC');
                
                $select->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);
				
		$select->execute();
		
		$data = $select->fetchAll(PDO::FETCH_OBJ);
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'affichage du listing des réunions</b>\n";
	throw $e;
        exit;
    }
	 
 return $data;
  } 
/**************************************************************************
 Affichage des infos d'un membre
***************************************************************************/  

function InfosMembre2($id_membre)
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
 Affichage projection d'un membre
***************************************************************************/  

function datasetMembre($id_membre,$type_dechet)
  {
  
  // calcul nombre personne du foyer
  $NbrPersFoyer=$this->InfosMembre2($id_membre);
   $NbrPersFoyer=$NbrPersFoyer['foyer_adulte']+$NbrPersFoyer['foyer_enfant']+$NbrPersFoyer['foyer_bebe'];
   
   
  
   
 // periode 1 (1/12 - 15/12)
 $select1 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2017-12-1 00:00:00' AND date < '2017-12-16 00:00:00'
 ");	
  $select1->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select1->execute();
  $data1 = $select1->fetch();
  $data1=number_format($data1['nbr'], 3, '.', '');
  
   // periode 2 (16/12 - 31/12)
 $select2 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2017-12-16 00:00:00' AND date < '2018-01-01 00:00:00'
 ");	
  $select2->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select2->execute();
  $data2 = $select2->fetch();
  $data2=number_format($data2['nbr'], 3, '.', '');
  
     // periode 3 (1/01 - 15/01)
 $select3 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2018-01-01 00:00:00' AND date < '2018-01-16 00:00:00'
 ");	
  $select3->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select3->execute();
  $data3 = $select3->fetch();
  $data3=number_format($data3['nbr'], 3, '.', '');
  
     // periode 4 (16/01 - 31/01)
 $select4 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2018-01-16 00:00:00' AND date < '2018-02-01 00:00:00'
 ");	
  $select4->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select4->execute();
  $data4 = $select4->fetch();
  $data4=number_format($data4['nbr'], 3, '.', '');
  
     // periode 5 (01/02 - 15/02)
 $select5 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2018-02-01 00:00:00' AND date < '2018-02-16 00:00:00'
 ");	
  $select5->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select5->execute();
  $data5 = $select5->fetch();
  $data5=number_format($data5['nbr'], 3, '.', '');
  
     // periode 6 (16/02 - 28/02)
 $select6 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2018-02-16 00:00:00' AND date < '2018-03-01 00:00:00'
 ");	
  $select6->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select6->execute();
  $data6 = $select6->fetch();
  $data6=number_format($data6['nbr'], 3, '.', '');
  
     // periode 7 (01/03 - 15/03)
 $select7 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2018-03-01 00:00:00' AND date < '2018-03-16 00:00:00'
 ");	
  $select7->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select7->execute();
  $data7 = $select7->fetch();
  $data7=number_format($data7['nbr'], 3, '.', '');
  
     // periode 8 (16/03 - 31/03)
 $select8 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2018-03-16 00:00:00' AND date < '2018-04-01 00:00:00'
 ");	
  $select8->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select8->execute();
  $data8 = $select8->fetch();
  $data8=number_format($data8['nbr'], 3, '.', '');
  
     // periode 9 (1/04 - 15/04)
 $select9 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2018-04-01 00:00:00' AND date < '2018-04-16 00:00:00'
 ");	
  $select9->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select9->execute();
  $data9 = $select2->fetch();
  $data9=number_format($data9['nbr'], 3, '.', '');
  
    // periode 10 (16/04 - 31/04)
 $select10 = $this->con->prepare("SELECT SUM(".$type_dechet.") AS nbr
 FROM membre_has_pesee
 WHERE id_membre=:id_membre AND date >= '2018-04-16 00:00:00' AND date < '2018-05-01 00:00:00'
 ");	
  $select10->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	
  $select10->execute();
  $data10 = $select10->fetch();
  $data10=number_format($data10['nbr'], 3, '.', '');
    
    
    $data=$data1.",".$data2.",".$data3.",".$data4.",".$data5.",".$data6.",".$data7.",".$data8.",".$data9.",".$data10;
    return $data;
  }

  
}