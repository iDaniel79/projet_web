<div class="users form">
        <?= $this->Form->create('User') ?>
            <fieldset>
                <legend><?= __('Se connecter') ?></legend>
                <?= $this->Form->input('email') ?>
                <?= $this->Form->input('password', array('label' => 'Mot de passe')) ?>		       
            </fieldset>
               
        <?php echo $this->Form->end(__('Se connecter')); ?>
        <?= $this->html->link("Mot de passe oublié ?", array('action'=>'password','controller'=>'users')); ?>        
</div>

<div class="actions">
	<ul>			
		<li><?php echo $this->Html->link(__('Nous contacter'), 'http://www.web.promsoc-sud-luxembourg.be/index.php/contact'); ?> </li>	               
	</ul>

</div>

