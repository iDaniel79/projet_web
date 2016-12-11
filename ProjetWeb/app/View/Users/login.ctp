<div class="users form">
        <?= $this->Form->create('User') ?>
            <fieldset>
                <legend><?= __('Se connecter') ?></legend>
                <?= $this->Form->input('email') ?>
                <?= $this->Form->input('password') ?>		       
            </fieldset>
               
        <?php echo $this->Form->end(__('Se connecter')); ?>
        <?= $this->html->link("Mot de passe oublié ?", array('action'=>'password','controller'=>'users')); ?>        
</div>