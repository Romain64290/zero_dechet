<?php

 //***** Dernière modification : 17/06/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
$menu=2;
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');


// verifie si la variable $vajout existe => demande effectuée
$ajout = isset($_GET['ajout']) ? $_GET['ajout'] : NULL;


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
     
         <!-- DataTables -->
     <link rel="stylesheet" href="../../../plugins/datatables/media/css/dataTables.bootstrap.min.css">
    
    <link rel="stylesheet" href="../../../plugins/sweetalert2/sweetalert2.min.css">
    
          <!-- Jquerry ui pour date picker-->
  <link rel="stylesheet" href="../../../plugins/jquery-ui-1.11.4/themes/smoothness/jquery-ui.css">
  <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>    
    
    
    <script src="../../../plugins/Chart.js-master/dist/Chart.js"></script>

<style>
	
.hauteur {
    height: 60px;
   
}	
	
#liste_demandes thead {
  display: none;
}




</style>

  </head>
 
  <body class="hold-transition skin-blue sidebar-mini"  <?php if($ajout=="ok"){echo"onload=\"Ajout_ok();\"";}  if($ajout=="ko"){echo"onload=\"Ajout_ko();\"";}?> >
  	
    <div class="wrapper">
    	
<?php
require(__DIR__ .'/../../../include/main_header.php');
require(__DIR__ .'/../../../include/main_slidebar.php');
?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Ajour d'un atelier
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-calendar"></i> Acccueil</a></li>
            <li class="active">Ajout d'un atelier</li>
          </ol>
        </section>

        <!-- Main content -->
    
        <section class="content">
                <!-- Info boxes -->
     
           
         
   <div class="row">
            
            <div class="col-md-12">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Nouvelle réunion</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <form name="inscriptionForm"  id="inscriptionForm" role="form" data-toggle="validator" action="validation_ajout_reunion.php" method="post" data-disable="false">
             	
              <div class="box-body">
               
                  <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="fa fa-users"></span>
 	 </span>
     <input type="text" class="form-control"  value="" placeholder="Nom de l'atelier" required name="nom" data-error="Veuillez saisir un nom d'atelier"> </div>  
     <div class="help-block with-errors"></div>
  
     </div>  
                  
          
       <div class="row">
            
             <div class="col-md-4">   
            
            <div class="form-group has-feedback">
 	 <div class="input-group">
 <span class="input-group-addon">
    <span class="fa fa-users"></span>
 	 </span>
           	 <select name="type_reunion" class="form-control" required  data-error="Veuillez choisir une type d'atelier">
                <option value="" selected disabled="disabled">Type d'atelier</option>
                <option value="1">Réunion</option>
                <option value="2">Visite</option>
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
                        <input type="text" id="datepicker" class="form-control" placeholder="Date de la réunion" required data-error="Veuillez choisir une date" name="date">
                         
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
                     
                        <input type="text" placeholder="heure début" class="form-control" data-inputmask="'alias': 'hh:mm'" data-mask required  data-error="Veuillez choisir une heure de début" name="heure_debut">
                        
                      </div><!-- /.input group --><div class="help-block with-errors"></div>
                    </div><!-- /.form group -->
                  </div>
                  <!-- /.input group -->
                </div>  </div>
                
  
                </div>
                  
                  <div class="form-group has-feedback">       
          <div class="input-group">
      	<textarea class="form-control" rows="4" cols="300" placeholder="Description de l'atelier..." name="description"></textarea>
         </div>
 </div>
                  
          
      <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="fa fa-map-marker"></span>
 	 </span>
     <input type="text" class="form-control"  value="" placeholder="Adresse" required name="adresse" data-error="Veuillez saisir une adresse"></div>  
     <div class="help-block with-errors"></div>
   
     </div> 
     
     
     
     
     <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="fa fa-map-marker"></span>
 	 </span>
  
     <select class="form-control" name="ville" required data-error="Veuillez choisir la ville ">
  <option value="" selected disabled="disabled">Ville</option>
   <option value="15">Arbus</option>
   <option value="16">Aressy</option>
  	<option value="1">Artigueloutan</option>
  	<option value="17">Artiguelouve</option>
  	<option value="18">Aubertin</option>
  	<option value="19">Ausevielle</option>
  	<option value="20">Beyrie-en-Béarn</option>
	<option value="2">Billère</option>
	<option value="3">Bizanos</option>
	<option value="21">Bosdarros</option>
	<option value="22">Bougarber</option>
	<option value="23">Denguin</option>
	<option value="4">Gan</option>
	<option value="5">Gelos</option>
	<option value="6">Idron</option>
	<option value="7">Jurançon</option>
	<option value="24">Laroin</option>
	<option value="8">Lée</option>
	<option value="9">Lescar</option>
	<option value="10">Lons</option>
	<option value="11">Mazères-Lezons</option>
	<option value="25">Meillon</option>	
	<option value="12">Ousse</option>	
	<option value="13">Pau</option>
	<option value="26">Poey-de-Lescar</option>
	<option value="27">Rontignon</option>
	<option value="28">Saint-Faust</option>
	<option value="14">Sendets</option>	
	<option value="29">Siros</option>
	<option value="30">Uzein</option>
	<option value="31">Uzos</option>	
</select>     
    
     
     </div>
     
      <div class="help-block with-errors"></div>
     
     
     
     
     </div>
     
     
     
     
             
     
      <div class="form-group has-feedback">
 	 <div class="input-group">
    <span class="input-group-addon">
    <span class="fa fa-google"></span>
 	 </span>
     <input type="text" class="form-control"  value="" placeholder="Lien Google Map" required name="lien_map" data-error="Veuillez saisir le lien google map"></div>  
     <div class="help-block with-errors"></div>
   
     </div>
          
  
        <div class="row">
            

<div class="col-md-12"> 
<div class="form-group has-feedback">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-ticket"></i>
                  </div>
                  <input class="form-control" type="text"  value="" placeholder="Limite du nombre de places - [illimité : ne rien mettre]"  name="limite" > </div>
                  
</div></div>
</div>


     
  
  
                
               <br>
               
              
              <!-- /.box-body -->
              <div class="box-footer">
              	 <button type="reset" class="btn btn-default" ><i class="fa fa-arrow-circle-left"></i> Annuler</button>  
                <button type="submit" class="btn btn-primary" ><i class="fa fa-floppy-o"></i> &nbsp; Créer l'atelier</button>
              </div>
              
             
              
            </form>
          </div>

            </div><!-- /.col -->
          </div><!-- /.row -->    
             
                     	 
            
                
                
    
                  
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
    


<script src="../../../plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/es6-promise/latest/es6-promise.auto.min.js"></script> <!-- IE support -->

   <!-- InputMask -->
    <script src="../../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../../plugins/input-mask/jquery.inputmask.extensions.js"></script>

  <script src="../../../plugins/jquery-ui-1.11.4/jquery-ui.min.js"></script>
  
      <!--Validation du formulaire -->
    <script src="../../../include/js/validator.js"></script>
  
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
      
      
      
function Ajout_ok() {
  	  
  swal({
  title: 'Ajout de l\'atelier enregistré !',
  text: "",
  type: 'success',

})
    
 }       
      
      
function Ajout_ko() {
  	  
  swal({
  title: 'Ajout de l\'atelier refusée !',
  text: "Erreur",
  type: 'error',

})


}       
      </script>


  </body>
</html>
