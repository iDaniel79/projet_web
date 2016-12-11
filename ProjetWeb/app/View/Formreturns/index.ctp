<div class="formreturns index">
	<h2><?php echo __('Formulaires de retour'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('create'); ?></th>
			<th><?php echo $this->Paginator->sort('commentaire_1'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluation_1'); ?></th>
			<th><?php echo $this->Paginator->sort('commentaire_2'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluation_2'); ?></th>
			<th><?php echo $this->Paginator->sort('commentaire_3'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluation_3'); ?></th>
			<th><?php echo $this->Paginator->sort('commentaire_4'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluation_4'); ?></th>
			<th><?php echo $this->Paginator->sort('commentaire_5'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluation_5'); ?></th>
			<th><?php echo $this->Paginator->sort('commentaire_6'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluation_6'); ?></th>
			<th><?php echo $this->Paginator->sort('commentaire_7'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluation_7'); ?></th>
			<th><?php echo $this->Paginator->sort('ufs_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($formreturns as $formreturn): ?>
	<tr>
		<td><?php echo h($formreturn['Formreturn']['id']); ?>&nbsp;</td>
		<td><?php echo h($formreturn['Formreturn']['create']); ?>&nbsp;</td>
		<td><?php echo h($formreturn['Formreturn']['commentaire_1']); ?>&nbsp;</td>
		<td><?php echo h($formreturn['Formreturn']['evaluation_1']); ?>&nbsp;</td>
		<td><?php echo h($formreturn['Formreturn']['commentaire_2']); ?>&nbsp;</td>
		<td><?php echo h($formreturn['Formreturn']['evaluation_2']); ?>&nbsp;</td>
		<td><?php echo h($formreturn['Formreturn']['commentaire_3']); ?>&nbsp;</td>
		<td><?php echo h($formreturn['Formreturn']['evaluation_3']); ?>&nbsp;</td>
		<td><?php echo h($formreturn['Formreturn']['commentaire_4']); ?>&nbsp;</td>
		<td><?php echo h($formreturn['Formreturn']['evaluation_4']); ?>&nbsp;</td>
		<td><?php echo h($formreturn['Formreturn']['commentaire_5']); ?>&nbsp;</td>
		<td><?php echo h($formreturn['Formreturn']['evaluation_5']); ?>&nbsp;</td>
		<td><?php echo h($formreturn['Formreturn']['commentaire_6']); ?>&nbsp;</td>
		<td><?php echo h($formreturn['Formreturn']['evaluation_6']); ?>&nbsp;</td>
		<td><?php echo h($formreturn['Formreturn']['commentaire_7']); ?>&nbsp;</td>
		<td><?php echo h($formreturn['Formreturn']['evaluation_7']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($formreturn['Ufs']['name'], array('controller' => 'ufs', 'action' => 'view', $formreturn['Ufs']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Consulter'), array('action' => 'view', $formreturn['Formreturn']['id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $formreturn['Formreturn']['id'])); ?>
			<?php echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $formreturn['Formreturn']['id']), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $formreturn['Formreturn']['id']))); ?>
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
		<li><?php //echo $this->Html->link(__('Nouveau formulaire de retour'), array('action' => 'add')); ?></li>
		<li><?php //echo $this->Html->link(__('Liste Uf'), array('controller' => 'ufs', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvelle Uf'), array('controller' => 'ufs', 'action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
