<div class="formulaires form">
	<h2><?php echo __('Formulaires'); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('version'); ?></th>
					<th><?php echo $this->Paginator->sort('name'); ?></th>	
					<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($form as $item): ?>
				<tr>
					<td><?php echo h($item['Formulaire']['id']); ?>&nbsp;</td>
					<td><?php echo h($item['Formulaire']['version']); ?>&nbsp;</td>
					<td><?php echo h($item['Formulaire']['name']); ?>&nbsp;</td>	
					<td class="actions">
						<?php echo $this->Html->link(__('Aperçu'), array('action' => 'view', $item['Formulaire']['id'])); ?>
						<?php echo $this->Html->link(__('Valider'), array('action' => 'valideform', $item['Formulaire']['id'])); ?>
						<?php echo $this->Form->postLink(__('Refuser'), array('action' => 'refuseform', $item['Formulaire']['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>


<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>


