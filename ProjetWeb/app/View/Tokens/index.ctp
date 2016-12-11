<div class="tokens index">
	<h2><?php echo __('Tokens'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('date_creation'); ?></th>
			<th><?php echo $this->Paginator->sort('date_fin'); ?></th>
			<th><?php echo $this->Paginator->sort('statut'); ?></th>
			<th><?php echo $this->Paginator->sort('numero'); ?></th>
			<th><?php echo $this->Paginator->sort('ufs_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($tokens as $token): ?>
	<tr>
		<td><?php echo h($token['Token']['id']); ?>&nbsp;</td>
		<td><?php echo h($token['Token']['date_creation']); ?>&nbsp;</td>
		<td><?php echo h($token['Token']['date_fin']); ?>&nbsp;</td>
		<td><?php echo h($token['Token']['statut']); ?>&nbsp;</td>
		<td><?php echo h($token['Token']['numero']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($token['Ufs']['name'], array('controller' => 'ufs', 'action' => 'view', $token['Ufs']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Consulter'), array('action' => 'view', $token['Token']['id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $token['Token']['id'])); ?>
			<?php echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $token['Token']['id']), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $token['Token']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('Nouveau token'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Liste Ufs'), array('controller' => 'ufs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvelle Uf'), array('controller' => 'ufs', 'action' => 'add')); ?> </li>
	</ul>
</div>
