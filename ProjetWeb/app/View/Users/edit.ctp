<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Editer un utilisateur'); ?></legend>
	<?php
		echo $this->Form->input('id',array('label' => 'ID'));
		echo $this->Form->input('email',array('label' => 'Email'));		
		echo $this->Form->input('firstname',array('label' => 'Prénom'));
		echo $this->Form->input('name',array('label' => 'Nom'));
		echo $this->Form->input('birthdate',array('label' => 'Date de naissance'));
		echo $this->Form->input('phone',array('label' => 'Téléphone'));
		echo $this->Form->input('mobile',array('label' => 'GSM'));
		echo $this->Form->input('street',array('label' => 'Rue'));
		echo $this->Form->input('number',array('label' => 'Numéro'));
		echo $this->Form->input('city',array('label' => 'Ville'));
		echo $this->Form->input('postal_code',array('label' => 'Code postal'));
		echo $this->Form->input('country',array('label' => 'Pays'));		
		if ($_SESSION['role'] != 'Eleve'){
			echo $this->Form->input('active',array('label' => 'Actif'));
			echo $this->Form->input('create',array('label' => 'Date de création'));
			echo $this->Form->input('classrooms_id',array('label' => 'Classe'));
			echo $this->Form->input('Role',array('label' => 'Rôle'));
			echo $this->Form->input('Uf',array('label' => 'Unités de formation'));
		}
		echo $this->Html->link(__('Changer son mot de passe'), array('controller' => 'users', 'action' => 'changepassword'));			
					
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php //echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $this->Form->value('User.id')), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $this->Form->value('User.id')))); ?></li>
		<li><?php //echo $this->Html->link(__('Liste utilisateurs'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('Liste classes'), array('controller' => 'classrooms', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvelle classe'), array('controller' => 'classrooms', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste rôles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouveau rôle'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste Ufs'), array('controller' => 'ufs', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvelle Uf'), array('controller' => 'ufs', 'action' => 'add')); ?> </li>

		<?php if ( $_SESSION['role'] == 'Eleve'){ ?>
			<li><?php echo $this->Html->link(__('Consulter'), array('controller' => 'users', 'action' => 'view', $_SESSION['id_user'])); ?></li>
			<li><?php echo $this->Html->link(__('Modifier'), array('controller' => 'users', 'action' => 'edit', $_SESSION['id_user'])); ?> </li>
		<?php } else {
		 	include('/../Zones/zone.ctp');
		 } ?>

	</ul>
</div>
