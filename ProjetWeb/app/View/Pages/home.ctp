<div class="users form">
	<fieldset>
		<legend><?php echo __("Page d'accueil"); ?></legend>
		<p>Bienvenue sur la nouvelle plateforme</p>
	</fieldset>		
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Accueil'), array('controller' => 'pages', 'action' => 'home')); ?></li>
		<li><?php echo $this->Html->link(__('Mon profil'), array('controller' => 'users', 'action' => 'view', $_SESSION['id_user'])); ?></li>
		<li><?php echo $this->Html->link(__('Gérer profil'), array('controller' => 'users', 'action' => 'edit', $_SESSION['id_user'])); ?></li>
		</br>

		<?php if ( $_SESSION['role'] == 'Eleve' || $_SESSION['role'] == 'Professeur'){ ?>
			
		<?php } else {		
        	include('/../Zones/zone.ctp');
        } ?>
	</ul>
</div>
