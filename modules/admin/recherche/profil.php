<?php

/***** Dernière modification : 02/11/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
$menu=7;

//include("../../../include/verif_droits.php");
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');



// préparation connexion
$connect = new connection();
$recherche = new recherche($connect);

// recupération des information d'un membre
$data=$recherche->InfosMembre($_GET['id_membre'],$_GET['email']); 

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
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../../../plugins/timepicker/bootstrap-timepicker.min.css">
        <!-- iCheck -->
    <link rel="stylesheet" href="../../../plugins/iCheck/square/blue.css">

 
 <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">
    
   <!-- Jquerry ui pour date picker-->
  <link rel="stylesheet" href="../../../plugins/jquery-ui-1.11.4/themes/smoothness/jquery-ui.css">
  <script src="../../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <script src="../../../plugins/jquery-ui-1.11.4/jquery-ui.js"></script>
  
   <link rel="stylesheet" href="../../../plugins/sweetalert2/sweetalert2.min.css">


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
            Profil participant
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="../index.php"><i class="fa fa-users"></i> Accueil</a></li>
            <li class="active">Profil particpant</li>
          </ol>
        </section>
     



  	<!-- Main content -->
        <section class="content">
          <div class="row">
            
            <div class="col-md-12">
              <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Informations générales </h3>
              <div class="box-tools pull-right">
                   <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
  <div class="box-body">
 
<?php

$nom_membre=htmlspecialchars($data['nom_membre']);
$prenom_membre=htmlspecialchars($data['prenom_membre']);
$adresse=htmlspecialchars($data['adresse']);
$code_postal=htmlspecialchars($data['code_postal']);
$commune=htmlspecialchars($data['commune']);
$telephone=htmlspecialchars($data['telephone']);
$email=htmlspecialchars($data['email']);
$foyer_adulte=$data['foyer_adulte'];
$foyer_enfant=$data['foyer_enfant'];
$foyer_bebe=$data['foyer_bebe'];
$animaux_familiers=$data['animaux_familiers'];
if($animaux_familiers==1){$animaux_familiers="Aucun";}
if($animaux_familiers==2){$animaux_familiers="Animaux familiers (chat(s), chien(s), rongeur(s) ....)";}
if($animaux_familiers==3){$animaux_familiers="Animaux d'élevage (poules, lapins, moutons, cochons, chevaux...)";}
$type_habitat=$data['type_habitat'];
$zone_habitat=$data['zone_habitat'];
$espaces_exterieurs=$data['espaces_exterieurs'];
$pret_a_peser=$data['pret_a_peser'];
$sensibilisation_dechets=$data['sensibilisation_dechet'];
$pourquoi_participer=htmlspecialchars($data['pourquoi_participer']);
$pourquoi_participer= str_replace(";","<br>",$pourquoi_participer);
$comment_connu=htmlspecialchars($data['comment_connu']);
$temoignage=htmlspecialchars($data['temoignage']);
$commentaires=htmlspecialchars($data['commentaires']);


$engage_emballages=RenommeEngagement($data['engage_emballages']);
$engage_jetables=RenommeEngagement($data['engage_jetables']);
$engage_fait_maison=RenommeEngagement($data['engage_fait_maison']);
$engage_gaspillage=RenommeEngagement($data['engage_gaspillage']);
$engage_compostage_indiv=RenommeEngagement($data['engage_compostage_indiv']);
$engage_lombri=RenommeEngagement($data['engage_lombri']);
$engage_compostage_collect=RenommeEngagement($data['engage_compostage_collect']);
$engage_reste=RenommeEngagement($data['engage_reste']);
$engage_occasion=RenommeEngagement($data['engage_occasion']);
$engage_stoppub=RenommeEngagement($data['engage_stoppub']);
$engage_fabrique=RenommeEngagement($data['engage_fabrique']);
$engage_eau=RenommeEngagement($data['engage_eau']);
$engage_pile=RenommeEngagement($data['engage_pile']);


function RenommeEngagement($id)
{
    if ($id==2){$id="Je m'engage à faire ce nouveau geste";}
    if ($id==3){$id=" Je le fais déjà et je m'engage à m'améliorer !";}
    return $id;
}


echo"
$nom_membre $prenom_membre <br>
$adresse $code_postal $commune <br>
$telephone <br>
$email <br>
<br>

<b>Composition du foyer</b>
<ul>
<li> $foyer_adulte Adulte(s)</li>
<li>$foyer_enfant Enfant(s)</li>
<li>$foyer_bebe Bébé(s)</li>
</ul>

<b>Animaux familiers : </b>  $animaux_familiers <br><br>
    
<b>Type d'habitat</b>
<ul>
<li>Type d'habitat : $type_habitat</li>
<li>Zone d'habitat : $zone_habitat</li>
<li>Espaces extérieurs : $espaces_exterieurs</li>
</ul>

<b>Sensibilisation aux déchets : </b>  $sensibilisation_dechets <br><br>
    
<b>Mes engagements</b>
<ul>
<li>Limiter les emballages : $engage_emballages</li>
<li>Limiter les produits jetables  : $engage_jetables</li>
<li>Cuisiner au lieu d'acheter des produits industriels suremballés: $engage_fait_maison</li>
<li>Limiter le gaspillage alimentaire : $engage_gaspillage</li>
<li>Composter mes déchets de cuisine dans un composteur individuel : $engage_compostage_indiv</li>
<li>Composter mes déchets de cuisine dans un lombricomposteur : $engage_lombri</li>
<li>Composter mes déchets de cuisine dans un composteur collectif : $engage_compostage_collect</li>
<li>Donner mes restes et épluchures aux animaux : $engage_reste</li>
<li>Favoriser l'occasion, la réparation, le prêt, le don... : $engage_occasion</li>
<li>Coller un autocollant stop pub : $engage_stoppub</li>
<li>Acheter/fabriquer des produits d'entretien ou d'hygiène plus naturels : $engage_fabrique</li>
<li>Boire l'eau du robinet : $engage_eau</li>
<li>Utiliser des piles rechargeables : $engage_pile</li>
</ul>
    
<b>Pret à peser : </b>  $pret_a_peser <br><br>
    
<b>Pourquoi participer ? </b><br>  $pourquoi_participer <br><br>
    
<b>Témoignage : </b>  $temoignage <br><br>
    
<b>Comment avez vous connu ?</b>  $comment_connu <br><br>
    
<b>Commentaires : </b>  $commentaires <br><br>
    

";

?>
 
            </div></div>


            </div><!-- /.col -->
          </div><!-- /.row -->
          
          
   <div class="row">
            
            <div class="col-md-12">
              <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Les pesées </h3>
              <div class="box-tools pull-right">
                   <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
  <div class="box-body">
      
      
       <table id="pesees" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                    
                      <th style=" text-align: center">Date</th>
                        <th style=" text-align: center">Ordures ménagères<br>(en kg)</th>
                        <th style=" text-align: center">Tri sélectif<br>(en kg)</th>
                        <th style=" text-align: center">Compost<br>(en kg)</th>
                        <th style=" text-align: center">Verre<br>(en kg)</th>
                         <th style=" text-align: center">Déchèterie<br>(en kg)</th>
                        <th style=" text-align: center">Bac marron<br>(en kg)</th>
                        <th style=" text-align: center">Remarques</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                  
<?php
 $data=$recherche->affichePesee($_GET['id_membre']);    
 
 
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
     <td style=\"width: 30%; text-align: left\">$remarques</td>
    
     
</tr>";
}
?>


      
                    </tbody>
                   
                  </table>   
                      
      
      
       </div></div>


            </div><!-- /.col -->
          </div><!-- /.row -->
          
          
            <div class="row">
            
            <div class="col-md-12">
              <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Statistiques </h3>
              <div class="box-tools pull-right">
                   <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
  <div class="box-body">
      
       </div></div>


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
    
      <!-- Datatable -->
<script src="../../../plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../../../plugins/datatables/media/js/dataTables.bootstrap.min.js"></script>
    
    
     <!-- InputMask -->
    <script src="../../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../../plugins/input-mask/jquery.inputmask.extensions.js"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="../../../plugins/jquery-ui-1.11.4/jquery-ui.min.js"></script>
    
    
    <!--Validation du formulaire -->
    <script src="../../../include/js/validator.js"></script>
    
    <script src="../../../plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/es6-promise/latest/es6-promise.auto.min.js"></script> <!-- IE support -->
    
    <script>
      $(function () {

        $('#pesees').DataTable({
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
      
    
      
    </script>
 


  </body>
</html>