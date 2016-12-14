<p><?php  
    include_once '/navigation.php';
?></p>
<!-- AFFICHAGE DE TOUS LES FORMULAIRES DYNAMIQUES -->

<h1><?php echo h($form['Form']['titre']);?></h1> <!-- affiche le titre du formulaire -->

<p><small>Créé le : <?php echo $form['Form']['created']; ?></small></p> <!-- affiche la date de création -->

<div class="container">
    <form id="fb-render"></form> <!-- div ou l'on insère le formulaire créé par le framework form-builder -->
</div>

<script>
    jQuery(document).ready(function($) {
        
        // capture de l'élément div ci-dessus id="fb-render" et ajout de l'option structure renvoyée
        var fbRender = document.getElementById('fb-render'),
            formData = '<?php echo  $form['Form']['structure'] ; ?>' ;

        // variable pour le framework
        var formRenderOpts = {
          formData: formData
        };

        // traitement par le framework et renvoi au div indiqué
        $(fbRender).formRender(formRenderOpts);
    });

</script>
