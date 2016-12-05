<div class="formulaires form">
<?php echo $this->Form->create('Formulaire'); ?>
	<fieldset>
		<legend><?php echo __('Add Formulaire'); ?></legend>
	<?php
		echo $this->Form->input('version');
		echo $this->Form->input('name');
		echo $this->Form->input('titre_1');
		echo $this->Form->input('titre_2');
		echo $this->Form->input('titre_3');
		echo $this->Form->input('titre_4');
		echo $this->Form->input('titre_5');
		echo $this->Form->input('titre_6');
                echo $this->Form->input('titre_7');
                echo $this->Form->input('token_length');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Formulaires'), array('action' => 'index')); ?></li>
	</ul>
</div>
