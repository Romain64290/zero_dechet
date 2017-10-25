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
 
 function ajoutReunion($nom,$description,$date,$heure_debut,$adresse,$ville,$lien_map,$limite)
  {
 	

$date=explode("-",$date);
$date_reunion="$date[2]-$date[1]-$date[0] $heure_debut";	
 
		try {
$insert = $this->con->prepare('INSERT INTO reunion (nom_reunion,description,date_reunion,adresse,id_commune,lien_map,limite_participants)
VALUES(:nom_reunion,:description,:date_reunion,:adresse,:id_commune,:lien_map,:limite_participants)');
 
$insert->bindParam(':nom_reunion', $nom, PDO::PARAM_STR);
$insert->bindParam(':description', $description, PDO::PARAM_STR);
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
  
 function majReunion($nom,$description,$id_reunion,$date,$heure_debut,$adresse,$ville,$lien_map,$limite)
  {
 
$date=explode("-",$date);
$date_reunion="$date[2]-$date[1]-$date[0] $heure_debut"; 	
	
	try{	
$update = $this->con->prepare('UPDATE reunion SET nom_reunion=:nom_reunion,description=:description,date_reunion = :date_reunion,adresse = :adresse,id_commune = :id_commune,lien_map = :lien_map,limite_participants = :limite  WHERE id_reunion = :id_reunion'); 

$update->bindParam(':nom_reunion', $nom, PDO::PARAM_STR);
$update->bindParam(':description', $description, PDO::PARAM_STR);
$update->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);	    	
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
 
  
  /***********************************************************************
 * Verifie les inscriptions d'un membre à une réunion
 **************************************************************************/
  
 function VerifInscription($id_reunion,$id_membre)
  {
   
   
	try{
$select = $this->con->prepare('SELECT *
FROM membre_has_reunion
WHERE id_membre= :id_membre AND id_reunion= :id_reunion
');

$select->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);
$select->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);

$select->execute();
	}
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de la verfication des inscriptions d'un membre </b>\n";
	throw $e;
        exit;
    }

 $result = $select->fetch();
 
 return $result;
      
   
}

/***********************************************************************
 * Ajout d'une reunion
 **************************************************************************/
 
 function ajouteReponse($presence,$id_reunion,$id_membre)
  {
            
 if($presence==1){
     
//incrementation du nombre d'utilisateur dans la table reunion
	try{	
$update = $this->con->prepare('UPDATE reunion SET nbr_participants = nbr_participants + 1  WHERE id_reunion  = :id_reunion'); 

$update->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
$update->execute();	
	}
	
	 catch (Exception $g) {
            echo $g->getMessage() . " <br><b>Erreur lors de l'incrementation de la table reunion</b>\n";
            throw $g;
        }     
     
     
 }
     
		try {
$insert = $this->con->prepare('INSERT INTO membre_has_reunion (id_membre,id_reunion, presence)
VALUES(:id_membre,:id_reunion, :presence)');
 
$insert->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);
$insert->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
$insert->bindParam(':presence', $presence, PDO::PARAM_INT);


$execute=$insert->execute();
	
	
	 }
  catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'ajout d'une reponse d'un membre à la participation d'un atelier/b>\n";
	throw $e;
        exit;
    }
	
	  
  	
  }
  
  
/***********************************************************************
 * Ajout d'une reunion
 **************************************************************************/
 
 function ModifReponse($presence,$id_reunion,$id_membre)
  {
   
   if($presence==1){
     
//incrementation du nombre d'utilisateur dans la table reunion
	try{	
$update = $this->con->prepare('UPDATE reunion SET nbr_participants = nbr_participants + 1  WHERE id_reunion  = :id_reunion'); 

$update->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
$update->execute();	
	}
	
	 catch (Exception $g) {
            echo $g->getMessage() . " <br><b>Erreur lors de l'incrementation de la table reunion</b>\n";
            throw $g;
        }     
     
     
 }
 
  if($presence==2){
     
//decrementation du nombre d'utilisateur dans la table reunion
	try{	
$update = $this->con->prepare('UPDATE reunion SET nbr_participants = nbr_participants - 1  WHERE id_reunion  = :id_reunion'); 

$update->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
$update->execute();	
	}
	
	 catch (Exception $g) {
            echo $g->getMessage() . " <br><b>Erreur lors de la décrementation de la table reunion</b>\n";
            throw $g;
        }     
     
     
 }
     
 
		try {
$update = $this->con->prepare('UPDATE membre_has_reunion SET presence=:presence
        WHERE id_reunion = :id_reunion AND id_membre=:id_membre');


 
$update->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);
$update->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
$update->bindParam(':presence', $presence, PDO::PARAM_INT);
$update->execute();
	
	
	 }
  catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de la modification d'une reponse d'un membre à la participation d'un atelier/b>\n";
	throw $e;
        exit;
    }
	
	  
  	
  }
 
   
/**************************************************************************
 Affichage des inscrits à une reunion
***************************************************************************/  

function afficheInscrits($id_reunion)
  {
  
  try{
    	
		$select = $this->con->prepare('SELECT * 
		FROM membre_has_reunion
		INNER JOIN membres ON membres.id_membre=membre_has_reunion.id_membre
                WHERE membre_has_reunion.id_reunion=:id_reunion AND presence=1
                ORDER BY nom_membre ASC');	
		
                $select->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
		$select->execute();
		
		$data = $select->fetchAll(PDO::FETCH_OBJ);
		
		}
		
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'affichage des inscrits à une réunion</b>\n";
	throw $e;
        exit;
    }
	 
 return $data;
  } 

   
  /***********************************************************************
 * Suppression d'un utilisateur
 **************************************************************************/
  
 function supUser($id_membre,$id_reunion)
  {
 
	
//décrementation du nombre d'utilisateur dans la table reunion
	try{	
$update = $this->con->prepare('UPDATE reunion SET nbr_participants = nbr_participants - 1  WHERE id_reunion  = :id_reunion'); 

$update->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
$update->execute();	
	}
	
	 catch (Exception $g) {
            echo $g->getMessage() . " <br><b>Erreur lors de la décrementation de la table reunion</b>\n";
            throw $g;
        }		



// modification du statut de l'uagader
try{ 	 	
$update2 = $this->con->prepare('UPDATE membre_has_reunion SET presence=3 
		 WHERE id_reunion = :id_reunion AND id_membre=:id_membre ');
						
$update2->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);
$update2->bindParam(':id_reunion', $id_reunion, PDO::PARAM_INT);
$update2->execute();	
		}

 	catch (Exception $f) {
            echo $f->getMessage() . " <br><b>Erreur lors de la suppression de la jointure d'un inscrit</b>\n";
            throw $f;
        }	

  } 
}