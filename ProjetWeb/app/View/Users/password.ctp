<div class="users form">
		<?= $this->Form->create('User') ?>
		    <fieldset>
		        <legend><?= __('Mot de passe oublié'); ?></legend>
		        <?= $this->Form->input('email',array('label'=> 'Votre email de connexion')); ?>		       
		    </fieldset>
		<?= $this->Form->button(__('Envoyer')); ?> 
		</br>
		</br>
		 <?= $this->html->link("Se connecter", array('action'=>'login','controller'=>'users')); ?>
		<?= $this->Form->end() ?>
	</div>