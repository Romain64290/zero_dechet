<?php

require(__DIR__ .'/include/config.inc.php');
require(__DIR__ .'/include/connexion.inc.php');
require(__DIR__ .'/modules/temp/model.inc.php');
require(__DIR__ .'/plugins/PHPMailer/class.phpmailer.php');

// préparation connexion
$connect = new connection();
$temp = new temp($connect);

function random($var){
        $string = "";
        $chaine = "a0b1c2d3e4f5g6h7i8j9klmnpqrstuvwxy123456789";
        srand((double)microtime()*1000000);
        for($i=0; $i<$var; $i++){
            $string .= $chaine[rand()%strlen($chaine)];
        }
        return $string;
    }


//Affiche les membres 
$result=$temp->afficheMembres();

foreach($result as $key){
    
$motdepasse=random(8);
$motdepasse_crypte=sha1($motdepasse);    
  
$id_membre= $key->id_membre;
$email= htmlspecialchars($key->email);
	
// mets a jour les mot de passe
$result=$temp->majMembres($id_membre,$motdepasse_crypte);

// envoie email de confirmation
$result=$temp->emailMembres($email,$motdepasse);

}
 