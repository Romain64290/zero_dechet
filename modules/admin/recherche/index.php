<?php

 //***** Dernière modification : 17/06/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
$menu=7;
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');


 	


// préparation connexion
$connect = new connection();
$recherche = new recherche($connect);



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
     
    
    <script src="../../../plugins/Chart.js-master/dist/Chart.js"></script>
    
      <!-- DataTables -->
     <link rel="stylesheet" href="../../../plugins/datatables/media/css/dataTables.bootstrap.min.css">

<style>
	
.hauteur {
    height: 60px;
   
}	
	
</style>

  </head>
 
  <body class="hold-transition skin-blue sidebar-mini">
  	
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
            Recherche particpants
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Accueil</a></li>
            <li class="active">Recherche participants</li>
          </ol>
        </section>

        <!-- Main content -->
    
        <section class="content">
                <!-- Info boxes -->
     
         
         <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Liste des membres</h3>
                  <div class="box-tools pull-right">
                   <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> 
                     <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>-->
                 
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                	
            
               
             <table id="participants" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      	<th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Commune</th>
                        <th>profil</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                  
<?php

$data=$recherche->afficheMembres();    
 
$compteur=1;
 
  foreach($data as $event){
			
			$id_membre=$event->id_membre;
			$nom_membre= htmlspecialchars($event->nom_membre);
                        $prenom_membre= htmlspecialchars($event->prenom_membre);
                        $email= htmlspecialchars($event->email);
                        $telephone= htmlspecialchars($event->telephone);
                        $commune= htmlspecialchars($event->commune);
                

echo "
<tr>
            <td>$compteur</td>
            <td> $nom_membre <div style=\"color:red\">[Alerte]</div></td>
            <td>$prenom_membre</td>
            <td>$telephone</td>
            <td>$email</td>
            <td>$commune</td>
            <td><a href=\"profil.php?id_membre=$id_membre&email=$email\">Voir le profil</a></td> </tr>
";

$compteur++;
}

?>

  </tbody>
                   
                  </table>

            
  	
            
                	   </div>
           
                 
    </div>
          
               </div></div>
    
       Afficher l'historique des participations des membres : <a href="../ateliers/historique_pdf.php" target="_blank"><span class="label label-primary"><i class="fa fa-download"></i> &nbsp; PDF</span></a>   
       
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

 <script>
     
      $(function () {

        $('#participants').DataTable({
       "stateSave": true,
         "stateDuration": 60 * 3,
          "ordering": false,
           "searching": true,
           "lengthChange": true,
             "paging": true,
           

            
            "language": {
            "lengthMenu": "_MENU_  enregistrements par page",
            "zeroRecords": "Désolé, aucun résultat trouvé.",
             "info": "Affichage page _PAGE_ sur _PAGES_. _TOTAL_ entrées au total.",
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
      
    </script>  
      
  </body>
</html>
