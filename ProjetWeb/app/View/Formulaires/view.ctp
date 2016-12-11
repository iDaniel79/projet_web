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
		<dt><?php echo __('Nom'); ?></dt>
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
                <dt><?php echo __('Titre 7'); ?></dt>
                <dd>
			<?php echo h($formulaire['Formulaire']['titre_7']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php //echo $this->Html->link(__('Editer formulaire'), array('action' => 'edit', $formulaire['Formulaire']['id'])); ?> </li>
		<li><?php //echo $this->Form->postLink(__('Supprimer formulaire'), array('action' => 'delete', $formulaire['Formulaire']['id']), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $formulaire['Formulaire']['id']))); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste formulaires'), array('action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouveau formulaire'), array('action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
