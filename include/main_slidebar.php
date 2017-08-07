 <?php

/***** Dernière modification : 29/06/2016, Romain TALDU	*****/

require(__DIR__ .'/model.inc.php');

// préparation connexion
$connect = new connection();
$includes = new includes($connect);

if (!isset($ss_menu)){$ss_menu="";}

 ?>    
  <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../../../dist/img/avatar7.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['prenom_membre'];?>  <?php echo $_SESSION['nom_membre']; ?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MENU DE NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->
            
           <?php if($_SESSION['id_typemembre']!=1){ ?>
             <li <?php if($menu==1){echo "class=\"active\"";}?>>
             <a href="../dashboard/index.php"><i class="fa fa-dashboard active"></i> <span>Tableau de bord</span></a>
            </li>
             <?php } ?>
          
            
            <?php if($_SESSION['id_typemembre']==4){ ?>
             
              <li <?php if($menu==5){echo "class=\"active\"";}?>>
            <a href="../administrateurs/index.php"><i class="fa fa-balance-scale"></i> <span>Les pesées</span>
    
            	</a>
            </li>
            
            <?php } ?>
            
                 <?php if($_SESSION['id_typemembre']==4){ ?>
             
              <li <?php if($menu==5){echo "class=\"active\"";}?>>
            <a href="../administrateurs/index.php"><i class="fa fa-info-circle"></i> <span>Conseils / règlement</span>
    
            	</a>
            </li>
            
            <?php } ?>
            
                      <?php if($_SESSION['id_typemembre']==4){ ?>
             
              <li <?php if($menu==5){echo "class=\"active\"";}?>>
            <a href="../administrateurs/index.php"><i class="fa fa-users"></i> <span>Ateliers </span>
        <small class="label pull-right bg-yellow">1</small>
            	</a>
            </li>
            
            <?php } ?>
            
                 <?php if($_SESSION['id_typemembre']==4){ ?>
             
              <li <?php if($menu==5){echo "class=\"active\"";}?>>
            <a href="../administrateurs/index.php"><i class="fa fa-envelope-o"></i> <span>Messagerie</span>
    <small class="label pull-right bg-yellow">1</small>
            	</a>
            </li>
            
            <?php } ?>
            
             <?php if($_SESSION['id_typemembre']==4){ ?>
             
              <li <?php if($menu==5){echo "class=\"active\"";}?>>
            <a href="../administrateurs/index.php"><i class="fa fa-pencil-square-o"></i> <span>Journal de bord</span>
    
            	</a>
            </li>
            
            <?php } ?>
             
     
            
            
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>