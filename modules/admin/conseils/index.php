<?php

 //***** Dernière modification : 17/06/2016, Romain TALDU	*****/

require(__DIR__ .'/../../../include/verif_session.php');
$menu=3;
require(__DIR__ .'/../../../include/config.inc.php');
require(__DIR__ .'/../../../include/connexion.inc.php');



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
          <h1>Conseils / règlements
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-info-circle"></i> Acccueil</a></li>
            <li class="active">Conseils /règlement</li>
          </ol>
        </section>

        <!-- Main content -->
    
        <section class="content">
                <!-- Info boxes -->
     
        
               
                
                
                
            <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Bienvenue dans le défi familles zéro déchet organisé par la CDAPBP.</h3>
                  <div class="box-tools pull-right">
              
                     <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                 
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                	
                <!-- Info boxes -->
              

              Le règlement de participation est proposé sous forme de FAQ (foire aux questions). Si vous ne trouvez pas la réponse à l'une de vos questions, contactez votre animatrice Emilie Morello à <a href="mailto:e.morello@agglo-pau.fr"> e.morello@agglo-pau.fr </a> ou par téléphone au 05 59 14 64 30.   <br><br>          
                
              <h5><u><b>I- Le défi familles zéro déchet</u></b></h5>
                
                <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Quand est-ce que je commence le défi ?</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
            
          Le défi familles zéro déchet se déroule sur une durée de 5 mois.
          Il se décompose en 2 grandes étapes :<br><br>

          <b>1. l'auto-diagnostic </b>: du 1er au 15 décembre inclus
          <ul>
              <li>vous ne changez pas vos habitudes</li>
              <li>vous pesez vos différentes poubelles avant de les jeter dans les différents conteneurs </li>
          </ul>
          <b>2. la mise en œuvre des éco-gestes </b>: du 16 décembre au 30 avril 2018
          <ul>
              <li>Mise en œuvre des 5 éco-gestes (minimum) que vous avez choisi d'améliorer ou de mettre en place (cf application web pour les retrouver)</li>
              <li>Peser vos différentes poubelles de déchets avant de les jeter dans les différents conteneurs </li>
          </ul>

  

        </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        Quels sont les objectifs à atteindre ?</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
            
            Ce défi invite les familles à réduire d'au moins 50 % le poids de leurs poubelles sur une durée de 5 mois. La période d'auto-diagnostic (1er au 15 décembre) nous permettra de calculer votre baisse sur les mois suivants. <br><br>
 
L'important est de réduire progressivement à son rythme. Peut importe d'où l'on part, c'est la participation et la motivation qui comptent.<br>
Au delà des résultats quantitatifs, le défi familles zéro déchet a pour ambition de vous aider à consommer mieux au quotidien, pour votre santé, votre environnement et votre porte monnaie. Chaque petit geste compte !        
            
        </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        Pourquoi la Communauté d'agglomération organise ce défi familles zéro déchet ?</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
            
            
            La collectivité s'est engagée à travers le label Zéro déchet zéro gaspillage à réduire ses déchets de 3% d'ici 3 ans. L'ADEME nous aide à mettre en place des actions comme le Défi familles zéro déchet qui contribue à faire prendre conscience aux citoyens des déchets qu'ils jettent et à essaimer les bonnes pratiques par le bouche-à-oreille. Nous comptons sur vous pour en parler autour de vous et partager vos expériences et les bonnes habitudes que vous aurez adoptées. 
        </div>
    </div>
  </div>
                    
                    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
        Pourquoi peser mes poubelles ?</a>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
            Le défi a pour objectif de vous aider à réduire le poids de vos différentes poubelles. Pour mesurer cette baisse, il est nécessaire de peser ses déchets. 
Au fil des mois, vous pourrez consulter dans l'interface web les évolutions de vos différentes poubelles. A la fin du défi, les résultats du défi permettront à la Communauté d'agglomération Pau Béarn Pyrénées de communiquer largement le bilan de cette action.
        </div>
    </div>
  </div>
                    
                    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
        Quand peser mes poubelles ?</a>
      </h4>
    </div>
    <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">
            Du <b>1er décembre au 30 avril inclus</b>, je pèse mes différentes poubelles.
Dès que je sors mes poubelles, j'utilise le peson électronique fourni pour peser mes sacs en kg. Je reporte le poids sur mon petit carnet de pesées et en fin de semaine, par exemple, je remplis mon tableau sur l'interface web. 
        </div>
    </div>
  </div>
                    
                    
                    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
        Comment et quelles poubelles dois-je peser ?</a>
      </h4>
    </div>
    <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">
            <b>Je pèse tous les sacs de déchets suivants avant de les déposer dans les conteneurs adaptés : </b><br>
n'oubliez pas de faire la tare avec le peson si vous utilisez le bioseau par exemple pour le compostage
<ul>
    <li>ordures ménagères => tout ce qui ne se recycle pas dans le conteneur d'ordures ménagères,</li>
    <li>tri des emballages et papier => recyclables dans le sac/conteneur jaune,</li>
    <li>verre => emballages en verre dans la borne verte la plus proche de chez moi,</li>
    <li>textiles => en bon état ou non, dans un sac fermé de 50L maximum dans la borne blanche la plus proche de chez moi,</li>
    <li>les déchets de cuisine => au composteur/lombricomposteur/composteur collectif/animaux domestiques</li>
    <li>les déchets de cuisine => dans le conteneur marron si je suis équipé et que je ne souhaite pas composter</li>
    
</ul>






        </div>
    </div>
  </div>
                    
                    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">
        Je ne sais plus quels gestes j'ai choisi pour réduire mes déchets ?</a>
      </h4>
    </div>
    <div id="collapse7" class="panel-collapse collapse">
        <div class="panel-body">
            Je consulte mon « profil participant » de l'interface web pour savoir quels gestes j'ai choisi d'améliorer ou de mettre en œuvre au sein de mon foyer. 
        </div>
    </div>
  </div>
                    
                    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">
        Réduire mes déchets : comment faire concrètement ?</a>
      </h4>
    </div>
    <div id="collapse8" class="panel-collapse collapse">
        <div class="panel-body">
            La Communauté d'agglomération vous accompagne tout au long du défi par des outils pratiques, des visites, des ateliers, des moments conviviaux. <br>

Les outils suivants vous ont remis lors de la réunion de démarrage :
<ul>
    <li>le livre de la Famille « presque » zéro déchet pour vous aider à démarrer vos éco-gestes</li>
    <li>un peson électronique qui sert à peser vos poubelles (à restituer à la fin du défi)</li>
    <li>un petit carnet pour noter le poids de vos poubelles à la maison</li>
    <li>des sacs à vrac et une boîte lavable pour faire vos courses</li>
    <li>1 autocollant stop pub</li>
    <li>des sacs de tri pour les emballages-papier et pour le verre</li>
    <li>1 carnet de listes de courses pour acheter seulement le nécessaire</li>
    <li>1 liste d'ouvrages empruntables dans le réseau des médiathèques pour les grands et les plus petits </li>
    
</ul>



Les outils suivants vous seront remis lors d'une réunion spécifique :
<ul>
    <li>un composteur, lombricomposteur ou composteurs collectif suivant votre situation.</li>
</ul>


Une newsletter mensuelle sera envoyée par mail à tous les participants. Elle vous informera des événements, des lieux d'achats zéro déchet, des bons plans locaux, des sites internet et études qui peuvent vous intéresser dans le cadre du défi.<br><br>

Bonus :<br>
5 livres de la famille zéro déchet « les Zenfants » seront proposés en prêt dans le cadre du défi auprès d'Emilie Morello.<br><br>

<b>Je ne sais pas où faire mes courses sans emballage ? Où acheter d'occasion ?</b><br>
Nous vous envoyons par mail, dès le 1er mois une liste non exhaustive de lieux d’achats pour faire vos courses, acheter d'occasion etc... <br>
L'objectif est d'alimenter cette liste collaborative par vos expériences et découvertes. N'hésitez pas à envoyer un mail à <a href="e.morello@agglo-pau.fr">e.morello@agglo-pau.fr</a> afin de signaler les commerces qui jouent le jeu du (presque) zéro déchet.<br>
Ils seront ajoutés à cette liste qui sera envoyée chaque mois à tous les participants. <br><br>

<b>Mon commerçant accepte les boîtes et/ou sacs lavables, comment peut-il le faire savoir ? </b><br>  
Nous vous fournissons un lot d'affichettes créées par la Famille presque zéro déchet pour la donner à votre commerçant engagé. Il pourra la coller sur son comptoir, sa vitrine....<br>
Plus les commerçants afficheront leur engagement, plus les citoyens adopteront le zéro déchet ! <br><br>

<b>Je souhaite motiver mes voisins à faire du compostage collectif. Pouvez-vous m'aider ?</b><br>
Oui, si vous avez choisi cet éco-geste, la collectivité vous accompagne pour motiver vos voisins et installer des composteurs de grande capacité. Prenez contact avec Fabien TREZERES, notre guide composteur f.trezeres@agglo-pau.fr .<br><br>

<b>C'est bientôt Noël...les papiers cadeaux, les emballages des jouets....</b><br><br>

<b>Comment faire concrètement ?</b><br>
J'essaie de distiller le zéro déchet auprès de mes proches et à la maison sans révolutionner tout d'un coup. <br>
Je me fixe une ou deux actions que je retrouvere en page 197 du livre de la Famille presque zéro déchet pour Noël ou dans le livre les Zenfants presque zéro déchet en page 72.<br>
Quelques idées :
<ul>
    <li>Confectionner un repas de Noël avec des produits locaux achetés auprès des producteurs (j'y vais avec mes bocaux et sacs), </li>
    <li>Adopter la méthode furoshiki pour emballer vos cadeaux (coupons de tissu réutilisable),</li>
    <li>Fabriquer un cadeau à partir de récup si vous êtes bricoleur et créatif.</li>
    
</ul>
<br>
<b>Je souhaite impliquer mes enfants, comment faire ?</b><br>

L'important c'est de les intéresser au sujet, ils s'y mettront progressivement si vous les impliquer dès le début.<br>
Vous avez choisi plusieurs gestes, cf le tableau de bord dans l'interface :<br>
Suivant l'âge de mes enfants, je leur propose de choisir un geste dont ils seront responsable à la maison. Par exemple peser les déchets qui iront au composteur, le noter dans le carnet.<br>
Pour avoir de nouvelles idées, j'emprunte le livre les Zenfants presque zéro déchet, 5 exemplaires vous sont proposés à faire tourner au sein des familles du défi: faites le plein d'idées et d’activités : prêter leurs jouets aux copains au lieu d'en acheter de nouveau, préparer des gâteaux en famille le week-end....<br>
J'inscris mes enfants aux ateliers proposés dans le cadre du défi (l'âge est précisé).<br>
Je ne les culpabilise pas même si ils n'ont pas fini leur assiette... <br><br>

<b>Mes ado s'en fichent des déchets... </b><br>
L'ADEME a créé un site web dédié aux jeunes. <br>
Le site Mtaterre propose des vidéos, des jeux, des gestes, des préparations aux exposés sur l’environnement... Donnez leur le lien ci-dessous :
<a href="http://www.mtaterre.fr/">http://www.mtaterre.fr/</a><br>
Si vos ados en ont marre de descendre les poubelles... Voici une petite BD amusante à leur faire lire pour les impliquer dans le zéro déchet :
<a href="https://www.kaizen-magazine.com/zero-dechet-idee-de-genie-ne-plus-descendre-poubelles"> https://www.kaizen-magazine.com/zero-dechet-idee-de-genie-ne-plus-descendre-poubelles</a><br><br>



<b>Je n'arrive pas à réduire mes déchets, ce n'est pas facile tous les jours...</b><br>

Pas de panique, l'objectif du défi est de vous aider à prendre conscience des déchets que vous produisez. Vous êtes inscrit au défi familles et c'est déjà un premier pas. <br>
Notez sur une feuille les gestes que vous avez déjà accomplis et le chemin parcouru depuis le 1er décembre. Vous avez certainement réussi des petits défis. <br>
Notez aussi ceux que vous n'arrivez pas à mettre en œuvre et questionnez-vous sur les raisons ? Un repas de famille, la fatigue, moins temps pour faire les courses, on a oublié de planifier ses menus...<br>
Eh oui, parfois il y a des moments où l'on a moins le temps d'aller faire des courses « zéro déchet », et puis un besoin de se remotiver par ce que seul ou en famille on n'y arrive pas toujours. Changer ses habitudes au quotidien ce n'est pas facile et cela prend du temps. <br>
Je vous invite à rejoindre sur Facebook les discussions suivantes : 
<ul>
    <li>Association Avenir Zéro Déchet 64 : <a href="https://www.facebook.com/groups/410518542480098">https://www.facebook.com/groups/410518542480098/</a> </li>
    <li>La célèbre Famille « presque » zéro déchet : <a href="https://www.facebook.com/login/?next=https%3A%2F%2Fwww.facebook.com%2Fgroups%2F1516491401964168%2F">https://www.facebook.com/login/?next=https%3A%2F%2Fwww.facebook.com%2Fgroups%2F1516491401964168%2F</a></li>
</ul>



<b>Est ce que je continue à réduire mes déchets après le défi famille zéro déchet ?</b><br>

Oui bien sûr, le défi a pour ambition de faire changer nos petits gestes du quotidien, d'adopter de nouvelles habitudes. Une fois les nouvelles habitudes prises, vous pouvez progressivement essayer de nouvelles actions. 

        </div>
    </div>
  </div>
                    
     
                      <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse14">
        Comment participer à un atelier, une visite, un moment convivial ?</a>
      </h4>
    </div>
    <div id="collapse14" class="panel-collapse collapse">
        <div class="panel-body">
            Je vais dans la rubrique «les ateliers » située à gauche dans l'interface.<br>
Je consulte les propositions et je clique au choix :
<ul>
    <li>Je participe ou je ne participe pas </li>
</ul>
Attention, compte tenu du nombre de foyers inscrits au défi familles zéro déchet, chaque foyer pourra choisir un seul atelier pratique. Si il reste des places, nous vous en informerons par email.<br><br>

<b>Je ne suis pas disponible pour les ateliers, les réunions, les visites </b><br>
Si votre emploi du temps ne vous permet pas de participer, ne vous inquiétez pas. Vous pouvez tout à fait réduire vos déchets sans y participer.<br>





        </div>
    </div>
  </div>
                      <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse15">
        Je pars en vacances, est-ce que je pèse mes déchets ?</a>
      </h4>
    </div>
    <div id="collapse15" class="panel-collapse collapse">
        <div class="panel-body">
           Vous avez pris de bonnes « habitudes » et vous êtes devenus pro dans l'utilisation du peson ? Alors pourquoi ne pas emporter avec vous le carnet et le peson ? Idéalement, vous vous conseillons de continuer à peser vos déchets pendant cette période.






        </div>
    </div>
  </div>
                    
</div>
              <br>          
                 <h5><u><b>II- L'interface web du défi familles zéro déchet</u></b></h5>
               
                
                <div class="panel-group" id="accordion2">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion2" href="#collapse9">
       L'application web, à quoi sert-elle ?</a>
      </h4>
    </div>
    <div id="collapse9" class="panel-collapse collapse">
        <div class="panel-body">
            Elle a plusieurs fonctions :
            <ul>
                <li>saisir les pesées de vos différentes poubelles, </li>
                <li>visualiser vos gestes choisis, vos statistiques et historique personnel,</li>
                <li>noter  vos humeurs du jour face à ce défi dans le « journal de bord »</li>
                <li>rappeler le règlement du défi et l'utilisation de l'interface web</li>
                <li>vous inscrire aux ateliers, visites, moments conviviaux</li>
            </ul>


Le coordinateur suit également les statistiques, les participations aux différents moments conviviaux, ateliers...
        </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion2" href="#collapse10">
        Quand est ce que j'indique mes pesées dans l'interface web ?</a>
      </h4>
    </div>
    <div id="collapse10" class="panel-collapse collapse">
        <div class="panel-body">
            Nous nous conseillons de renseigner vos pesées dans l'interface web une fois par semaine. Vous pouvez les enregistrer plus souvent si nécessaire. <br>
L'important est de ne pas oublier de les peser et de les noter sur votre carnet au fil des jours.<br>
Astuce : je peux attendre le week-end pour enregistrer mes pesées  même si je les pèse à des moments différents. <br>
Les moyennes nationales et locales par habitant sont indiquées par type de poubelle afin de savoir où vous vous situez.
        </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion2" href="#collapse11">
        Comment enregistrer mes pesées ?</a>
      </h4>
    </div>
    <div id="collapse11" class="panel-collapse collapse">
        <div class="panel-body">
            Je me connecte à l'interface web et je clique à gauche sur « les pesées » : 
J'indique :
<ul>
    <li>la date JJ/MM/AAAA</li>
    <li>le poids en kg dans la colonne de la ou les poubelles correspondantes</li>
    <li>je clique sur « enregistrer »</li>
</ul>



        </div>
    </div>
  </div>
                    
                     <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion2" href="#collapse12">
        Je me suis trompée dans les pesées ?</a>
      </h4>
    </div>
    <div id="collapse12" class="panel-collapse collapse">
        <div class="panel-body">
            L'interface web vous permet de supprimer des pesées et les enregistrer de nouveau. 
        </div>
    </div>
  </div>
                    
                     <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion2" href="#collapse13">
        Je souhaite savoir quelle est ma production de déchets ? </a>
      </h4>
    </div>
    <div id="collapse13" class="panel-collapse collapse">
        <div class="panel-body">
            Au fur et à mesure du défi, vous pourrez visualiser l'évolution de vos différentes poubelles et comparer vos productions de déchets par rapport à la moyenne nationale et locale.<br>
Un bilan de l'ensemble des familles sera présenté aux familles à mi parcours et en mai 2018 à la fin du défi.
        </div>
    </div>
  </div>
</div>
                
                
                
                
                
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
