<?php

 //***** Dernière modification : 17/06/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
$menu=2;
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');


 	


// préparation connexion
$connect = new connection();
$pesee = new pesee($connect);

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
          <h1>Les pesées
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-balance-scale"></i> Acccueil</a></li>
            <li class="active">Les pesées</li>
          </ol>
        </section>

        <!-- Main content -->
    
        <section class="content">
                <!-- Info boxes -->
     
           
            <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-balance-scale"></i> <u> Ajoutez une  pesée</u></h3>
                  <div class="box-tools pull-right">
              
                     <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                 
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                	
                <!-- Info boxes -->
      <div class="row">
                 
        <form name="inscriptionForm"  id="inscriptionForm" role="form" data-toggle="validator" action="ajout_pesee.php" method="post" data-disable="false">   
 <div class="col-md-12">
  <table  class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      
                        <th style=" text-align: center">Date</th>
                        <th style=" text-align: center">Ordures ménagères *</th>
                        <th style=" text-align: center">Tri sélectif *</th>
                        <th style=" text-align: center">Compost *</th>
                        <th style=" text-align: center">Verre *</th>
                             <th style=" text-align: center">Textile *</th>
                        <th style=" text-align: center">Bac marron *</th>
                        <th style=" text-align: center">Remarques</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                  

<tr>

     <td style="width: 10%; text-align: left"><input type="text" id="datepicker" class="form-control" placeholder="JJ-MM-AAAA" required data-error="Veuillez choisir une date" name="date"> </td>
     
     <td style="width: 10%; text-align: left">
       <div class="form-group has-feedback">
 	 <div class="input-group">
         <input type="text"   value="" class="form-control" placeholder="0.00"  name="om">  </div> 
     </div>       
         </td>
     
        <td style="width: 10%; text-align: left">
       <div class="form-group has-feedback">
 	 <div class="input-group">
         <input type="text"   value="" class="form-control" placeholder="0.00"  name="cs">  </div> 
     </div>       
         </td>
         
           <td style="width: 10%; text-align: left">
       <div class="form-group has-feedback">
 	 <div class="input-group">
         <input type="text"   value="" class="form-control" placeholder="0.00"  name="compost">  </div> 
     </div>       
         </td>
         
           <td style="width: 10%; text-align: left">
       <div class="form-group has-feedback">
 	 <div class="input-group">
         <input type="text"   value="" class="form-control" placeholder="0.00"  name="verre">  </div> 
     </div>       
         </td>
         
           <td style="width: 10%; text-align: left">
       <div class="form-group has-feedback">
 	 <div class="input-group">
         <input type="text"   value="" class="form-control" placeholder="0.00"  name="decheterie">  </div> 
     </div>       
         </td>
         
           <td style="width: 10%; text-align: left">
       <div class="form-group has-feedback">
 	 <div class="input-group">
         <input type="text"   value="" class="form-control" placeholder="0.00"  name="bac_marron">  </div> 
     </div>       
         </td>
         
     
     

     <td style="width: 30%; text-align: left">
  
       <div class="form-group has-feedback">
 	 <div class="input-group">
             <input type="text"   value="" class="form-control" placeholder=""  name="remarques" size="60">  </div> 
     </div>   
     
     </td>
    
      
                    </tbody>
                   
  </table>    </div></div>
                
                 <div class="row">
       
 <div class="col-md-10">
            
     <small> <i>(*) Les poids doivent être saisi en Kg.</i></small>
            
 </div>
                      <div class="col-md-2">
                          <div align="right"> <button type="submit" class="btn btn-primary" ><i class="fa fa-floppy-o"></i> &nbsp; Ajoutez une  pesée</button></div></div>
                 </div>
            
        </form>  
          <br>
      <div class="row">
       
 <div class="col-md-12">       
     <h4 class="box-title"><i class="fa fa-balance-scale"></i> <u>Historique des pesées </u></h4>
  <table id="liste_demandes" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                    
                      <th style=" text-align: center">Date</th>
                        <th style=" text-align: center">Ordures ménagères<br>(en kg)</th>
                        <th style=" text-align: center">Tri sélectif<br>(en kg)</th>
                        <th style=" text-align: center">Compost<br>(en kg)</th>
                        <th style=" text-align: center">Verre<br>(en kg)</th>
                         <th style=" text-align: center">Textile<br>(en kg)</th>
                        <th style=" text-align: center">Bac marron<br>(en kg)</th>
                        <th style=" text-align: center">Remarques</th>
                        <th style=" text-align: center">Supp.</th>
                      </tr>
                    </thead>
                    <tbody>
                  
<?php
 $data=$pesee->affichePesee($_SESSION['id_membre']);    
 
 
  foreach($data as $event){
			
			$id=$event->id_pesee;
			$date=$event->date;
                        $ordures_menageres=$event->ordures_menageres;
                        $tri_selectif=$event->tri_selectif;
                        $compost=$event->compost;
			$verre=$event->verre;
                        $dechetterie=$event->dechetterie;
                        $bac_marron=$event->bac_marron;
                        $remarques= htmlspecialchars($event->remarques);
                        
                        if(!isset($ordures_menageres)){$ordures_menageres="RAS";};
                        if(!isset($tri_selectif)){$tri_selectif="RAS";};
                        if(!isset($compost)){$compost="RAS";};
                        if(!isset($verre)){$verre="RAS";};
                        if(!isset($dechetterie)){$dechetterie="RAS";};
                        if(!isset($bac_marron)){$bac_marron="RAS";};
                        
                        if($remarques==""){$remarques="Aucune";};
                        
                        $date= explode(" ", $date);
                        $date= explode("-", $date[0]);
                        $date=$date[2]."-".$date[1]."-".$date[0];
                        
	

echo"
                        
<tr>
  
     <td style=\"width: 10%; text-align: left\">$date </td>
     <td style=\"width: 10%; text-align: center\">$ordures_menageres</td>
     <td style=\"width: 10%; text-align: center\">$tri_selectif</td>
     <td style=\"width: 10%; text-align: center\">$compost</td>
     <td style=\"width: 10%; text-align: center\">$verre</td>
     <td style=\"width: 10%; text-align: center\">$dechetterie</td>
     <td style=\"width: 10%; text-align: center\">$bac_marron</td>
     <td style=\"width: 27%; text-align: left\">$remarques</td>
     <td style=\"width: 3%; text-align: center\"><a href=\"#\" onclick=\"suppPesee($id,new String('$date'));\"><span class=\"label label-danger\">&nbsp;Supp.&nbsp;&nbsp;<i class=\"fa fa-trash\"></i></span></a></td>
     
</tr>";
}
?>


      
                    </tbody>
                   
                  </table>   
                      
                      
                      
                      
                
           </div>  </div>   </div>  </div>    </div>  </div> 
    
             
                     	 
            
                
                
    
                  
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
    
    <!-- Datatable -->
<script src="../../../plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../../../plugins/datatables/media/js/dataTables.bootstrap.min.js"></script>

<script src="../../../plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/es6-promise/latest/es6-promise.auto.min.js"></script> <!-- IE support -->

  <script src="../../../plugins/jquery-ui-1.11.4/jquery-ui.min.js"></script>
  
<script>
     
      $(function () {

        $('#liste_demandes').DataTable({
       "stateSave": true,
         "stateDuration": 60 * 3,
          "ordering": false,
           "searching": false,
           "lengthChange": false,
             "paging": true,
           

            
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
      
     
      });
      
     
     
      
       function suppPesee(id_pesee,date_pesee) {
  	  
  swal({
  title: 'Etes vous sûr de vouloir supprimer cette pesées ?',
  text: ""+date_pesee,
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Oui, on supprime !',
  cancelButtonText: 'Annuler !'
}).then(function () {
 document.location.href="supp_pesee.php?id_pesee="+id_pesee;
})
       };
       
       
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
  title: 'Ajout de la pésée enregistrée !',
  text: "Merci de votre participation",
  type: 'success',

})
    
 }       
      
      
function Ajout_ko() {
  	  
  swal({
  title: 'Ajout de la pesée refusée !',
  text: "Attention de bien saisir uniqement des chiffres dans les pésées",
  type: 'error',

})


}       
      </script>


  </body>
</html>
