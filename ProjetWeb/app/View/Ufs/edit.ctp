<div class="ufs form">
<?php echo $this->Form->create('Uf'); ?>
	<fieldset>
		<legend><?php echo __('Edit Uf'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('code');
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Uf.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Uf.id')))); ?></li>
		<li><?php //echo $this->Html->link(__('List Ufs'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
