<?php

/***** Dernière modification : 12/09/2016, Romain TALDU	*****/



  // get the HTML
    ob_start();
    require(__DIR__ .'/tableau_pdf.php');
    $content = ob_get_clean();
	
	  // convert to PDF
    require_once(__DIR__.'../../../../plugins/html2pdf-4.5.1/vendor/autoload.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('liste.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>

