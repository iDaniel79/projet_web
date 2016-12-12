<div class="users form">
	<fieldset>
		<legend><?php echo __("Page d'accueil"); ?></legend>
		<p>Bienvenue sur la nouvelle plateforme</p>
	</fieldset>		
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<?php if ( $_SESSION['role'] == 'Eleve'){ ?>
			<li><?php echo $this->Html->link(__('Consulter'), array('controller' => 'users', 'action' => 'view', $_SESSION['id_user'])); ?></li>
			<li><?php echo $this->Html->link(__('Modifier'), array('controller' => 'users', 'action' => 'edit', $_SESSION['id_user'])); ?></li>
		<?php } else {		
        	include('/../Zones/zone.ctp');
        } ?>
	</ul>
</div>
