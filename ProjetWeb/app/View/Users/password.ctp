<div class="users form">
		<?= $this->Form->create('User') ?>
		    <fieldset>
		        <legend><?= __('Mot de passe oublié'); ?></legend>
		        <?= $this->Form->input('email',array('label'=> 'Votre e-mail de connexion')); ?>		       
		    </fieldset>
		<?php echo $this->Form->end(__('Envoyer')); ?>	
		 <?= $this->html->link("Se connecter", array('action'=>'login','controller'=>'users')); ?>
		<?= $this->Form->end() ?>
	</div>

<div class="actions">
	<ul>			
		<li><?php echo $this->Html->link(__('Nous contacter'), 'http://www.web.promsoc-sud-luxembourg.be/index.php/contact'); ?> </li>	               
	</ul>

</div>
