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


}