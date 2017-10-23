<?php

/***** Dernière modification : 12/09/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
$menu=8;
require(__DIR__ .'/model.inc.php');

$id_reunion=$_GET['id_reunion'];

// verifie si la varaible $ajoutparticipant existe
$ajoutparticipant = isset($_GET['ajoutparticipant']) ? $_GET['ajoutparticipant'] : NULL;



// préparation connexion
$connect = new connection();
$atelier = new atelier($connect);

$result=$atelier->infosReunion($id_reunion); 
 
$date=explode(" ", $result['date_reunion']);
$date=explode("-", $date[0]);
$date="$date[2]-$date[1]-$date[0]";



$heure_debut=explode(" ",$result['date_reunion']);
$heure_debut=explode(":",$heure_debut[1]);
$heure_debut="$heure_debut[0]:$heure_debut[1]";

$description=htmlspecialchars($result['description']);
//$description = str_replace(array("\r\n", "\r", "\n"), "<br>", $description);


?>


<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo constant("TITLE"); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
     <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../plugins/font-awesome-4.6.3/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../../plugins/ionicons-2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
   
    <link rel="stylesheet" href="../../../dist/css/skins/skin-blue.min.css">
    
        
   <!-- Jquerry ui pour date picker-->
  <link rel="stylesheet" href="../../../plugins/jquery-ui-1.11.4/themes/smoothness/jquery-ui.css">
  <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>     
  
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../plugins/datatables/dataTables.bootstrap.css">
    
  <link rel="stylesheet" href="../../../plugins/sweetalert2/sweetalert2.min.css">


  </head>
 
 <body class="hold-transition skin-blue sidebar-mini" <?php if($ajoutparticipant=="ok"){echo"onload=\"Ajoutparticipant();\"";} ?>>
    <div class="wrapper">
    	
<?php
require(__DIR__ .'/../../../include/main_header.php');
require(__DIR__ .'/../../../include/main_slidebar.php');
?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edition d'une réunion
            
          </h1>
          <ol class="breadcrumb">
              <li><a href="../dashboard/index.php"><i class="fa fa-calendar"></i> Accueil</a></li>
            <li class="active">Edition d'une réunion</li>
          </ol>
        </section>

      



  	<!-- Main content -->
        <section class="content">
          <div class="row">
            
            <div class="col-md-12">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Réunion</h3>
               <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <form name="inscriptionForm"  id="inscriptionForm" role="form" data-toggle="validator" action="edit02_reunion.php" method="post" data-disable="false">
             	
              <div class="box-body">
               
                  
                    <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="fa fa-users"></span>
 	 </span>
     <input type="text" class="form-control"  value="<?php echo htmlspecialchars($result['nom_reunion']); ?>" placeholder="Nom de l'atelier" required name="nom" data-error="Veuillez saisir un nom d'atelier"> </div>  
     <div class="help-block with-errors"></div>
  
     </div>  
                  
          
       <div class="row">
            
             <div class="col-md-4">   
            
            <div class="form-group has-feedback">
 	 <div class="input-group">
 <span class="input-group-addon">
    <span class="fa fa-users"></span>
 	 </span>
           	 <select name="type_reunion" class="form-control" required  data-error="Veuillez choisir une type de réunion">
                <option value="" selected disabled="disabled">Type de réunion</option>
                <option value="1"<?php if($result['type_reunion']==1){echo"selected";}?>>Maison</option>
                <option value="2" <?php if($result['type_reunion']==2){echo"selected";}?>>Appartement</option>
            </select>            
            
  
     </div><div class="help-block with-errors"></div>   </div>  
            </div>
            
            <div class="col-md-4">        
          <div class="form-group"><div class="bootstrap-timepicker">
                    <div class="form-group">
                    
                      <div class="input-group">
                      	<div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" id="datepicker" class="form-control" placeholder="Date de la réunion" required data-error="Veuillez choisir une date" name="date" value="<?php echo $date; ?>">
                         
                      </div><!-- /.input group --><div class="help-block with-errors"></div>
                    </div><!-- /.form group -->
                  </div>
                  <!-- /.input group -->
                </div>  </div>

            
            
            
            <div class="col-md-4">        
          <div class="form-group"><div class="bootstrap-timepicker">
                    <div class="form-group">
                    
                      <div class="input-group">
                      	<div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                     
                        <input type="text" placeholder="heure début" class="form-control" data-inputmask="'alias': 'hh:mm'" data-mask required  data-error="Veuillez choisir une heure de début" name="heure_debut" value="<?php echo $heure_debut; ?>">
                        
                      </div><!-- /.input group --><div class="help-block with-errors"></div>
                    </div><!-- /.form group -->
                  </div>
                  <!-- /.input group -->
                </div>  </div>
                

                </div>
                  
                  
                     
                  <div class="form-group has-feedback">       
          <div class="input-group">
      	<textarea class="form-control" rows="4" cols="300" placeholder="Description de l'atelier..." name="description"><?php echo $description; ?></textarea>
         </div>
 </div>
                  
          
      <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="fa fa-map-marker"></span>
 	 </span>
     <input type="text" class="form-control"  value="<?php echo htmlspecialchars($result['adresse']); ?>" placeholder="Adresse" required name="adresse" data-error="Veuillez saisir une adresse"></div>  
     <div class="help-block with-errors"></div>
   
     </div> 
     
     
     
     
     <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="fa fa-map-marker"></span>
 	 </span>
  
     <select class="form-control" name="ville" required data-error="Veuillez choisir la ville ">
  <option value="" selected disabled="disabled">Ville</option>
	<option value="15" <?php if($result['id_commune']==15){echo"selected";}?>>Arbus</option>
   <option value="16" <?php if($result['id_commune']==16){echo"selected";}?>>Aressy</option>
  	<option value="1" <?php if($result['id_commune']==1){echo"selected";}?>>Artigueloutan</option>
  	<option value="17" <?php if($result['id_commune']==17){echo"selected";}?>>Artiguelouve</option>
  	<option value="18" <?php if($result['id_commune']==18){echo"selected";}?>>Aubertin</option>
  	<option value="19" <?php if($result['id_commune']==19){echo"selected";}?>>Ausevielle</option>
  	<option value="20" <?php if($result['id_commune']==20){echo"selected";}?>>Beyrie-en-Béarn</option>
	<option value="2" <?php if($result['id_commune']==2){echo"selected";}?>>Billère</option>
	<option value="3" <?php if($result['id_commune']==3){echo"selected";}?>>Bizanos</option>
	<option value="21" <?php if($result['id_commune']==21){echo"selected";}?>>Bosdarros</option>
	<option value="22" <?php if($result['id_commune']==22){echo"selected";}?>>Bougarber</option>
	<option value="23" <?php if($result['id_commune']==23){echo"selected";}?>>Denguin</option>
	<option value="4" <?php if($result['id_commune']==4){echo"selected";}?>>Gan</option>
	<option value="5" <?php if($result['id_commune']==5){echo"selected";}?>>Gelos</option>
	<option value="6" <?php if($result['id_commune']==6){echo"selected";}?>>Idron</option>
	<option value="7" <?php if($result['id_commune']==7){echo"selected";}?>>Jurançon</option>
	<option value="24" <?php if($result['id_commune']==24){echo"selected";}?>>Laroin</option>
	<option value="8" <?php if($result['id_commune']==8){echo"selected";}?>>Lée</option>
	<option value="9" <?php if($result['id_commune']==9){echo"selected";}?>>Lescar</option>
	<option value="10" <?php if($result['id_commune']==10){echo"selected";}?>>Lons</option>
	<option value="11" <?php if($result['id_commune']==11){echo"selected";}?>>Mazères-Lezons</option>
	<option value="25" <?php if($result['id_commune']==25){echo"selected";}?>>Meillon</option>	
	<option value="12" <?php if($result['id_commune']==12){echo"selected";}?>>Ousse</option>	
	<option value="13" <?php if($result['id_commune']==13){echo"selected";}?>>Pau</option>
	<option value="26" <?php if($result['id_commune']==26){echo"selected";}?>>Poey-de-Lescar</option>
	<option value="27" <?php if($result['id_commune']==27){echo"selected";}?>>Rontignon</option>
	<option value="28" <?php if($result['id_commune']==28){echo"selected";}?>>Saint-Faust</option>
	<option value="14" <?php if($result['id_commune']==14){echo"selected";}?>>Sendets</option>	
	<option value="29" <?php if($result['id_commune']==29){echo"selected";}?>>Siros</option>
	<option value="30" <?php if($result['id_commune']==30){echo"selected";}?>>Uzein</option>
	<option value="31" <?php if($result['id_commune']==31){echo"selected";}?>>Uzos</option>		
</select>     
    
     
     </div>
     
      <div class="help-block with-errors"></div>
     
     
     
     
     </div>
     
     
     
     
             
     
      <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="fa fa-google"></span>
 	 </span>
     <input type="text" class="form-control"  value="<?php echo htmlspecialchars($result['lien_map']); ?>" placeholder="Lien Google Map" required name="lien_map" data-error="Veuillez saisir le lien google map"></div>  
     <div class="help-block with-errors"></div>
   
     </div>
          
  
        <div class="row">
            


<div class="col-md-12"> 
<div class="form-group has-feedback">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-ticket"></i>
                  </div>
                  <input class="form-control" type="text"  value="<?php if($result['limite_participants']!=0){echo $result['limite_participants'];}?>" placeholder="Limite du nombre de places - [illimité : ne rien mettre]"  name="limite" > </div>
                  
</div></div>
</div>

    
   
    
  
                
               <br>
               
              
              <!-- /.box-body -->
              <div class="box-footer">
              	<div class="row">
         	   <div class="col-md-6"> 
              	
              	 <button type="button" class="btn btn-default" onclick="window.history.go(-1); return false;"><i class="fa fa-arrow-circle-left"></i> Annuler</button>  
                <button type="submit" class="btn btn-primary" ><i class="fa fa-floppy-o"></i> &nbsp; Mettre à jour la réunion</button>
                </div>
              <div class="col-md-2"></div>
              <div class="col-md-4" align="right">
              <button type="button" class="btn btn-danger" onclick="suppReunion(<?php echo $id_reunion; ?>);">
              	<i class="fa fa-trash-o"></i>&nbsp; Supprimer la réunion</button>
              </div>
              </div>
</div>
    
              
         
             <input type="hidden" name="id_reunion" value="<?php echo $id_reunion; ?>">
              
            </form>
          </div>

            </div><!-- /.col -->
          </div><!-- /.row -->
         
          
         </div>
          
          
      <div class="row">
            
            <div class="col-md-12">
     
        <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Liste des inscrits</h3>
     <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div>
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
     
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
   
   <table id="liste_admin" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      	<th>#</th>
                        <th>Nom / Prénom</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Supp.</th>
                      </tr>
                    </thead>
                    <tbody>
 <?php
                  
 /* affichage de la liste des inscrits */
                                    
$afficheInscrits=$atelier->afficheInscrits($id_reunion); 


$compteur = 1;

foreach($afficheInscrits as $key){
			
		$id_membre=$key->id_membre;
		$nom=htmlspecialchars($key->nom_membre);
		$prenom=htmlspecialchars($key->prenom_membre);
		$telephone=htmlspecialchars($key->telephone);
		$email=htmlspecialchars($key->email);
	
		
		// nom/prenom fentre alerte
		$nomjs=$nom." ".$prenom;
		
		
		
		 
echo"
<tr>
            <td style=\"width:5%; text-align: left\">$compteur</td>
            <td style=\"width: 20%; text-align: left\">$nom $prenom</td>
            <td style=\"width: 10%; text-align: left\">$telephone</td>
            <td style=\"width: 20%; text-align: left\">$email</td>      
            <td style=\"width: 15%; text-align: center\">
            <a href=\"#\" onclick=\"suppUser($id_reunion,$id_membre,new String('$nomjs'));\">
			<span class=\"label label-danger\"><i class=\"fa fa-trash-o\"></i>&nbsp;Supp.</span></a></td>		
</tr>";
     
$compteur++;		                           
                  
}                 
                  
/* Fin de l'affichage de la liste des Inscrits */   

?>                
                  
                    </tbody>
                   
                  </table>



  </div><!-- /.box-body -->
 
</div><!-- /.box -->
     
  
          
          </div>
          </div>
          
 
 
   
          
          
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
   
 <?php require(__DIR__ .'/../../../include/footer_back.php'); ?>
   
   
    <!-- REQUIRED JS SCRIPTS -->
    <!-- jQuery 2.1.4 -->
    <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../../bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/app.min.js"></script>
   
  
    
   <!-- InputMask -->
    <script src="../../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../../plugins/input-mask/jquery.inputmask.extensions.js"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="../../../plugins/jquery-ui-1.11.4/jquery-ui.min.js"></script>
    
    
    <!--Validation du formulaire -->
    <script src="../../../include/js/validator.js"></script>
    <script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../plugins/datatables/dataTables.bootstrap.min.js"></script>

     <script src="../../../plugins/sweetalert2/sweetalert2.min.js"></script>
     <script src="https://cdn.jsdelivr.net/es6-promise/latest/es6-promise.auto.min.js"></script> <!-- IE support -->
    
    	
    <script>

      
    //masque de saisie heure 
         $("#datemask").inputmask("hh:mm", {"placeholder": "hh:mm"});
         $("[data-mask]").inputmask();    
     
       
$( "#datepicker" ).datepicker({
altField: "#datepicker",
closeText: 'Fermer',
prevText: 'Précédent',
nextText: 'Suivant',
currentText: 'Aujourd\'hui',
monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
weekHeader: 'Sem.',
dateFormat: 'dd-mm-yy',
firstDay : 1
});
     		  
		  
  $('#liste_admin').DataTable({
         "stateSave": true,
         "stateDuration": 60 * 3,
          "ordering": false,
           "language": {
            "lengthMenu": "_MENU_  enregistrements par page",
            "zeroRecords": "Désolé, aucun résultat trouvé.",
            "info": "Affichage page _PAGE_ sur _PAGES_",
            "infoEmpty": "Aucun enregistrement disponible",
            "infoFiltered": "(filtered from _MAX_ total records)",
             "search": "Recherche",
             "paginate": {
       			 "first":      "First",
       			 "last":       "Last",
        		 "next":       "Suivant",
        		 "previous":   "Précédent"
  				  },
         
        }
       
       
      });
       	  
        
   
      
 function suppUser(idreunion,iduser,utilisateur) {
  	  
  swal({
  title: 'Etes vous sûr de vouloir supprimer cet utilisateur ?',
  text: ""+utilisateur,
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Oui, on supprime !',
  cancelButtonText: 'Annuler !'
}).then(function () {
 document.location.href="supp_user.php?id_user="+iduser+"&id_reunion="+idreunion;
})
    
 }   
 
  function suppReunion(idreunion) {
  	  
  swal({
  title: 'Etes vous sûr de vouloir supprimer cette réunion ?',
  text: "",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Oui, on supprime !',
  cancelButtonText: 'Annuler !'
}).then(function () {
 document.location.href="supp_reunion.php?id_reunion="+idreunion; 
 
 
 })
    
 }        
      
 function Ajoutparticipant() {
  	  
  swal({
  title: 'Participant ajouté avec succès !',
  text: "",
  type: 'success',

})
    
 }     
 
           
      
      
      
    </script>


 
  </body>
</html>