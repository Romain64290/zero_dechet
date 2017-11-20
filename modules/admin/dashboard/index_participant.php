<?php

 //***** Dernière modification : 17/06/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
$menu=1;
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');


 	


// préparation connexion
$connect = new connection();
$dashboard = new dashboard($connect);

 // calcul nombre personne du foyer
 $NbrPersFoyer=$dashboard->InfosMembre($_SESSION['id_membre']);
 $NbrPersFoyer=$NbrPersFoyer['foyer_adulte']+$NbrPersFoyer['foyer_enfant']+$NbrPersFoyer['foyer_bebe'];
 
 // conso sur une periode de 15 jours / habitant 
 $OM_agglo=243/365*15;
 $OM_fr=269/365*15;
 $tri_agglo=56/365*15;
 $tri_fr=47/365*15;
 $compost_agglo=66/365*15;
 $compost_fr=60/365*15;
 $verre_agglo=27/365*15;
 $verre_fr=29/365*15;
 $textile_agglo=3.6/365*15;
 $textile_fr=2.5/365*15;
 $marron_agglo=2/365*15;
 $marron_fr=19/365*15;
 
 function dataset($type_dechet,$NbrPersFoyer)
 {
     
$data=$type_dechet*$NbrPersFoyer;
$data=number_format($data, 3, '.', '');
$data=$data.",".$data.",".$data.",".$data.",".$data.",".$data.",".$data.",".$data.",".$data.",".$data;
     
 return $data;
 }   
 
?>


<!DOCTYPE html>

<html>
  <head>
 <!--   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta http-equiv="X-UA-Compatible" content="IE=edge" /> -->
<!-- <meta http-equiv="X-UA-Compatible" content="IE=9"> -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

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
     
    
   <!-- <script src="../../../plugins/Chart.js-master/dist/Chart.js"></script> -->
   <script src="../../../plugins/Chart.js-master/dist/Chart.bundle2.js"></script>

<style>
	
.hauteur {
    height: 60px;
   
}	

.chart {
            width: 100% !important;
            max-width: 800px;
            height: auto !important;
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
            Tableau de bord
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Tableau de bord</li>
          </ol>
        </section>

        <!-- Main content -->
    
        <section class="content">
                <!-- Info boxes -->
     
         
         <div class="row">
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Synthèse de vos pesées</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> 
                    <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>-->
                 
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                	
           <div class="row">
                    <div class="col-md-8">
                         <b>> <u>Cumul de vos pesées en Kg</u></b><br><br>
                    	<div class="chart-responsive">
                      	
                         <canvas id="chart"></canvas> 
                        
                      </div><!-- ./chart-responsive -->
                    </div><!-- /.col -->
                    <div class="col-md-4"><br><br><br>
                      <ul class="chart-legend clearfix middle">
                        <li><i class="fa fa-circle-o text-gray"></i> Ordures ménagéres</li>
                        <li><i class="fa fa-circle-o text-yellow"></i> Tri séléctif</li>
                        <li><i class="fa fa-circle-o text-green"></i> Compost</li>
                        <li><i class="fa fa-circle-o text-blue"></i> Verre</li>
                        <li><i class="fa fa-circle-o text-red"></i> Textile</li>
                        <li><i class="fa fa-circle-o text-brown"></i> Bac marron</li>
                      </ul>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                  
  	  <div class="row">
              <div class="col-md-12" ><br>
                  <b>> <u>Projection de vos consommations par habitant sur une année en kg </u></b><br><br>
                        <table  class="table table-bordered table-striped">
                             <thead>
                      <tr>
                      
                       <th style=" text-align: center"></th>
                        <th style=" text-align: center">OM</th>
                        <th style=" text-align: center">Tri sélec.</th>
                        <th style=" text-align: center">Compost</th>
                        <th style=" text-align: center">Verre</th>
                         <th style=" text-align: center">Textile</th>
                        <th style=" text-align: center">Bac marron</th>
                   
                       
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style=" text-align: center">Vous</td>
                            <td style=" text-align: center"><?php echo $OM=$dashboard->projection($_SESSION['id_membre'],0); ?> </td>
                            <td style=" text-align: center" ><?php echo $OM=$dashboard->projection($_SESSION['id_membre'],1); ?></td>
                            <td style=" text-align: center"><?php echo $OM=$dashboard->projection($_SESSION['id_membre'],2); ?></td>
                            <td style=" text-align: center"><?php echo $OM=$dashboard->projection($_SESSION['id_membre'],3); ?></td>
                            <td style=" text-align: center"><?php echo $OM=$dashboard->projection($_SESSION['id_membre'],4); ?></td>
                            <td style=" text-align: center"><?php echo $OM=$dashboard->projection($_SESSION['id_membre'],5); ?></td>
                        </tr>
                         <tr>
                            <td style=" text-align: center">Agglo</td>
                            <td style=" text-align: center">243</td>
                            <td style=" text-align: center" >56</td>
                            <td style=" text-align: center">66</td>
                            <td style=" text-align: center">27</td>
                            <td style=" text-align: center">3,6</td>
                            <td style=" text-align: center">2</td>
                        </tr>
                         <tr>
                            <td style=" text-align: center">France</td>
                            <td style=" text-align: center">269</td>
                            <td style=" text-align: center" >47</td>
                            <td style=" text-align: center">60</td>
                            <td style=" text-align: center">29</td>
                            <td style=" text-align: center">2,5</td>
                            <td style=" text-align: center">19</td>
                        </tr>
                    </tbody>
                        </table>
                        
                	   </div></div></div>
           
                 
    </div>
          
         </div>
                
                
                
                 
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Mes engagements</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> 
                    <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>-->
                 
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                	
             <div class="row">
  
<?php

// recupération des information d'un membre
$data=$dashboard->InfosMembre($_SESSION['id_membre']); 

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
</ul>";

?>
             
             </div>
  	
            
                	   </div>
           
                 
    </div>
          
         </div></div>

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
    
       
    <script>
        
 Chart.plugins.register({
	afterDraw: function(chart) {
  	if (chart.data.datasets.length === 0) {
    	// No data is present
      var ctx = chart.chart.ctx;
      var width = chart.chart.width;
      var height = chart.chart.height
      chart.clear();
      
      ctx.save();
      ctx.textAlign = 'center';
      ctx.textBaseline = 'middle';
      ctx.font = "16px normal 'Helvetica Nueue'";
      ctx.fillText('Aucune donnée à afficher', width / 2, height / 2);
      ctx.restore();
    }
  }
});
 

 
    
var ctx = document.getElementById("chart");
var myChart = new Chart(ctx, {
  type: 'doughnut',
    data : {
     labels: [
                "Ordures ménagères",
                "Tri sélectif",
                 "Compost",
                  "Verre",
                   "Textile",
                    "Bac marron",
            ],
    datasets: [
        {
            data: [<?php echo $cumul=$dashboard->Cumul($_SESSION['id_membre']); ?>],
            backgroundColor: [
                 "#d2d6de",
                "#f39c12",
                "#00a65a",
                "#3c8dbc",
                "#a5000b",
                "#582900"
            ]
           
           
        }]
},
    options: {
    animationSteps: 1000,
    legend : false
     }
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
                    borderColor :'rgba(60, 60, 60, 1)',
                    backgroundColor : 'rgba(60, 60, 60, 1)',
                    pointBorderColor :'rgba(60, 60, 60, 1)',
                    pointBackgroundColor : 'rgba(60, 60, 60, 1)',
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
                    label: "Vos productions de déchets",
                    data: [<?php echo $dashboard->datasetMembre($_SESSION['id_membre'],'ordures_menageres');?>],
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
                    borderColor :'rgba(60, 60, 60, 1)',
                    backgroundColor : 'rgba(60, 60, 60, 1)',
                    pointBorderColor :'rgba(60, 60, 60, 1)',
                    pointBackgroundColor : 'rgba(60, 60, 60, 1)',
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
                    label: "Vos productions de déchets",
                    data: [<?php echo $dashboard->datasetMembre($_SESSION['id_membre'],'tri_selectif');?>],
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
                    data: [<?php echo dataset($compost_fr,$NbrPersFoyer);?>],
                    fill: false,
                    borderDash: [5, 5],
                    borderColor :'rgba(60, 60, 60, 1)',
                    backgroundColor : 'rgba(60, 60, 60, 1)',
                    pointBorderColor :'rgba(60, 60, 60, 1)',
                    pointBackgroundColor : 'rgba(60, 60, 60, 1)',
                    pointBorderWidth : 1
                },    
                {
                    label: "Agglo Pau Béarn Pyrénées",
                    data: [<?php echo dataset($compost_agglo,$NbrPersFoyer);?>],
                    fill: false,
                    borderDash: [5, 5],
                    borderColor :'rgba(160, 160, 160, 1)',
                    backgroundColor : 'rgba(160, 160, 160, 1)',
                    pointBorderColor :'rgba(160, 160, 160, 1)',
                    pointBackgroundColor : 'rgba(160, 160, 160, 1)',
                    pointBorderWidth : 1
                }, 
                {
                    label: "Vos productions de déchets",
                    data: [<?php echo $dashboard->datasetMembre($_SESSION['id_membre'],'compost');?>],
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
                    borderColor :'rgba(60, 60, 60, 1)',
                    backgroundColor : 'rgba(60, 60, 60, 1)',
                    pointBorderColor :'rgba(60, 60, 60, 1)',
                    pointBackgroundColor : 'rgba(60, 60, 60, 1)',
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
                    label: "Vos productions de verre",
                    data: [<?php echo $dashboard->datasetMembre($_SESSION['id_membre'],'verre');?>],
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
                    borderColor :'rgba(60, 60, 60, 1)',
                    backgroundColor : 'rgba(60, 60, 60, 1)',
                    pointBorderColor :'rgba(60, 60, 60, 1)',
                    pointBackgroundColor : 'rgba(60, 60, 60, 1)',
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
                    label: "Vos productions de textile",
                    data: [<?php echo $dashboard->datasetMembre($_SESSION['id_membre'],'dechetterie');?>],
                    borderColor :'rgba(165,0,11,0.9)',
                    backgroundColor : 'rgba(165,0,11,0.75)',
                    pointBorderColor :'rgba(165,0,11,0.9)',
                    pointBackgroundColor : 'rgba(165,0,11,0.9)',
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
                    data: [<?php echo dataset($marron_fr,$NbrPersFoyer);?>],
                    fill: false,
                    borderDash: [5, 5],
                    borderColor :'rgba(60, 60, 60, 1)',
                    backgroundColor : 'rgba(60, 60, 60, 1)',
                    pointBorderColor :'rgba(60, 60, 60, 1)',
                    pointBackgroundColor : 'rgba(60, 60, 60, 1)',
                    pointBorderWidth : 1
                },    
                {
                    label: "Agglo Pau Béarn Pyrénées",
                    data: [<?php echo dataset($marron_agglo,$NbrPersFoyer);?>],
                    fill: false,
                    borderDash: [5, 5],
                    borderColor :'rgba(160, 160, 160, 1)',
                    backgroundColor : 'rgba(160, 160, 160, 1)',
                    pointBorderColor :'rgba(160, 160, 160, 1)',
                    pointBackgroundColor : 'rgba(160, 160, 160, 1)',
                    pointBorderWidth : 1
                }, 
                {
                    label: "Vos productions de déchets",
                    data: [<?php echo $dashboard->datasetMembre($_SESSION['id_membre'],'bac_marron');?>],
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
