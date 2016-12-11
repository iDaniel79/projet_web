<div class="formulaires form">
<?php echo $this->Form->create('Formulaire'); ?>
	<fieldset>
		<legend><?php echo __('Editer un formulaire'); ?></legend>
	<?php
		echo $this->Form->input('id',array('label' => 'Id'));
		echo $this->Form->input('version',array('label' => 'Version'));
		echo $this->Form->input('name',array('label' => 'Nom'));
		echo $this->Form->input('titre_1');
		echo $this->Form->input('titre_2');
		echo $this->Form->input('titre_3');
		echo $this->Form->input('titre_4');
		echo $this->Form->input('titre_5');
		echo $this->Form->input('titre_6');
        echo $this->Form->input('titre_7');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php //echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $this->Form->value('Formulaire.id')), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $this->Form->value('Formulaire.id')))); ?></li>
		<li><?php //echo $this->Html->link(__('Liste formulaires'), array('action' => 'index')); ?></li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
