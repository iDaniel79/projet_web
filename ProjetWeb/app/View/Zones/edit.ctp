<div class="zones form">
<?php echo $this->Form->create('Zone'); ?>
	<fieldset>
		<legend><?php echo __('Editer une zone'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('path');
		echo $this->Form->input('Role');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php //echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $this->Form->value('Zone.id')), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $this->Form->value('Zone.id')))); ?></li>
		<li><?php //echo $this->Html->link(__('Liste zones'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('Liste rôles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouveau rôle'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
