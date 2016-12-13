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
            
            var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        <?php
                            if (isset($_POST['formdata']))
                            {
                                $this->Form->read(null,1);
                                $this->Form->set(array(
                                    'created' => date('Y-m-d'),
                                    'modified' => date('Y-m-d'),
                                    'structure' => $_POST['formdata'],
                                    'titre' => 'Test'
                                ));
                                $this->Form->save();
                            }
                        ?>//
                        document.getElementById("message").innerHTML = "Le gabarit a bien été enregistré !";
                    }
            };

            xmlhttp.open("POST", "<?php echo $_SERVER['PHP_SELF']?>", true);
            xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xmlhttp.send('formdata=' + window.sessionStorage.getItem('formData'));
            
        };
    });
</script>

