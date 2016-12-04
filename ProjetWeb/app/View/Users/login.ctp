<div class="users form">
        <?= $this->Form->create('User') ?>
            <fieldset>
                <legend><?= __('Se connecter') ?></legend>
                <?= $this->Form->input('email') ?>
                <?= $this->Form->input('password') ?>		       
            </fieldset>
                <?= $this->html->link("Mot de passe oublié ?", array('action'=>'password','controller'=>'users')); ?>
        <?= $this->Form->button(__('Se connecter')); ?>
        <?= $this->Form->end() ?>
</div>