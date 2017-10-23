<?php

 //***** Dernière modification : 17/06/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
$menu=4;
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');

require(__DIR__ .'/model.inc.php');

// préparation connexion
$connect = new connection();
$atelier = new atelier($connect);


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


  </head>
 
  <body class="hold-transition skin-blue sidebar-mini"  >
  	
    <div class="wrapper">
    	
<?php
require(__DIR__ .'/../../../include/main_header.php');
require(__DIR__ .'/../../../include/main_slidebar.php');
?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Ateliers
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-calendar"></i> Acccueil</a></li>
            <li class="active">Ateliers</li>
          </ol>
        </section>

        <!-- Main content -->
    
        <section class="content">
                <!-- Info boxes -->
     
           
            <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Liste des ateliers proposés</h3>
                  <div class="box-tools pull-right">
              
                     <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                 
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                	
                <!-- Info boxes -->
                
 <?php  
 
  $data=$atelier->afficheReunion();    
 
 
  foreach($data as $event){
			
	$id=$event->id_reunion;
        $date=$event->date_reunion;
        $titre= htmlspecialchars($event->nom_reunion);
        $description= htmlspecialchars($event->description);
        $description = str_replace(array("\r\n", "\r", "\n"), "<br>", $description); 
        $type_reunion=$event->type_reunion;
        $adresse= htmlspecialchars($event->adresse);
        $lien_map= htmlspecialchars($event->lien_map);
        $nom_commune=$event->nom_commune;
                        
                       
    
    $date= explode(" ",$date);
    $heure= explode(":", $date[1]);
    $heure = $heure[0]."h".$heure[1];
    $date_fr= explode("-", $date[0]);
    $date_fr=$date_fr[2]."/".$date_fr[1]."/".$date_fr[0];
    $date_heure=$date_fr." à ".$heure;
    ?>               
                
                      <!-- Post -->
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../../dist/img/meeting.jpg" alt="user image">
                        <span class="username">
                          <a href="#"><?php echo $titre; ?></a>
                         
                        </span>
                    <span class="description"><?php echo $date_heure; ?></span>
                  </div>
                  <!-- /.user-block -->
                  <p>   
                    <?php echo $description; 
                    echo "<br><br>" ;
                    echo "$adresse , $nom_commune<br>";
                    echo"<a href=\"$lien_map\" target=\"_blank\">Voir sur Google Map</a>";
                    
                    
                    ?>
                  </p>
                  <ul class="list-inline">
 
 <?php                     
                      
$verifInscription=$atelier->VerifInscription($id, $_SESSION['id_membre']);   


                      
if ($verifInscription==NULL){
       
 echo  " 
 <li><a href=\"participation.php?inscription=2&id_reunion=".$id."\" class=\"link-black text-sm\" ><i class=\"fa fa-thumbs-o-down margin-r-5\"  ></i> Je ne participe pas</a></li>
                    <li ><a href=\"participation.php?inscription=1&id_reunion=".$id."\" class=\"link-black text-sm\" ><i class=\"fa fa-thumbs-o-up margin-r-5\"  ></i>Je souhaite participer</a>
                    </li>
 ";                     
                      
   
}
else{
       
 $presence=$verifInscription['presence'];
  
 if($presence==1){
 echo" <li><a href=\"participation.php?inscription=2&id_reunion=$id\" class=\"link-black text-sm\" ><i class=\"fa fa-thumbs-o-down margin-r-5\"  ></i> Je ne participe pas</a></li>
                    <li ><a href=\"participation.php?inscription=1&id_reunion=$id\" class=\"link-black text-sm\" style=\"color:green\"><i class=\"fa fa-thumbs-o-up margin-r-5\"  ></i><b>Je souhaite participer</b></a>
                    </li>      ";    
 }
 
 if($presence==2){
 echo" <li><a href=\"participation.php?inscription=2&id_reunion=$id\" class=\"link-black text-sm\" style=\"color:red\"><i class=\"fa fa-thumbs-o-down margin-r-5\"  ></i><b> Je ne participe pas</b></a></li>
                    <li ><a href=\"participation.php?inscription=1&id_reunion=$id\" class=\"link-black text-sm\" <i class=\"fa fa-thumbs-o-up margin-r-5\"  ></i>Je souhaite participer</a>
                    </li>       ";    
 }
 
 if($presence==3){
 echo" <li><a href=\"#\" class=\"link-black text-sm\"><i class=\"fa fa-thumbs-o-down margin-r-5\"  ></i> Je ne participe pas</a></li>
                    <li ><a href=\"#\" class=\"link-black text-sm\"><i class=\"fa fa-thumbs-o-up margin-r-5\"  ></i>Je souhaite participer</a>
                    </li><div style=\"color:red\"><i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> Attention votre demande de participation a été refusée par l'administrateur en raison d'un nombre de place limité.</div>         ";    
 }
 
 
 
 
           
                   
                    
  
}
?>                      
                     
                    
                    
                    
                    
                   
                  </ul>

        
                </div>
                <!-- /.post -->

             
  <?php } ?>
                
           </div>  </div>   </div>  </div>           
                     	 
                 
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
  


  </body>
</html>
