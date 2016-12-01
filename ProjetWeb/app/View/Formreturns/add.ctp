<div class="formreturns form">
<?php echo $this->Form->create('Formreturn'); ?>
	<fieldset>
		<legend><?php echo __('Add Formreturn'); ?></legend>
	<?php
		echo $this->Form->input('create');
		echo $this->Form->input('commentaire_1');
		echo $this->Form->input('evaluation_1');
		echo $this->Form->input('commentaire_2');
		echo $this->Form->input('evaluation_2');
		echo $this->Form->input('commentaire_3');
		echo $this->Form->input('evaluation_3');
		echo $this->Form->input('commentaire_4');
		echo $this->Form->input('evaluation_4');
		echo $this->Form->input('commentaire_5');
		echo $this->Form->input('evaluation_5');
		echo $this->Form->input('commentaire_6');
		echo $this->Form->input('evaluation_6');
		echo $this->Form->input('commentaire_7');
		echo $this->Form->input('evaluation_7');
		echo $this->Form->input('ufs_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Formreturns'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Ufs'), array('controller' => 'ufs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ufs'), array('controller' => 'ufs', 'action' => 'add')); ?> </li>
	</ul>
</div>
