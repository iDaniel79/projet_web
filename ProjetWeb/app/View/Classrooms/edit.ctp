<div class="classrooms form">
<?php echo $this->Form->create('Classroom'); ?>
	<fieldset>
		<legend><?php echo __('Edit Classroom'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('code');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Classroom.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Classroom.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Classrooms'), array('action' => 'index')); ?></li>
	</ul>
</div>
