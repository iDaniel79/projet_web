<div class="classrooms index">
	<h2><?php echo __('Classes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($classrooms as $classroom): ?>
	<tr>
		<td><?php echo h($classroom['Classroom']['id']); ?>&nbsp;</td>
		<td><?php echo h($classroom['Classroom']['code']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Consulter'), array('action' => 'view', $classroom['Classroom']['id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $classroom['Classroom']['id'])); ?>
			<?php echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $classroom['Classroom']['id']), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $classroom['Classroom']['id']))); ?>
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
		<li><?php //echo $this->Html->link(__('Nouvelle classe'), array('action' => 'add')); ?></li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
