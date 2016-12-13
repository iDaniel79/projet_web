<?php ?>
                            
<div class="container">
    <div id="fb-editor"></div>
    <p id="message"></p>
</div>

<script>
    jQuery(document).ready(function($) {
        var $fbEditor = $(document.getElementById('fb-editor'));
        var formData = window.sessionStorage.getItem('formData'), fbOptions = {};

        if (formData) {
            fbOptions.formData = formData;
        }

        $fbEditor.formBuilder(fbOptions);
        var saveBtn = document.querySelector('.form-builder-save');

        saveBtn.onclick = function() {
            console.log('Form Saved');
            window.sessionStorage.setItem('formData', $fbEditor.data('formBuilder').formData);
            
            document.getElementById("message").innerHTML = "before request";
            var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var retour = this.responseText;
                        //document.getElementById("message").innerHTML = "Le gabarit a bien été enregistré !";
                        document.getElementById("message").innerHTML = retour;
                    }
            };
            
            // PHP_SELF => /testCake/app/webroot/index.php
            //alert('<?php //echo $_SERVER['PHP_SELF'] ?>');
            xmlhttp.open("POST", 'save', true);
            xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xmlhttp.send('formData=' + window.sessionStorage.getItem('formData'));
        };
    });
</script>