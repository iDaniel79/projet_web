<div class="formulaires index">
	<h2><?php echo __('Formulaires'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('version'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('titre_1'); ?></th>
			<th><?php echo $this->Paginator->sort('titre_2'); ?></th>
			<th><?php echo $this->Paginator->sort('titre_3'); ?></th>
			<th><?php echo $this->Paginator->sort('titre_4'); ?></th>
			<th><?php echo $this->Paginator->sort('titre_5'); ?></th>
			<th><?php echo $this->Paginator->sort('titre_6'); ?></th>
                        <th><?php echo $this->Paginator->sort('titre_7'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($formulaires as $formulaire): ?>
	<tr>
		<td><?php echo h($formulaire['Formulaire']['id']); ?>&nbsp;</td>
		<td><?php echo h($formulaire['Formulaire']['version']); ?>&nbsp;</td>
		<td><?php echo h($formulaire['Formulaire']['name']); ?>&nbsp;</td>
		<td><?php echo h($formulaire['Formulaire']['titre_1']); ?>&nbsp;</td>
		<td><?php echo h($formulaire['Formulaire']['titre_2']); ?>&nbsp;</td>
		<td><?php echo h($formulaire['Formulaire']['titre_3']); ?>&nbsp;</td>
		<td><?php echo h($formulaire['Formulaire']['titre_4']); ?>&nbsp;</td>
		<td><?php echo h($formulaire['Formulaire']['titre_5']); ?>&nbsp;</td>
		<td><?php echo h($formulaire['Formulaire']['titre_6']); ?>&nbsp;</td>
                <td><?php echo h($formulaire['Formulaire']['titre_7']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Consulter'), array('action' => 'view', $formulaire['Formulaire']['id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $formulaire['Formulaire']['id'])); ?>
			<?php echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $formulaire['Formulaire']['id']), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $formulaire['Formulaire']['id']))); ?>
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
		<li><?php //echo $this->Html->link(__('Nouveau Formulaire'), array('action' => 'add')); ?></li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
