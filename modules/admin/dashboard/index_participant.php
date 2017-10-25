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
                         <b>> <u>Cumul de vos pesées </u></b><br><br>
                    	<div class="chart-responsive">
                      	
                        <canvas id="pieChart" height="150"></canvas>
                        
                      </div><!-- ./chart-responsive -->
                    </div><!-- /.col -->
                    <div class="col-md-4"><br><br><br>
                      <ul class="chart-legend clearfix middle">
                        <li><i class="fa fa-circle-o text-gray"></i> Ordures ménagéres</li>
                        <li><i class="fa fa-circle-o text-yellow"></i> Tri séléctif</li>
                        <li><i class="fa fa-circle-o text-green"></i> Compost</li>
                        <li><i class="fa fa-circle-o text-blue"></i> Verre</li>
                        <li><i class="fa fa-circle-o text-light-blue"></i> Textile</li>
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
                            <td style=" text-align: center">0</td>
                            <td style=" text-align: center" >0</td>
                            <td style=" text-align: center">0</td>
                            <td style=" text-align: center">0</td>
                            <td style=" text-align: center">0</td>
                            <td style=" text-align: center">0</td>
                        </tr>
                         <tr>
                            <td style=" text-align: center">Agglo</td>
                            <td style=" text-align: center">257</td>
                            <td style=" text-align: center" >55</td>
                            <td style=" text-align: center">NR</td>
                            <td style=" text-align: center">26</td>
                            <td style=" text-align: center">3,6</td>
                            <td style=" text-align: center">NR</td>
                        </tr>
                         <tr>
                            <td style=" text-align: center">France</td>
                            <td style=" text-align: center">269</td>
                            <td style=" text-align: center" >47</td>
                            <td style=" text-align: center">NR</td>
                            <td style=" text-align: center">29</td>
                            <td style=" text-align: center">2,5</td>
                            <td style=" text-align: center">NR</td>
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
               <canvas id="canvas" style="height:250px"></canvas>
             
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
    
var ctx = document.getElementById("pieChart");
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
            data: [14, 133, 159, 185, 220, 313],
            backgroundColor: [
                 "#d2d6de",
                "#f39c12",
                "#00a65a",
                "#3c8dbc",
                "#00c0ef",
                "#582900"
            ]
           
           
        }]
},
    options: {
    animationSteps: 1000	
     }
});

</script>

 
    <script>
        var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        
        var randomScalingFactor = function() {
            return Math.round(Math.random() * 100);
            //return 0;
        };
        var randomColorFactor = function() {
            return Math.round(Math.random() * 255);
        };
        var randomColor = function(opacity) {
            return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
        };

        var config = {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                    fill: false,
                    borderDash: [5, 5],
                }, {
                    hidden: true,
                    label: 'hidden dataset',
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                }, {
                    label: "My Second dataset",
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Chart.js Line Chart'
                },
                tooltips: {
                    mode: 'label',
                    callbacks: {
                        // beforeTitle: function() {
                        //     return '...beforeTitle';
                        // },
                        // afterTitle: function() {
                        //     return '...afterTitle';
                        // },
                        // beforeBody: function() {
                        //     return '...beforeBody';
                        // },
                        // afterBody: function() {
                        //     return '...afterBody';
                        // },
                        // beforeFooter: function() {
                        //     return '...beforeFooter';
                        // },
                        // footer: function() {
                        //     return 'Footer';
                        // },
                        // afterFooter: function() {
                        //     return '...afterFooter';
                        // },
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
                            suggestedMin: -10,
                            suggestedMax: 250,
                        }
                    }]
                }
            }
        };

        $.each(config.data.datasets, function(i, dataset) {
            dataset.borderColor = randomColor(0.4);
            dataset.backgroundColor = randomColor(0.5);
            dataset.pointBorderColor = randomColor(0.7);
            dataset.pointBackgroundColor = randomColor(0.5);
            dataset.pointBorderWidth = 1;
        });

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myLine = new Chart(ctx, config);
        };

        $('#randomizeData').click(function() {
            $.each(config.data.datasets, function(i, dataset) {
                dataset.data = dataset.data.map(function() {
                    return randomScalingFactor();
                });

            });

            window.myLine.update();
        });

        $('#changeDataObject').click(function() {
            config.data = {
                labels: ["July", "August", "September", "October", "November", "December"],
                datasets: [{
                    label: "My First dataset",
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                    fill: false,
                }, {
                    label: "My Second dataset",
                    fill: false,
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                }]
            };

            $.each(config.data.datasets, function(i, dataset) {
                dataset.borderColor = randomColor(0.4);
                dataset.backgroundColor = randomColor(0.5);
                dataset.pointBorderColor = randomColor(0.7);
                dataset.pointBackgroundColor = randomColor(0.5);
                dataset.pointBorderWidth = 1;
            });

            // Update the chart
            window.myLine.update();
        });

        $('#addDataset').click(function() {
            var newDataset = {
                label: 'Dataset ' + config.data.datasets.length,
                borderColor: randomColor(0.4),
                backgroundColor: randomColor(0.5),
                pointBorderColor: randomColor(0.7),
                pointBackgroundColor: randomColor(0.5),
                pointBorderWidth: 1,
                data: [],
            };

            for (var index = 0; index < config.data.labels.length; ++index) {
                newDataset.data.push(randomScalingFactor());
            }

            config.data.datasets.push(newDataset);
            window.myLine.update();
        });

        $('#addData').click(function() {
            if (config.data.datasets.length > 0) {
                var month = MONTHS[config.data.labels.length % MONTHS.length];
                config.data.labels.push(month);

                $.each(config.data.datasets, function(i, dataset) {
                    dataset.data.push(randomScalingFactor());
                });

                window.myLine.update();
            }
        });

        $('#removeDataset').click(function() {
            config.data.datasets.splice(0, 1);
            window.myLine.update();
        });

        $('#removeData').click(function() {
            config.data.labels.splice(-1, 1); // remove the label first

            config.data.datasets.forEach(function(dataset, datasetIndex) {
                dataset.data.pop();
            });

            window.myLine.update();
        });
    </script>
  </body>
</html>
