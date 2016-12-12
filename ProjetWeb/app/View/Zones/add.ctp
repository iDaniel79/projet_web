<div class="zones form">
<?php echo $this->Form->create('Zone'); ?>
	<fieldset>
		<legend><?php echo __('Ajouter une zone'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label' => 'Nom de la zone'));
		echo $this->Form->input('path',array('label' => 'Chemin'));
		echo $this->Form->input('Role',array('label' => 'Rôles'));
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
		<li><?php //echo $this->Html->link(__('Liste zones'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('Liste rôles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouveau rôle'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
