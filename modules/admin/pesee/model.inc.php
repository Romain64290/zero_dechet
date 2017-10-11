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
WHERE id_membre= :id_membre');

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
  
 function suppPesee($id_pesee)
  {
 

// suppression d'une pesee
try{ 	 	
$delete = $this->con->prepare('DELETE 
		FROM membre_has_pesee
		WHERE id_pesee  = :id_pesee ');
						
$delete->bindParam(':id_pesee', $id_pesee, PDO::PARAM_INT);
$delete->execute();	
		}

 	catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de la suppression d'une pesee </b>\n";
            throw $e;
  }}

}