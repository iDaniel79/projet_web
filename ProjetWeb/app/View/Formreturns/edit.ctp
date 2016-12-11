<div class="formreturns form">
<?php echo $this->Form->create('Formreturn'); ?>
	<fieldset>
		<legend><?php echo __('Editer un formulaire de retour'); ?></legend>
	<?php
		echo $this->Form->input('id',array('label' => 'Id'));
		echo $this->Form->input('create',array('label' => 'Date de création'));
		echo $this->Form->input('commentaire_1');
		echo $this->Form->input('evaluation_1');
		echo $this->Form->input('commentaire_2');
		echo $this->Form->input('evaluation_2');
		echo $this->Form->input('commentaire_3');
		echo $this->Form->input('evaluation_3');
		echo $this->Form->input('commentaire_4');
		echo $this->Form->input('evaluation_4');
		echo $this->Form->input('commentaire_5');
		echo $this->Form->input('evaluation_5');
		echo $this->Form->input('commentaire_6');
		echo $this->Form->input('evaluation_6');
		echo $this->Form->input('commentaire_7');
		echo $this->Form->input('evaluation_7');
		echo $this->Form->input('ufs_id');
                echo $this->Form->input('formulaires_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php //echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $this->Form->value('Formreturn.id')), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $this->Form->value('Formreturn.id')))); ?></li>
		<li><?php //echo $this->Html->link(__('Liste formulaires de retour'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('Liste Ufs'), array('controller' => 'ufs', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvelle Uf'), array('controller' => 'ufs', 'action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
