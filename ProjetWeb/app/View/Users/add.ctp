<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Ajouter un utilisateur'); ?></legend>
	<?php				
		echo $this->Form->input('name',array('label' => 'Nom'));
                echo $this->Form->input('firstname',array('label' => 'Prénom'));
		echo $this->Form->input('email',array('label' => 'Email'));
		echo $this->Form->input('birthdate',array('label' => 'Date de naissance'));
		echo $this->Form->input('phone',array('label' => 'Téléphone'));
		echo $this->Form->input('mobile',array('label' => 'GSM'));
		echo $this->Form->input('street',array('label' => 'Rue'));
		echo $this->Form->input('number',array('label' => 'Numéro'));
		echo $this->Form->input('city',array('label' => 'Ville'));
		echo $this->Form->input('postal_code',array('label' => 'Code postal'));
		echo $this->Form->input('country',array('label' => 'Pays'));		
		echo $this->Form->input('classrooms_id',array('label' => 'Classe'));
		echo $this->Form->input('Role',array('label' => 'Rôle'));
		echo $this->Form->input('Uf',array('label' => 'Unité de formation'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php //echo $this->Html->link(__('Liste utilisateur'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('Liste classes'), array('controller' => 'classrooms', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvelle classe'), array('controller' => 'classrooms', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste rôles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouveau rôle'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste Ufs'), array('controller' => 'ufs', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvelle Uf'), array('controller' => 'ufs', 'action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
