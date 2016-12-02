<?php
    $content = '<page>SALUT</page>';
    App::import('Vendor', 'HTML2PDF', array('file' => 'html2pdf'.DS.'html2pdf.class.php'));
    $pdf = new HTML2PDF('P', 'A4', 'fr');
    debug($pdf);
    $pdf->pdf->SetDisplayMode('fullpage');
    $pdf->writeHTML($content);
    $pdf->Output('fichier.pdf');
?>