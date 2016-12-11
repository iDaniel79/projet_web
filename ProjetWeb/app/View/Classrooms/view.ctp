<div class="classrooms view">
<h2><?php echo __('Classes'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($classroom['Classroom']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($classroom['Classroom']['code']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php //echo $this->Html->link(__('Editer classe'), array('action' => 'edit', $classroom['Classroom']['id'])); ?> </li>
		<li><?php //echo $this->Form->postLink(__('Supprimer classe'), array('action' => 'delete', $classroom['Classroom']['id']), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $classroom['Classroom']['id']))); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste classe'), array('action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvelle classe'), array('action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
