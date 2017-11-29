<?php

/***** Dernière modification : 27/10/2016, Romain TALDU	*****/

 class temp {

    private $con;

    public function __construct(connection $con) {
        $this->con = $con->con;
    }

      
/**************************************************************************
 Selection des membres
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
  
  
  
/***********************************************************************
 * Mise à jour des mot des passe d'un membre
 **************************************************************************/
  
 function majMembres($id_membre,$motdepasse_crypte)
  {
 
	
	
	try{	
$update = $this->con->prepare('UPDATE membres SET mot_de_passe=:mot_de_passe WHERE id_membre = :id_membre'); 


$update->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);	    	
$update->bindParam(':mot_de_passe', $motdepasse_crypte, PDO::PARAM_STR);
$update->execute();	
	}
	
	 catch (Exception $e) {
            echo $e->getMessage() . " <br><b>Erreur lors de la mise à jour d'un mot de passe</b>\n";
            throw $e;
        }		

  }
  
  
  
/***********************************************************************
 * Envoi un email aux membres
 **************************************************************************/
  
 function emailMembres($mail_user,$motdepasse)
  {
  
    
// Création d'un nouvel objet $mail
$mail = new PHPMailer();
// Encodage
$mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64'; 


//=====Corps du message
$body = "<html><head></head>
<body>
Bonjour,<br>
<br>
Je vous souhaite la bienvenue dans le \"Défi familles Zéro Déchet\".<br>
<br>
Dès à présent, connectez-vous à la plateforme web pour découvrir les fonctionnalités suivantes : 
<ul>
<li>Tableau de bord</li>
<li>Les pesées</li>
<li>Conseils/règlement</li>
<li>Ateliers</li>
<li>Journal de bord</li>
</ul>

Je vous invite à enregistrer régulièrement (hebdomadairement ou lorsque c'est nécessaire), vos pesées sur : <a href=\"https://zerodechet.agglo-pau.fr\">https://zerodechet.agglo-pau.fr </a><br>
<br>

Vos identifiants sont les suivants : <br>
Email : ".$mail_user."<br>
Mot de passe : ".$motdepasse."<br>
<br>


Je reste à votre disposition pour toutes questions relatives au défi familles zéro et à l'application web à l'adresse suivante : <a href=\"mailto:e.morello@agglo-pau.fr\">e.morello@agglo-pau.fr</a><br>
<br>
Cordialement,<br>
<br>
Emilie MORELLO<br>
Animatrice réduction des déchets<br>
Direction développement durable et déchets<br>
Communauté d’agglomération Pau Béarn Pyrénées<br>
</body>
</html>";
//==========


// Expediteur, adresse de retour et destinataire :
$mail->SetFrom(FROM_EMAIL, "Agglomération Pau Béarn Pyrénées"); //L'expediteur du mail
$mail->AddReplyTo("NO-REPLY@agglo-pau.fr", "NO REPLY"); //Pour que l'usager réponde au mail
// Si on a le nom : $mail->AddAddress("romain_taldu@hotmail.com", "Romain perso"); 
 //mail du destinataire
$mail->AddAddress($mail_user); 


// Sujet du mail
$mail->Subject = "Agglomération Pau Béarn Pyrénées - Défi familles Zéro Déchet";
// Le message
$mail->MsgHTML($body);


// Envoi de l'email
$mail->Send();

unset($mail);      
            
        }
     
     
  
 }