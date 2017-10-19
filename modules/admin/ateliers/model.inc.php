<?php

/***** Dernière modification : 27/10/2016, Romain TALDU	*****/

 class atelier {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
    }

  
/***********************************************************************
 * Ajout d'une reunion
 **************************************************************************/
 
 function ajoutReunion($nom,$description,$type_reunion,$date,$heure_debut,$adresse,$ville,$lien_map,$limite)
  {
 	

$date=explode("-",$date);
$date_reunion="$date[2]-$date[1]-$date[0] $heure_debut";	
 
		try {
$insert = $this->con->prepare('INSERT INTO reunion (nom_reunion,description,type_reunion,date_reunion,adresse,id_commune,lien_map,limite_participants)
VALUES(:nom_reunion,:description,:type_reunion,:date_reunion,:adresse,:id_commune,:lien_map,:limite_participants)');
 
$insert->bindParam(':nom_reunion', $nom, PDO::PARAM_STR);
$insert->bindParam(':description', $description, PDO::PARAM_STR);
$insert->bindParam(':type_reunion', $type_reunion, PDO::PARAM_INT);
$insert->bindParam(':date_reunion', $date_reunion, PDO::PARAM_STR);
$insert->bindParam(':adresse', $adresse, PDO::PARAM_STR);
$insert->bindParam(':id_commune', $ville, PDO::PARAM_INT);
$insert->bindParam(':lien_map', $lien_map, PDO::PARAM_STR);
$insert->bindParam(':limite_participants', $limite, PDO::PARAM_INT);


$execute=$insert->execute();
	
	
	 }
  catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'ajout d'un atelier</b>\n";
	throw $e;
        exit;
    }
	
	  
  	
  }

  
/**************************************************************************
 Affichage des réunions
***************************************************************************/  

function afficheReunion()
  {
  
  try{
    	
		$select = $this->con->prepare('SELECT * 
		FROM reunion
		INNER JOIN communes ON communes.id_commune=reunion.id_commune
	    ORDER BY date_reunion DESC');	
				
		$select->execute();
		
		$data = $select->fetchAll();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'affichage du listing des réunions</b>\n";
	throw $e;
        exit;
    }
	 
 return $data;
  } 

 
  
  
/***********************************************************************
 * Edition d'une reunion
 **************************************************************************/
  
 function infosReunion($id_reunion)
 
 {
 
  try{
    	
		$select = $this->con->prepare('SELECT * 
	    FROM reunion
	    INNER JOIN communes ON communes.id_commune=reunion.id_commune
		WHERE id_reunion  = :id_reunion');
				
		
		$select->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
		$select->execute();
		
		$data = $select->fetch();
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'affichage de la réunion</b>\n";
	throw $e;
        exit;
    }
	 
 return $data;
  } 
  
  
/***********************************************************************
 * Mise à jour d'une réunion
 **************************************************************************/
  
 function majReunion($nom,$description,$id_reunion,$type_reunion,$date,$heure_debut,$adresse,$ville,$lien_map,$limite)
  {
 
$date=explode("-",$date);
$date_reunion="$date[2]-$date[1]-$date[0] $heure_debut"; 	
	
	try{	
$update = $this->con->prepare('UPDATE reunion SET nom_reunion=:nom_reunion,description=:description,type_reunion = :type_reunion,date_reunion = :date_reunion,adresse = :adresse,id_commune = :id_commune,lien_map = :lien_map,limite_participants = :limite  WHERE id_reunion = :id_reunion'); 

$update->bindParam(':nom_reunion', $nom, PDO::PARAM_STR);
$update->bindParam(':description', $description, PDO::PARAM_STR);
$update->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);	    	
$update->bindParam(':type_reunion', $type_reunion, PDO::PARAM_INT);
$update->bindParam(':date_reunion', $date_reunion, PDO::PARAM_STR);
$update->bindParam(':adresse', $adresse, PDO::PARAM_STR);
$update->bindParam(':id_commune', $ville, PDO::PARAM_INT);
$update->bindParam(':lien_map', $lien_map, PDO::PARAM_STR);
$update->bindParam(':limite', $limite, PDO::PARAM_INT);
$update->execute();	
	}
	
	 catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de la mise à jour d'une réunion</b>\n";
            throw $e;
        }		

  }
  
  /***********************************************************************
 * Suppression d'une reunion
 **************************************************************************/
  
 function suppReunion($id_reunion)
  {
 

// suppression de la reunion
try{ 	 	
$delete = $this->con->prepare('DELETE 
		FROM reunion
		WHERE id_reunion  = :id_reunion ');
						
$delete->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
$delete->execute();	
		}

 	catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de la suppression de la reunion </b>\n";
            throw $e;
        }	

	
// supression de la table de jointure
try{ 	 	
$delete = $this->con->prepare('DELETE 
		FROM membre_has_reunion
		WHERE id_reunion  = :id_reunion ');
						
$delete->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
$delete->execute();	
		}

 	catch (Exception $f) {
            echo $f->getMessage() . " <br><b>Erreur lors de la suppression de la jointure</b>\n";
            throw $f;
        }	

  }
 
  
}