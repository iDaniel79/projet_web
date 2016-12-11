<div class="users index">
	<h2><?php echo __('Utilisateurs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('Email'); ?></th>			
			<th><?php echo $this->Paginator->sort('Prénom'); ?></th>
			<th><?php echo $this->Paginator->sort('Nom'); ?></th>			
			<th><?php echo $this->Paginator->sort('Validé'); ?></th>
			<th><?php echo $this->Paginator->sort('Date de création'); ?></th>			
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>		
		<td><?php echo h($user['User']['firstname']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['name']); ?>&nbsp;</td>		
		<td><?php if($user['User']['active'] == 1)
					{
						echo h("Oui");
					}else
					{
						echo h("Non");
					}?>&nbsp;</td>
		<td><?php echo h($user['User']['create']); ?>&nbsp;</td>		
		<td class="actions">
			<?php echo $this->Html->link(__('Consulter'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $user['User']['id']))); ?>
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
		<li><?php //echo $this->Html->link(__('Nouvel utilisateur'), array('action' => 'add')); ?></li>
		<li><?php //echo $this->Html->link(__('Liste classe'), array('controller' => 'classrooms', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvelle classe'), array('controller' => 'classrooms', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste rôles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouveau rôle'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste Ufs'), array('controller' => 'ufs', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvelle Uf'), array('controller' => 'ufs', 'action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
