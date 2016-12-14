<p><?php // CREATION DYNAMIQUE D'UN NOUVEAU FORMULAIRE 
include_once '/navigation.php';
?></p>

<h1>Créer un nouveau formulaire</h1>

<div class="container">
    <!-- div qui va contenir l'environnement de génération du formulaire -->
    <div id="fb-editor"></div>
    <p id="message"></p>
</div>

<?php
    echo $this->Form->create('Form');
    echo $this->Form->input('titre');
    echo $this->Form->hidden('structure', array('id' => 'hidden_struct', 'value' => "none"));
    echo $this->Form->hidden('nb_question', array('id' => 'nb_question', 'value' => "none"));
    echo $this->Form->end(array('id' => 'saveStructForm', 'value' => 'Sauvegarder'));
?>

<script>
    jQuery(document).ready(function($) {
        var $fbEditor = $(document.getElementById('fb-editor'));
        var formData = window.sessionStorage.getItem('formData'), fbOptions = {};
        document.getElementById('saveStructForm').style.visibility = "hidden";

        if (formData) {
            fbOptions.formData = formData;
        }

        $fbEditor.formBuilder(fbOptions);
        var saveBtn = document.querySelector('.form-builder-save');

        saveBtn.onclick = function() {
            var elements_count = 0, question_count = 0, i = 0, count = 0, position = 0;
            var elements_rebuild = "";
            
            console.log('Form Saved');
            window.sessionStorage.setItem('formData', $fbEditor.data('formBuilder').formData);
            
            var elements = window.sessionStorage.getItem('formData')
            elements = elements.split('\n');
            elements_count = elements.length;
            
            for(i; i < elements_count; i++)
            {
                if (elements[i].toString().indexOf('type="header"') > 0)
                {
                    count = question_count + 1;
                    elements[i] = elements[i].toString().replace('></field>', ' name="titre-' + count + '" ></field>');
                }
                if (elements[i].toString().indexOf('type="paragraph"') > 0)
                {
                    question_count++;
                    elements[i] = elements[i].toString().replace('></field>', ' name="question-' + question_count + '" ></field>');
                }
                if (elements[i].toString().indexOf('type="radio-group"') > 0)
                {
                    position = elements[i].toString().indexOf('name=');
                    elements[i] = elements[i].toString().replace(elements[i].toString().substr(position), ' name="radio-group-' + question_count + '" >');
                }
                if (elements[i].toString().indexOf('type="text"') > 0)
                {
                    position = elements[i].toString().indexOf('name=');
                    elements[i] = elements[i].toString().replace(elements[i].toString().substr(position), ' name="ligne-' + question_count + '" ></field>');
                }
                if (elements[i].toString().indexOf('type="textarea"') > 0)
                {
                    position = elements[i].toString().indexOf('name=');
                    elements[i] = elements[i].toString().replace(elements[i].toString().substr(position), ' name="commentaire-' + question_count + '" ></field>');
                }
                elements_rebuild = elements_rebuild.toString() + ' ' + elements[i].toString();
                //alert(elements_rebuild);
            }
            
            document.getElementById("hidden_struct").value = elements;
            window.sessionStorage.removeItem('formData');
            document.getElementById("nb_question").value = question_count;
            document.getElementById("message").innerHTML = "Le gabarit a bien été préparé pour l'enregistrement !";
            document.getElementById('saveStructForm').style.visibility = "visible";
            
//            var xmlhttp = new XMLHttpRequest();
//                xmlhttp.onreadystatechange = function() {
//                    if (this.readyState == 4 && this.status == 200) { 
//                        document.getElementById("message").innerHTML = "Le gabarit a bien été préparé pour l'enregistrement !";
//                        document.getElementById('saveStructForm').style.visibility = "visible";
//                    }
//            };
//            
//            xmlhttp.open("POST", '<?php // echo $_SERVER['PHP_SELF'] ?>', true);
//            xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//            xmlhttp.send('formData=' + window.sessionStorage.getItem('formData'));
        };
    });
</script>


