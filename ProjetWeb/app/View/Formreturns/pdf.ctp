<div class="formreturns pdf">
    <?php 
    ob_start();
    ?>
    <h2>Je suis un PDF</h2>
    <?php 

    $content = ob_clean();
    require_once('C:\wamp64\www\projet_web\ProjetWeb\app\Vendor\html2pdf\vendor\autoload.php');
    $pdf=new HTML2PDF('P','A4','fr','true','UTF-8');
    $pdf->writeHTML($content);
    $pdf->Output('liste.pdf');
    ?>
