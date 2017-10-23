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
                  





<tr>
            <td>1</td>
            <td>AL OUCH ARWAL </td>
            <td>Samah</td>
            <td>0625790036</td>
            <td>samahsaif7@gmail.com</td>
            <td>PAU</td>
            <td><a href="mes_activites.php?id_user=78&email=samahsaif7@gmail.com">Voir le profil</a></td> </tr>




<tr>
            <td>2</td>
            <td>AZZDDINE</td>
            <td>Mourad</td>
            <td>0629902306</td>
            <td>mazzddine@yahoo.com</td>
            <td>LOns</td>
            <td><a href="mes_activites.php?id_user=94&email=mazzddine@yahoo.com">Voir le profil</a></td> </tr>




<tr>
            <td>3</td>
            <td>BELLOCQ</td>
            <td>Denise</td>
            <td>0676982415</td>
            <td>bellocq.guy@wanadoo.fr</td>
            <td>Lescar</td>
            <td><a href="mes_activites.php?id_user=15&email=bellocq.guy@wanadoo.fr">Voir le profil</a></td> </tr>


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

 
  </body>
</html>
