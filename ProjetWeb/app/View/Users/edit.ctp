<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('firstname');
		echo $this->Form->input('name');
		echo $this->Form->input('birthdate');
		echo $this->Form->input('phone');
		echo $this->Form->input('mobile');
		echo $this->Form->input('street');
		echo $this->Form->input('number');
		echo $this->Form->input('city');
		echo $this->Form->input('postal_code');
		echo $this->Form->input('country');
		echo $this->Form->input('validate');
		echo $this->Form->input('create');
		echo $this->Form->input('Role');
		echo $this->Form->input('Uf');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('User.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ufs'), array('controller' => 'ufs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uf'), array('controller' => 'ufs', 'action' => 'add')); ?> </li>
	</ul>
</div>
