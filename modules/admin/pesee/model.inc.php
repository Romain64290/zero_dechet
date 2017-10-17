<?php

/***** Dernière modification : 27/10/2016, Romain TALDU	*****/

 class pesee {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
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
 * Suppression d'une pesee
 **************************************************************************/
  
 function suppPesee($id_pesee,$id_membre)
  {
 

// suppression d'une pesee
try{ 	 	
$delete = $this->con->prepare('DELETE 
		FROM membre_has_pesee
		WHERE id_pesee  = :id_pesee AND id_membre  = :id_membre');
						
$delete->bindParam(':id_pesee', $id_pesee, PDO::PARAM_INT);
$delete->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);
$delete->execute();	
		}

 	catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de la suppression d'une pesee </b>\n";
            throw $e;
  }}

  
/***********************************************************************
 * Ajout d'une pesee
 **************************************************************************/
 
 function ajoutPesee($id_membre,$date,$om,$cs,$compost,$verre,$decheterie,$bac_marron,$remarques)
  {
 	

$date=explode("-",$date);
$date="$date[2]-$date[1]-$date[0]";		

	
	try{
$insert = $this->con->prepare('INSERT INTO membre_has_pesee (id_membre,date,ordures_menageres,tri_selectif,compost,verre,dechetterie,bac_marron,remarques)
VALUES(:id_membre,:date,:ordures_menageres,:tri_selectif,:compost,:verre,:dechetterie,:bac_marron,:remarques)');
 
 	$execute=$insert->execute(array(
	'id_membre' => $id_membre,
	'date' => $date,
	'ordures_menageres' => $om,
	'tri_selectif' => $cs,
	'compost' => $compost,
	'verre' => $verre,
	'dechetterie' => $decheterie,
	'bac_marron' => $bac_marron,
	'remarques' => $remarques
		)); 
	
	
	 }
  catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'ajout d'une pesée</b>\n";
	throw $e;
        exit;
    }
	
	  
  	
  }


  
}