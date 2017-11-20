<?php

 //***** Dernière modification : 17/06/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
$menu=5;
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');

// préparation connexion
$connect = new connection();
$journal = new journal($connect);


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
    
     
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


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
          <h1>Journal de bord
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-pencil-square"></i> Acccueil</a></li>
            <li class="active">Jornal de bord</li>
          </ol>
        </section>

        <!-- Main content -->
    
        <section class="content">
                <!-- Info boxes -->
     
                
                
   <ul class="timeline">

    <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-orange">
            <?php echo strftime("%e %b %G"); ?>
        </span>
    </li>
    <!-- /.timeline-label -->

 <?php  
 
  $data=$journal->afficheNews($_SESSION['id_membre']);    
 
 
  foreach($data as $event){
			
			$id=$event->id_news;
			$date=$event->date;
                        $titre= htmlspecialchars($event->titre);
                         $news= $event->news;
                       
    
    $date= explode(" ",$date);
    $heure= explode(":", $date[1]);
    $heure = $heure[0]."h".$heure[1];
    $date_fr= explode("-", $date[0]);
    $date_fr=$date_fr[2]."/".$date_fr[1]."/".$date_fr[0];
    $date_heure=$date_fr." à ".$heure;
    ?>
    
    <li>
        <!-- timeline icon -->
        <i class="fa fa-envelope bg-blue"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> <?php echo $date_heure; ?></span>

            <h3 class="timeline-header"><a href="#"> <?php echo $titre; ?></a></h3>

            <div class="timeline-body">
           
               <?php echo $news; ?>
            </div>

            <div class="timeline-footer" align="right">
                <a href="#" onclick="suppNews(<?php echo $id; ?>,new String('<?php echo $titre; ?>'));"><span class="label label-danger">&nbsp;Supp.&nbsp;&nbsp;<i class="fa fa-trash"></i></span></a>
            </div>
        </div>
    </li>
    <!-- END timeline item -->
    
  <?php }
    
   ?> 
    
    
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
                
                <br>
                
                
                
                
                
           
            <div class="row">
                <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                      <i class="fa fa-envelope"></i>
                    <h3 class="box-title">Ajoutez une news</h3>
                  <div class="box-tools pull-right">
                      
            
                     <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-minus"></i></button>
                 
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Fermer"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                	
                <!-- Info boxes -->
                <form name="inscriptionForm"  id="inscriptionForm" role="form" data-toggle="validator" action="ajout_news.php" method="post" data-disable="false">
                  
                    
 <div class="form-group has-feedback">
          	
 	 <div class="input-group">
     <input type="text" class="form-control"  value="" placeholder="Titre de la news" required name="titre" data-error="Veuillez saisir un titre" size="60"> </div>  
     <div class="help-block with-errors"></div>
  
     </div>  
        	<br>
     
     <div class="form-group has-feedback">
     <div class="input-group">
      <textarea  class="textarea" placeholder="Commentaire" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"  name="news"></textarea>
      
       </div>  </div>   
                   
                    <button type="reset" class="btn btn-default" ><i class="fa fa-arrow-circle-left"></i> Annuler</button>  
                <button type="submit" class="btn btn-primary" ><i class="fa fa-floppy-o"></i> &nbsp; Ajouter la news</button> 
                    
                    
                    
                </form>   
                
           </div>  </div>   </div>
            <div class="col-md-3"></div>
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
    
    <!-- Datatable -->
<script src="../../../plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../../../plugins/datatables/media/js/dataTables.bootstrap.min.js"></script>

<script src="../../../plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/es6-promise/latest/es6-promise.auto.min.js"></script> <!-- IE support -->

  <script src="../../../plugins/jquery-ui-1.11.4/jquery-ui.min.js"></script>
  
 <!-- Bootstrap WYSIHTML5 -->
    <script src="../../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    
    <script>
      $(function () {
       
  $(".textarea").wysihtml5({
	toolbar:{
      'font-styles':false,
      'color': false,
      'emphasis':{
        'small':true
      },
      'blockquote':false,
      'lists':true,
      'link':false,
      'image':false,
      'smallmodals':false  
   },
    useLineBreaks: true
});
        
        
        
      });
      
            function suppNews(id_news,titre) {
  	  
  swal({
  title: 'Etes vous sûr de vouloir supprimer cet article ?',
  text: ""+titre,
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Oui, on supprime !',
  cancelButtonText: 'Annuler !'
}).then(function () {
 document.location.href="supp_news.php?id_news="+id_news;
})
       };
      
    </script>

  </body>
</html>
