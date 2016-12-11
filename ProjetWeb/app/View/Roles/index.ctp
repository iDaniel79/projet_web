<div class="roles index">
	<h2><?php echo __('Rôles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('role'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($roles as $role): ?>
	<tr>
		<td><?php echo h($role['Role']['id']); ?>&nbsp;</td>
		<td><?php echo h($role['Role']['role']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Consulter'), array('action' => 'view', $role['Role']['id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $role['Role']['id'])); ?>
			<?php echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $role['Role']['id']), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $role['Role']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __("Page {:page} sur {:pages}, montre {:current} enregristrements sur un total de {:count}, démarre sur l'enregistrement {:start}, termine sur l'enregistrement {:end}")
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('précédent'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('suivant') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php //echo $this->Html->link(__('Nouveau role'), array('action' => 'add')); ?></li>
		<li><?php //echo $this->Html->link(__('Liste zones'), array('controller' => 'zones', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvelle zone'), array('controller' => 'zones', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste utilisateurs'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvel utilisateur'), array('controller' => 'users', 'action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
