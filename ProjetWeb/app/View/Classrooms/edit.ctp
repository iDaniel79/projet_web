<div class="classrooms form">
<?php echo $this->Form->create('Classroom'); ?>
	<fieldset>
		<legend><?php echo __('Editer classe'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('code');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php //echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $this->Form->value('Classroom.id')), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $this->Form->value('Classroom.id')))); ?></li>
		<li><?php //echo $this->Html->link(__('Liste classes'), array('action' => 'index')); ?></li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
