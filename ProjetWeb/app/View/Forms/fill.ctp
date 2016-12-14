<!-- REMPLISSAGE DU FORMULAIRE DYNAMIQUE ENVOYEE -->
<p><?php  
    include_once '/navigation.php';
?></p>

<div class="container">
    <form id="fb-render"></form> <!-- div ou l'on insère le formulaire créé par le framework form-builder -->
</div>

<?php
    echo $this->Form->create('reponse', array('id' => 'form_reponse'));
    echo $this->Form->end(array('id' => 'sendMe', 'value' => 'envoyer'));
?>
<input id="bt_valider" value="valider" onclick="prepareData()" type="button" />

<script>
    jQuery(document).ready(function($) {
        document.getElementById('sendMe').style.visibility = "hidden";
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
    
    function prepareData()
    {
                
        document.getElementById('bt_valider').style.visibility = "hidden";
        document.getElementById('sendMe').style.visibility = "visible";
        
        var i = 1;
        var limit = <?php echo $form['Form']['nb_question'] ?>;
        var elements = '<?php echo  $form['Form']['structure'] ; ?>';
        var formulaire = document.getElementById('form_reponse').firstChild;
        //var bt_send = document.getElementById('sendMe');
        var count = 0, ligne = "", commentaire = "";
        var question_index = <?php echo $form['Form']['ref_question']; ?> - 1;

        elements = elements.split(',');
               
        var e_input = document.createElement("INPUT");
        e_input.setAttribute("name", "data[question][id_form]");
        e_input.setAttribute("type", "text");
        e_input.setAttribute("value", "<?php echo $form['Form']['id']; ?>");
        formulaire.appendChild(e_input);
        
        var e_input = document.createElement("INPUT");
        e_input.setAttribute("name", "data[question][id_uf]");
        e_input.setAttribute("type", "text");
        e_input.setAttribute("value", "1");
        formulaire.appendChild(e_input);

        
        
        for( i; i <= elements.length ; i++ )
        {
            
            var e_input = null;
            
            if (elements[i].toString().indexOf('type="paragraph"') > 0)
            {
                count++;
                var e_input = document.createElement("INPUT");
                e_input.setAttribute("name", "data[question][id_question_" + count + "]");
                e_input.setAttribute("type", "text");
                e_input.setAttribute("value", (question_index + count));
                formulaire.appendChild(e_input);
            }
            
            if (elements[i].toString().indexOf('type="radio-group"') > 0)
            {
                //alert(getCheckedValue( "radio-group-" + count));
                var e_input = document.createElement("INPUT");
                e_input.setAttribute("id", "radio");
                e_input.setAttribute("name", "data[question][evaluation_" + count + "]");
                e_input.setAttribute("type", "text");
                e_input.setAttribute("value", getCheckedValue( "radio-group-" + count));
                formulaire.appendChild(e_input);
            }
            
            if (elements[i].toString().indexOf('type="text"') > 0)
            {
                ligne = "ligne-" + count;
                var e_input = document.createElement("INPUT");
                e_input.setAttribute("id", "ligne");
                e_input.setAttribute("name", "data[question][ligne_" + count + "]");
                e_input.setAttribute("value", document.getElementById(ligne).value);
                
                formulaire.appendChild(e_input);
            }
            
            if (elements[i].toString().indexOf('type="textarea"') > 0)
            {
                commentaire = "commentaire-" + count;
                var e_input = document.createElement("INPUT");
                e_input.setAttribute("id", "commentaire");
                e_input.setAttribute("name", "data[question][commentaire_" + count + "]");
                e_input.setAttribute("type", "text");
                e_input.setAttribute("value", document.getElementById(commentaire).value);
                formulaire.appendChild(e_input);
            }
            
            var e_input = document.createElement("INPUT");
            e_input.setAttribute("name", "data[question][count]");
            e_input.setAttribute("type", "text");
            e_input.setAttribute("value", count);
            formulaire.appendChild(e_input);
        }
    }
    
    function getCheckedValue( radioGroup )
    {
        var radioElements = document.getElementsByName(radioGroup);
        for (i = 0; i < radioElements.length ; i++ )
        {
            if (radioElements[i].checked)
            {
                return radioElements[i].value;
            }
        }
        return null;
    }

</script>