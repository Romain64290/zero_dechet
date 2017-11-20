<?php

 //***** Dernière modification : 17/06/2016, Romain TALDU	*****/
//session_start();
//echo $_SESSION['id_membre']; exit;
require(__DIR__ .'/../../../include/verif_session.php');
$menu=1;
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');
require(__DIR__ .'/model.inc.php');


 	


// préparation connexion
$connect = new connection();
$dashboard = new dashboard($connect);


// calcul nombre personne du foyer
 $NbreMembre=$dashboard->NbreMembre();
 $NbreMembre=$NbreMembre['nbr'];
 
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
 
 function dataset($type_dechet,$NbreMembre)
 {
     
$data=$type_dechet*$NbreMembre;
$data=number_format($data, 3, '.', '');
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
     
    
   <!-- <script src="../../../plugins/Chart.js-master/dist/Chart.js"></script> -->
   <script src="../../../plugins/Chart.js-master/dist/Chart.bundle2.js"></script>

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
             
             </div></div></div></div></div>
  	
            
    
                  
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
     

 var config_OM = {
            type: 'line',
            data: {
                labels: ["15 déc.", "31 déc.", "15 janv.", "31 janv.", "15 fév.", "28 fév.", "15 mars", "31 mars", "15 avril", "30 avril"],
                datasets: [
                 {
                    label: "France",
                    data: [<?php echo dataset($OM_fr,$NbreMembre);?>],
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
                    data: [<?php echo dataset($OM_agglo,$NbreMembre);?>],
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
                    data: [<?php echo $dashboard->datasetMembres('ordures_menageres');?>],
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
                    text:'Ordures ménagéres <?php echo $NbreMembre; ?> personnes en kg'
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
                            suggestedMax: 3000,
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
                    data: [<?php echo dataset($tri_fr,$NbreMembre);?>],
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
                    data: [<?php echo dataset($tri_agglo,$NbreMembre);?>],
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
                    data: [<?php echo $dashboard->datasetMembres('tri_selectif');?>],
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
                    text:'Tri selectif pour <?php echo $NbreMembre; ?> personnes en kg'
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
                    data: [<?php echo dataset($compost_fr,$NbreMembre);?>],
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
                    data: [<?php echo dataset($compost_agglo,$NbreMembre);?>],
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
                    data: [<?php echo $dashboard->datasetMembres('compost');?>],
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
                    text:'Compost pour <?php echo $NbreMembre; ?> personnes en kg'
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
                    data: [<?php echo dataset($verre_fr,$NbreMembre);?>],
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
                    data: [<?php echo dataset($verre_agglo,$NbreMembre);?>],
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
                    data: [<?php echo $dashboard->datasetMembres('verre');?>],
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
                    text:'Verre pour <?php echo $NbreMembre; ?> personnes  en kg'
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
                    data: [<?php echo dataset($textile_fr,$NbreMembre);?>],
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
                    data: [<?php echo dataset($textile_agglo,$NbreMembre);?>],
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
                    data: [<?php echo $dashboard->datasetMembres('dechetterie');?>],
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
                    text:'Textile pour <?php echo $NbreMembre; ?> personnes  en kg'
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
                    data: [<?php echo dataset($marron_fr,$NbreMembre);?>],
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
                    data: [<?php echo dataset($marron_agglo,$NbreMembre);?>],
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
                    data: [<?php echo $dashboard->datasetMembres('bac_marron');?>],
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
                    text:'Bac marron pour  <?php echo $NbreMembre; ?> personnes en kg'
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
