<div class="roles form">
<?php echo $this->Form->create('Role'); ?>
	<fieldset>
		<legend><?php echo __('Editer un rôle'); ?></legend>
	<?php
		echo $this->Form->input('id',array('label' => 'Id'));
		echo $this->Form->input('role',array('label' => 'Rôle'));
		echo $this->Form->input('Zone');
		echo $this->Form->input('User',array('label' => 'Utilisateurs'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php //echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $this->Form->value('Role.id')), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $this->Form->value('Role.id')))); ?></li>
		<li><?php //echo $this->Html->link(__('Liste roles'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('Liste zones'), array('controller' => 'zones', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvelle zone'), array('controller' => 'zones', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste utilisateurs'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvel utilisateur'), array('controller' => 'users', 'action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
