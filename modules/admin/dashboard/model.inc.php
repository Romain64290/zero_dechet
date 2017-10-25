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
  
}