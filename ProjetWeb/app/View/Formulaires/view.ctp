<div class="formulaires view">
<h2><?php echo __('Formulaire'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($formulaire['Formulaire']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Version'); ?></dt>
		<dd>
			<?php echo h($formulaire['Formulaire']['version']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($formulaire['Formulaire']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titre 1'); ?></dt>
		<dd>
			<?php echo h($formulaire['Formulaire']['titre_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titre 2'); ?></dt>
		<dd>
			<?php echo h($formulaire['Formulaire']['titre_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titre 3'); ?></dt>
		<dd>
			<?php echo h($formulaire['Formulaire']['titre_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titre 4'); ?></dt>
		<dd>
			<?php echo h($formulaire['Formulaire']['titre_4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titre 5'); ?></dt>
		<dd>
			<?php echo h($formulaire['Formulaire']['titre_5']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titre 6'); ?></dt>
		<dd>
			<?php echo h($formulaire['Formulaire']['titre_6']); ?>
			&nbsp;
		</dd>

		<?php 
			if(h($formulaire['Formulaire']['error_check'] == 1))
			{ ?>

				<dt><?php echo __('Date de refus'); ?></dt>
				<dd>
					<?php echo h($formulaire['Formulaire']['date_error']); ?>
					&nbsp;
				</dd>

				<dt><?php echo __('Message de refus'); ?></dt>
				<dd>
					<?php echo h($formulaire['Formulaire']['error_message']); ?>
					&nbsp;
				</dd>
		<?php }else{ ?>

					<dt><?php echo __('Date de validation du scribe'); ?></dt>
					<dd>
						<?php echo h($formulaire['Formulaire']['date_scribe_check']); ?>
						&nbsp;
					</dd>
					<dt><?php echo __('Date de validation du vérificateur'); ?></dt>
					<dd>
						<?php echo h($formulaire['Formulaire']['date_verif_check']); ?>
						&nbsp;
					</dd>
					<dt><?php echo __('Date de validation de la direction'); ?></dt>
					<dd>
						<?php echo h($formulaire['Formulaire']['date_directeur_check']); ?>
						&nbsp;
					</dd>


		<?php }	?>



	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php //echo $this->Html->link(__('Edit Formulaire'), array('action' => 'edit', $formulaire['Formulaire']['id'])); ?> </li>
		<li><?php //echo $this->Form->postLink(__('Delete Formulaire'), array('action' => 'delete', $formulaire['Formulaire']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $formulaire['Formulaire']['id']))); ?> </li>
		<li><?php //echo $this->Html->link(__('List Formulaires'), array('action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Formulaire'), array('action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
