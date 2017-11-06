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

// calcul nombre personne du foyer
 $NbrPersFoyer=$recherche->InfosMembre2($_GET['id_membre']);
 $NbrPersFoyer=$NbrPersFoyer['foyer_adulte']+$NbrPersFoyer['foyer_enfant']+$NbrPersFoyer['foyer_bebe'];
 
 // conso sur une periode de 15 jours / habitant 
 $OM_agglo=257/365*15;
 $OM_fr=269/365*15;
 $tri_agglo=55/365*15;
 $tri_fr=47/365*15;
 //$compost_agglo=257/365*15;
 //$compost_fr=269/365*15;
 $verre_agglo=26/365*15;
 $verre_fr=29/365*15;
 $textile_agglo=3.6/365*15;
 $textile_fr=2.5/365*15;
 //$marron_agglo=257/365*15;
 //$marron_fr=269/365*15;
 
 function dataset($type_dechet,$NbrPersFoyer)
 {
     
$data=$type_dechet*$NbrPersFoyer;
$data=number_format($data, 4, '.', '');
$data=$data.",".$data.",".$data.",".$data.",".$data.",".$data.",".$data.",".$data.",".$data.",".$data;
     
 return $data;
 }   

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
   
    <script src="../../../plugins/Chart.js-master/dist/Chart.js"></script>


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
    if ($id=="Non"){$id="<span class=\"label label-danger\">Non</span>";}
    if ($id==2){$id="<span class=\"label label-success\">Je m'engage</span>";}
    if ($id==3){$id=" <span class=\"label label-info\">Je progresse</span>";}
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
<li>Limiter les emballages => $engage_emballages</li>
<li>Limiter les produits jetables =>  $engage_jetables</li>
<li>Cuisiner au lieu d'acheter des produits industriels suremballés => $engage_fait_maison</li>
<li>Limiter le gaspillage alimentaire => $engage_gaspillage</li>
<li>Composter mes déchets de cuisine dans un composteur individuel => $engage_compostage_indiv</li>
<li>Composter mes déchets de cuisine dans un lombricomposteur => $engage_lombri</li>
<li>Composter mes déchets de cuisine dans un composteur collectif => $engage_compostage_collect</li>
<li>Donner mes restes et épluchures aux animaux => $engage_reste</li>
<li>Favoriser l'occasion, la réparation, le prêt, le don... => $engage_occasion</li>
<li>Coller un autocollant stop pub => $engage_stoppub</li>
<li>Acheter/fabriquer des produits d'entretien ou d'hygiène plus naturels => $engage_fabrique</li>
<li>Boire l'eau du robinet => $engage_eau</li>
<li>Utiliser des piles rechargeables => $engage_pile</li>
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
                         <th style=" text-align: center">Textile<br>(en kg)</th>
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
              <h3 class="box-title">Participation aux ateliers </h3>
              <div class="box-tools pull-right">
                   <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
  <div class="box-body">
      
      <ul>
 <?php       
 
 $data2=$recherche->afficheAtelierMembre($_GET['id_membre']);    
 
 
  foreach($data2 as $event){
			
			
          $nom_reunion= htmlspecialchars($event->nom_reunion);
          
          echo"<li>$nom_reunion</li>";
  }               
          
  ?>        
      </ul>
      
       </div></div>


            </div><!-- /.col -->
          </div><!-- /.row -->
          
          
              <div class="row">
            <div class="col-md-12">
              <div class="box box-primary collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Ordures ménagéres</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button> 
                    <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>-->
                 
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                	
             <div class="row">
               <canvas id="canvas_OM" height="100px"></canvas>
             
             </div>
  	
            
                	   </div>
           
                 
    </div>
          
            </div></div>   
                
                  <div class="row">
            <div class="col-md-12">
              <div class="box box-primary collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Tri sélectif</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button> 
                    <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>-->
                 
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                	
             <div class="row">
                 <canvas id="canvas_tri" height="100px"></canvas>
             
             </div>
  	
            
                	   </div>
           
                 
    </div>
          
            </div></div>   
                
                  <div class="row">
            <div class="col-md-12">
              <div class="box box-primary collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Compost</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button> 
                    <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>-->
                 
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                	
             <div class="row">
                <canvas id="canvas_compost" height="100px"></canvas>
             
             </div>
  	
            
                	   </div>
           
                 
    </div>
          
            </div></div>   
                
                  <div class="row">
            <div class="col-md-12">
              <div class="box box-primary collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Verre</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button> 
                    <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>-->
                 
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                	
             <div class="row">
                <canvas id="canvas_verre" height="100px"></canvas>
             
             </div>
  	
            
                	   </div>
           
                 
    </div>
          
            </div></div>   
                
                  <div class="row">
            <div class="col-md-12">
              <div class="box box-primary collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Textile</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button> 
                    <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>-->
                 
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                	
             <div class="row">
                <canvas id="canvas_textile" height="100px"></canvas>
             
             </div>
  	
            
                	   </div>
           
                 
    </div>
          
            </div></div>   
                
                
                   <div class="row">
            <div class="col-md-12">
              <div class="box box-primary collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Bac marron</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button> 
                    <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>-->
                 
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                	
             <div class="row">
                <canvas id="canvas_marron" height="100px"></canvas>
             
             </div>
  	
            
                	   </div>
           
                 
    </div>
          
            </div></div>  
                
                
          
          
          
          
          
          
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
 

<script>
     

 var config_OM = {
            type: 'line',
            data: {
                labels: ["15 déc.", "31 déc.", "15 janv.", "31 janv.", "15 fév.", "28 fév.", "15 mars", "31 mars", "15 avril", "30 avril"],
                datasets: [
                 {
                    label: "France",
                    data: [<?php echo dataset($OM_fr,$NbrPersFoyer);?>],
                    fill: false,
                    borderDash: [5, 5],
                    borderColor :'rgba(100, 100, 100, 1)',
                    backgroundColor : 'rgba(100, 100, 100, 1)',
                    pointBorderColor :'rgba(100, 100, 100, 1)',
                    pointBackgroundColor : 'rgba(100, 100, 100, 1)',
                    pointBorderWidth : 1
                },    
                {
                    label: "Agglo Pau Béarn Pyrénées",
                    data: [<?php echo dataset($OM_agglo,$NbrPersFoyer);?>],
                    fill: false,
                    borderDash: [5, 5],
                    borderColor :'rgba(160, 160, 160, 1)',
                    backgroundColor : 'rgba(160, 160, 160, 1)',
                    pointBorderColor :'rgba(160, 160, 160, 1)',
                    pointBackgroundColor : 'rgba(160, 160, 160, 1)',
                    pointBorderWidth : 1
                }, 
                {
                    label: "Vos production de déchets",
                    data: [<?php echo $recherche->datasetMembre($_GET['id_membre'],'ordures_menageres');?>],
                    borderColor :'rgba(183,192,210,0.9)',
                    backgroundColor : 'rgba(183,192,210,0.75)',
                    pointBorderColor :'rgba(183,192,210,0.9)',
                    pointBackgroundColor : 'rgba(183,192,210,0.9)',
                    pointBorderWidth : 1
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Ordures ménagéres pour un foyer de <?php echo $NbrPersFoyer; ?> personnes en kg'
                },
                tooltips: {
                    mode: 'label',
                    callbacks: {
                      
                    }
                },
                hover: {
                    mode: 'dataset'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Value'
                        },
                        ticks: {
                            suggestedMin:0,
                            suggestedMax: 50,
                        }
                    }]
                }
            }
        };

 var ctx_OM          = $('#canvas_OM').get(0).getContext('2d')
 var ChartOM                = new Chart(ctx_OM, config_OM);
   
 </script>
    
<script>
     

 var config_tri = {
            type: 'line',
            data: {
                labels: ["15 déc.", "31 déc.", "15 janv.", "31 janv.", "15 fév.", "28 fév.", "15 mars", "31 mars", "15 avril", "30 avril"],
                datasets: [
                 {
                    label: "France",
                    data: [<?php echo dataset($tri_fr,$NbrPersFoyer);?>],
                    fill: false,
                    borderDash: [5, 5],
                    borderColor :'rgba(100, 100, 100, 1)',
                    backgroundColor : 'rgba(100, 100, 100, 1)',
                    pointBorderColor :'rgba(100, 100, 100, 1)',
                    pointBackgroundColor : 'rgba(100, 100, 100, 1)',
                    pointBorderWidth : 1
                },    
                {
                    label: "Agglo Pau Béarn Pyrénées",
                    data: [<?php echo dataset($tri_agglo,$NbrPersFoyer);?>],
                    fill: false,
                    borderDash: [5, 5],
                    borderColor :'rgba(160, 160, 160, 1)',
                    backgroundColor : 'rgba(160, 160, 160, 1)',
                    pointBorderColor :'rgba(160, 160, 160, 1)',
                    pointBackgroundColor : 'rgba(160, 160, 160, 1)',
                    pointBorderWidth : 1
                }, 
                {
                    label: "Vos production de déchets",
                    data: [<?php echo $recherche->datasetMembre($_GET['id_membre'],'tri_selectif');?>],
                    borderColor :'rgba(235,145,0,0.9)',
                    backgroundColor : 'rgba(235,145,0,0.75)',
                    pointBorderColor :'rgba(235,145,0,0.9)',
                    pointBackgroundColor : 'rgba(235,145,0,0.9)',
                    pointBorderWidth : 1
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Tri selectif pour un foyer de <?php echo $NbrPersFoyer; ?> personnes en kg'
                },
                tooltips: {
                    mode: 'label',
                    callbacks: {
                      
                    }
                },
                hover: {
                    mode: 'dataset'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Value'
                        },
                        ticks: {
                            suggestedMin:0,
                            suggestedMax: 12,
                        }
                    }]
                }
            }
        };

 var ctx_tri         = $('#canvas_tri').get(0).getContext('2d')
 var Charttri                = new Chart(ctx_tri, config_tri);
   
 </script>

  
<script>
     

 var config_compost = {
            type: 'line',
            data: {
                labels: ["15 déc.", "31 déc.", "15 janv.", "31 janv.", "15 fév.", "28 fév.", "15 mars", "31 mars", "15 avril", "30 avril"],
                datasets: [
                 {
                    label: "France",
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    fill: false,
                    borderDash: [5, 5],
                    borderColor :'rgba(100, 100, 100, 1)',
                    backgroundColor : 'rgba(100, 100, 100, 1)',
                    pointBorderColor :'rgba(100, 100, 100, 1)',
                    pointBackgroundColor : 'rgba(100, 100, 100, 1)',
                    pointBorderWidth : 1
                },    
                {
                    label: "Agglo Pau Béarn Pyrénées",
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    fill: false,
                    borderDash: [5, 5],
                    borderColor :'rgba(160, 160, 160, 1)',
                    backgroundColor : 'rgba(160, 160, 160, 1)',
                    pointBorderColor :'rgba(160, 160, 160, 1)',
                    pointBackgroundColor : 'rgba(160, 160, 160, 1)',
                    pointBorderWidth : 1
                }, 
                {
                    label: "Vos production de déchets",
                    data: [<?php echo $recherche->datasetMembre($_GET['id_membre'],'compost');?>],
                    borderColor :'rgba(0,153,84,0.9)',
                    backgroundColor : 'rgba(0,153,84,0.75)',
                    pointBorderColor :'rgba(0,153,84,0.9)',
                    pointBackgroundColor : 'rgba(0,153,84,0.9)',
                    pointBorderWidth : 1
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Compost pour un foyer de <?php echo $NbrPersFoyer; ?> personnes en kg'
                },
                tooltips: {
                    mode: 'label',
                    callbacks: {
                      
                    }
                },
                hover: {
                    mode: 'dataset'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Value'
                        },
                        ticks: {
                            suggestedMin:0,
                            suggestedMax: 20,
                        }
                    }]
                }
            }
        };

 var ctx_compost        = $('#canvas_compost').get(0).getContext('2d')
 var Chartcompost               = new Chart(ctx_compost, config_compost);
   
 </script>
  
<script>
     

 var config_verre = {
            type: 'line',
            data: {
                labels: ["15 déc.", "31 déc.", "15 janv.", "31 janv.", "15 fév.", "28 fév.", "15 mars", "31 mars", "15 avril", "30 avril"],
                datasets: [
                 {
                    label: "France",
                    data: [<?php echo dataset($verre_fr,$NbrPersFoyer);?>],
                    fill: false,
                    borderDash: [5, 5],
                    borderColor :'rgba(100, 100, 100, 1)',
                    backgroundColor : 'rgba(100, 100, 100, 1)',
                    pointBorderColor :'rgba(100, 100, 100, 1)',
                    pointBackgroundColor : 'rgba(100, 100, 100, 1)',
                    pointBorderWidth : 1
                },    
                {
                    label: "Agglo Pau Béarn Pyrénées",
                    data: [<?php echo dataset($verre_agglo,$NbrPersFoyer);?>],
                    fill: false,
                    borderDash: [5, 5],
                    borderColor :'rgba(160, 160, 160, 1)',
                    backgroundColor : 'rgba(160, 160, 160, 1)',
                    pointBorderColor :'rgba(160, 160, 160, 1)',
                    pointBackgroundColor : 'rgba(160, 160, 160, 1)',
                    pointBorderWidth : 1
                }, 
                {
                    label: "Vos production de verre",
                    data: [<?php echo $recherche->datasetMembre($_GET['id_membre'],'verre');?>],
                    borderColor :'rgba(25,136,200,0.9)',
                    backgroundColor : 'rgba(25,136,200,0.75)',
                    pointBorderColor :'rgba(25,136,200,0.9)',
                    pointBackgroundColor : 'rgba(25,136,200,0.9)',
                    pointBorderWidth : 1
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Verre pour un foyer de <?php echo $NbrPersFoyer; ?> personnes  en kg'
                },
                tooltips: {
                    mode: 'label',
                    callbacks: {
                      
                    }
                },
                hover: {
                    mode: 'dataset'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Value'
                        },
                        ticks: {
                            suggestedMin:0,
                            suggestedMax: 6,
                        }
                    }]
                }
            }
        };

 var ctx_verre         = $('#canvas_verre').get(0).getContext('2d')
 var Chartverre                = new Chart(ctx_verre, config_verre);
   
 </script>
   
<script>
     

 var config_textile = {
            type: 'line',
            data: {
                labels: ["15 déc.", "31 déc.", "15 janv.", "31 janv.", "15 fév.", "28 fév.", "15 mars", "31 mars", "15 avril", "30 avril"],
                datasets: [
                 {
                    label: "France",
                    data: [<?php echo dataset($textile_fr,$NbrPersFoyer);?>],
                    fill: false,
                    borderDash: [5, 5],
                    borderColor :'rgba(100, 100, 100, 1)',
                    backgroundColor : 'rgba(100, 100, 100, 1)',
                    pointBorderColor :'rgba(100, 100, 100, 1)',
                    pointBackgroundColor : 'rgba(100, 100, 100, 1)',
                    pointBorderWidth : 1
                },    
                {
                    label: "Agglo Pau Béarn Pyrénées",
                    data: [<?php echo dataset($textile_agglo,$NbrPersFoyer);?>],
                    fill: false,
                    borderDash: [5, 5],
                    borderColor :'rgba(160, 160, 160, 1)',
                    backgroundColor : 'rgba(160, 160, 160, 1)',
                    pointBorderColor :'rgba(160, 160, 160, 1)',
                    pointBackgroundColor : 'rgba(160, 160, 160, 1)',
                    pointBorderWidth : 1
                }, 
                {
                    label: "Vos production de textile",
                    data: [<?php echo $recherche->datasetMembre($_GET['id_membre'],'dechetterie');?>],
                    borderColor :'rgba(0,171,214,0.9)',
                    backgroundColor : 'rgba(0,171,214,0.75)',
                    pointBorderColor :'rgba(0,171,214,0.9)',
                    pointBackgroundColor : 'rgba(0,171,214,0.9)',
                    pointBorderWidth : 1
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Textile pour un foyer de <?php echo $NbrPersFoyer; ?> personnes  en kg'
                },
                tooltips: {
                    mode: 'label',
                    callbacks: {
                      
                    }
                },
                hover: {
                    mode: 'dataset'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Value'
                        },
                        ticks: {
                            suggestedMin:0,
                            suggestedMax: 1,
                        }
                    }]
                }
            }
        };

 var ctx_textile         = $('#canvas_textile').get(0).getContext('2d')
 var Charttextile               = new Chart(ctx_textile, config_textile);
   
 </script>
   
<script>
     

 var config_marron = {
            type: 'line',
            data: {
                labels: ["15 déc.", "31 déc.", "15 janv.", "31 janv.", "15 fév.", "28 fév.", "15 mars", "31 mars", "15 avril", "30 avril"],
                datasets: [
                 {
                    label: "France",
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    fill: false,
                    borderDash: [5, 5],
                    borderColor :'rgba(100, 100, 100, 1)',
                    backgroundColor : 'rgba(100, 100, 100, 1)',
                    pointBorderColor :'rgba(100, 100, 100, 1)',
                    pointBackgroundColor : 'rgba(100, 100, 100, 1)',
                    pointBorderWidth : 1
                },    
                {
                    label: "Agglo Pau Béarn Pyrénées",
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    fill: false,
                    borderDash: [5, 5],
                    borderColor :'rgba(160, 160, 160, 1)',
                    backgroundColor : 'rgba(160, 160, 160, 1)',
                    pointBorderColor :'rgba(160, 160, 160, 1)',
                    pointBackgroundColor : 'rgba(160, 160, 160, 1)',
                    pointBorderWidth : 1
                }, 
                {
                    label: "Vos production de déchets",
                    data: [<?php echo $recherche->datasetMembre($_GET['id_membre'],'bac_marron');?>],
                    borderColor :'rgba(77,36,0,0.9)',
                    backgroundColor : 'rgba(77,36,0,0.75)',
                    pointBorderColor :'rgba(77,36,0,0.9)',
                    pointBackgroundColor : 'rgba(77,36,0,0.9)',
                    pointBorderWidth : 1
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Bac marron pour un foyer de <?php echo $NbrPersFoyer; ?> personnes en kg'
                },
                tooltips: {
                    mode: 'label',
                    callbacks: {
                      
                    }
                },
                hover: {
                    mode: 'dataset'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            show: true,
                            labelString: 'Value'
                        },
                        ticks: {
                            suggestedMin:0,
                            suggestedMax: 20,
                        }
                    }]
                }
            }
        };

 var ctx_marron         = $('#canvas_marron').get(0).getContext('2d')
 var Chartmarron                = new Chart(ctx_marron, config_marron);
   
 </script>

  </body>
</html>