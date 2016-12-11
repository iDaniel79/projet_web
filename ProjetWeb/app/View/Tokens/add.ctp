<div class="tokens form">
<?php echo $this->Form->create('Token'); ?>
	<fieldset>
		<legend><?php echo __('Ajouter un token'); ?></legend>
	<?php
		echo $this->Form->input('date_creation');
		echo $this->Form->input('date_fin');
		echo $this->Form->input('statut');
		echo $this->Form->input('numero');
		echo $this->Form->input('ufs_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Liste tokens'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Liste Ufs'), array('controller' => 'ufs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvelle Uf'), array('controller' => 'ufs', 'action' => 'add')); ?> </li>
	</ul>
</div>
