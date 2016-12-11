<div class="formulaires form">
<?php echo $this->Form->create('Formulaire'); ?>
	<fieldset>
		<legend><?php echo __('Ajouter un formulaire'); ?></legend>
	<?php
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

		<li><?php //echo $this->Html->link(__('Liste Formulaires'), array('action' => 'index')); ?></li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
