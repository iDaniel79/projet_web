<div class="ufs view">
<h2><?php echo __('Uf'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($uf['Uf']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($uf['Uf']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($uf['Uf']['code']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Uf'), array('action' => 'edit', $uf['Uf']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Uf'), array('action' => 'delete', $uf['Uf']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $uf['Uf']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Ufs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uf'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($uf['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Firstname'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Birthdate'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Mobile'); ?></th>
		<th><?php echo __('Street'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('Postal Code'); ?></th>
		<th><?php echo __('Country'); ?></th>
		<th><?php echo __('Validate'); ?></th>
		<th><?php echo __('Create'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($uf['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['firstname']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['birthdate']; ?></td>
			<td><?php echo $user['phone']; ?></td>
			<td><?php echo $user['mobile']; ?></td>
			<td><?php echo $user['street']; ?></td>
			<td><?php echo $user['number']; ?></td>
			<td><?php echo $user['city']; ?></td>
			<td><?php echo $user['postal_code']; ?></td>
			<td><?php echo $user['country']; ?></td>
			<td><?php echo $user['validate']; ?></td>
			<td><?php echo $user['create']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
