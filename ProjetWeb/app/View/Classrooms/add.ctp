<div class="classrooms form">
<?php echo $this->Form->create('Classroom'); ?>
	<fieldset>
		<legend><?php echo __('Ajouter une classe'); ?></legend>
	<?php
		echo $this->Form->input('code');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php //echo $this->Html->link(__('Liste classes'), array('action' => 'index')); ?></li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
