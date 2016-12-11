<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Ajouter un utilisateur'); ?></legend>
	<?php
		echo $this->Form->input('email');		
		echo $this->Form->input('firstname');
		echo $this->Form->input('name');
		echo $this->Form->input('birthdate');
		echo $this->Form->input('phone');
		echo $this->Form->input('mobile');
		echo $this->Form->input('street');
		echo $this->Form->input('number');
		echo $this->Form->input('city');
		echo $this->Form->input('postal_code');
		echo $this->Form->input('country');		
		echo $this->Form->input('classrooms_id');
		echo $this->Form->input('Role');
		echo $this->Form->input('Uf');
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
