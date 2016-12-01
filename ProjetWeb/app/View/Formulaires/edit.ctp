<div class="formulaires form">
<?php echo $this->Form->create('Formulaire'); ?>
	<fieldset>
		<legend><?php echo __('Edit Formulaire'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('version');
		echo $this->Form->input('name');
		echo $this->Form->input('titre_1');
		echo $this->Form->input('titre_2');
		echo $this->Form->input('titre_3');
		echo $this->Form->input('titre_4');
		echo $this->Form->input('titre_5');
		echo $this->Form->input('titre_6');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Formulaire.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Formulaire.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Formulaires'), array('action' => 'index')); ?></li>
	</ul>
</div>
