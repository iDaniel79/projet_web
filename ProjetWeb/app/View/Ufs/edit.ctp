<div class="ufs form">
<?php echo $this->Form->create('Uf'); ?>
	<fieldset>
		<legend><?php echo __('Editer Uf'); ?></legend>
	<?php
		echo $this->Form->input('id',array('label' => 'Id'));
		echo $this->Form->input('name',array('label' => 'Nom'));
		echo $this->Form->input('code',array('label' => 'Code UF'));
		echo $this->Form->input('User',array('label' => 'Utilisateurs'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Accueil'), array('controller' => 'pages', 'action' => 'home')); ?></li>
		<li><?php echo $this->Html->link(__('Mon profil'), array('controller' => 'users', 'action' => 'view', $_SESSION['id_user'])); ?></li>
		<li><?php echo $this->Html->link(__('Gérer profil'), array('controller' => 'users', 'action' => 'edit', $_SESSION['id_user'])); ?></li>
		</br>

		<li><?php //echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $this->Form->value('Uf.id')), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $this->Form->value('Uf.id')))); ?></li>
		<li><?php //echo $this->Html->link(__('Liste Ufs'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('Liste utilisateurs'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvel utilisateur'), array('controller' => 'users', 'action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
