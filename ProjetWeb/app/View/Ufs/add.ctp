<div class="ufs form">
<?php echo $this->Form->create('Uf'); ?>
	<fieldset>
		<legend><?php echo __('Ajouter une Uf'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('code');
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php //echo $this->Html->link(__('Liste Ufs'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('Liste utilisateur'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvel utilisateur'), array('controller' => 'users', 'action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
