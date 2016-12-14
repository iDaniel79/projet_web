<p><?php  
    include_once '/navigation.php';
?></p>

<!-- VALIDER LE FORMULAIRE ENVOYE -->
<?php
    echo $this->Form->create('Form');
?>

<h1><?php echo $this->Form->input('titre'); ?></h1> <!-- affiche le titre du formulaire -->

<p><small>Créé le : <span id='span_date'></span> </small></p> <!-- affiche la date de création -->

<?php
    echo $this->Form->hidden('structure', array('id' => 'structure'));
    echo $this->Form->hidden('created', array('id' => 'date_creation', 'disabled' => 'disabled'));
    echo $this->Form->hidden('modified', array('value' => date('Y-m-d')));
    echo $this->Form->hidden('statut_valide', array('value' => 1));
    echo $this->Form->hidden('nom_table', array('value' => 'reponse'.$form['Form']['id']));
    echo $this->Form->end('valider');
?>
<div class="container">
    <form id="fb-render"></form> <!-- div ou l'on insère le formulaire créé par le framework form-builder -->
</div>
<!-- liste des frameworks requis  sont dans /View/Layouts/default.ctp -->
<!-- script de création de formulaire selon la structure renvoyée -->
<script>
    jQuery(document).ready(function($) {
        document.getElementById('span_date').value = document.getElementById('date_creation').value;
        
        // capture de l'élément div ci-dessus id="fb-render" et ajout de l'option structure renvoyée
        var fbRender = document.getElementById('fb-render'),
            formData = <?php echo '\''.$form['Form']['structure'].'\''; ?> ;

        // variable pour le framework
        var formRenderOpts = {
          formData: formData
        };

        $(fbRender).formRender(formRenderOpts);
    });

</script>
