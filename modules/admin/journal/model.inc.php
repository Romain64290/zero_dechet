<?php

/***** Dernière modification : 27/10/2016, Romain TALDU	*****/

 class journal {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
    }

    
    
  /***********************************************************************
 * Suppression d'une news
 **************************************************************************/
  
 function suppNews($id_news,$id_membre)
  {
 

// suppression d'une news
try{ 	 	
$delete = $this->con->prepare('DELETE 
		FROM membre_has_news
		WHERE id_news  = :id_news AND id_membre  = :id_membre');
						
$delete->bindParam(':id_news', $id_news, PDO::PARAM_INT);
$delete->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);
$delete->execute();	
		}

 	catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de la suppression d'une news </b>\n";
            throw $e;
  }}

  
/***********************************************************************
 * Ajout d'une news
 **************************************************************************/
 
 function ajoutNews($id_membre,$titre,$news)
  {
 	

$date=date('Y-m-d H:i:s');	

	
	try{
$insert = $this->con->prepare('INSERT INTO membre_has_news (id_membre,date,titre,news)
VALUES(:id_membre,:date,:titre,:news)');
 
 	$execute=$insert->execute(array(
	'id_membre' => $id_membre,
	'date' => $date,
	'titre' => $titre,
	'news' => $news
		)); 
	
	
	 }
  catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'ajout d'une news</b>\n";
	throw $e;
        exit;
    }
	
	  
  	
  }

/***********************************************************************
 * Affiche les news d'un membre
 **************************************************************************/
  
 function afficheNews($id_membre)
  {
   
   
	try{
$select = $this->con->prepare('SELECT *
FROM membre_has_news
WHERE id_membre= :id_membre
ORDER BY date DESC');

$select->bindParam(':id_membre', $id_membre, PDO::PARAM_STR);	

$select->execute();
	}
	 catch (PDOException $e){
       echo $e->getMessage() . " <br><b>Erreur lors de l'affichage des news d'un membre </b>\n";
	throw $e;
        exit;
    }

 $result = $select->fetchAll(PDO::FETCH_OBJ);
 
 return $result;
      
   
}
  
}