<div class="tokens view">
<h2><?php echo __('Token'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($token['Token']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Creation'); ?></dt>
		<dd>
			<?php echo h($token['Token']['date_creation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Fin'); ?></dt>
		<dd>
			<?php echo h($token['Token']['date_fin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Statut'); ?></dt>
		<dd>
			<?php echo h($token['Token']['statut']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero'); ?></dt>
		<dd>
			<?php echo h($token['Token']['numero']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ufs'); ?></dt>
		<dd>
			<?php echo $this->Html->link($token['Ufs']['name'], array('controller' => 'ufs', 'action' => 'view', $token['Ufs']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Token'), array('action' => 'edit', $token['Token']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Token'), array('action' => 'delete', $token['Token']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $token['Token']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Tokens'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Token'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ufs'), array('controller' => 'ufs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ufs'), array('controller' => 'ufs', 'action' => 'add')); ?> </li>
	</ul>
</div>
