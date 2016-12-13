<!-- VERIFICATION DU FORMUALIRE ENVOYE -->
<?php
    echo $this->Form->create('Form');
?>

<h1><?php echo $this->Form->input('titre'); ?></h1> <!-- affiche le titre du formulaire -->

<p><small>Créé le : <span id='span_date'></span> </small></p> <!-- affiche la date de création -->

<?php
    echo $this->Form->hidden('structure', array('id' => 'structure'));
    echo $this->Form->hidden('created', array('id' => 'date_creation', 'disabled' => 'disabled'));
    echo $this->Form->hidden('modified', array('value' => date('Y-m-d')));
    echo $this->Form->hidden('statut_verifie', array('value' => 1));
    echo $this->Form->end('vérifier');
?>
<div class="container">
    <form id="fb-render"></form> <!-- div ou l'on insère le formulaire créé par le framework form-builder -->
</div>

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

        // traitement par le framework et renvoi au div indiqué
        $(fbRender).formRender(formRenderOpts);
    });

</script>


