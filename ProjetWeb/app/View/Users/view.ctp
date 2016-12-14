<div class="users view">
<h2><?php echo __('Utilisateurs'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('Prénom'); ?></dt>
		<dd>
			<?php echo h($user['User']['firstname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nom'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date de naissance'); ?></dt>
		<dd>
			<?php echo h($user['User']['birthdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Téléphone'); ?></dt>
		<dd>
			<?php echo h($user['User']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('GSM'); ?></dt>
		<dd>
			<?php echo h($user['User']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rue'); ?></dt>
		<dd>
			<?php echo h($user['User']['street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numéro'); ?></dt>
		<dd>
			<?php echo h($user['User']['number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ville'); ?></dt>
		<dd>
			<?php echo h($user['User']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code postal'); ?></dt>
		<dd>
			<?php echo h($user['User']['postal_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pays'); ?></dt>
		<dd>
			<?php echo h($user['User']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Actif'); ?></dt>
		<dd>
			<?php echo h($user['User']['active']); ?>
			<?php 
				if(h($user['User']['active']) == 0)
				{					
					echo 'Compte pas activé   : ';
					echo $this->Html->link(__('Demande de réactivation du compte'), array(
					'controller' => 'users', 'action' => 'requestativate', h($user['User']['id'])));
				} 
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date de création'); ?></dt>
		<dd>
			<?php echo h($user['User']['create']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Classe'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Classrooms']['id'], array('controller' => 'classrooms', 'action' => 'view', $user['Classrooms']['id'])); ?>
			&nbsp;
		</dd>
		
		 <?php    if($_SESSION['id_user'] == h($user['User']['id']))
            {                
                echo $this->Html->link(__('Changer son mot de passe'), array('controller' => 'users', 'action' => 'changepassword'));            
            }    
        ?>
        
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php //echo $this->Html->link(__('Editer utilisateur'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php //echo $this->Form->postLink(__('Supprimer utilisateur'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $user['User']['id']))); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste utilisateurs'), array('action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvel utilisateur'), array('action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste classes'), array('controller' => 'classrooms', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvelle classe'), array('controller' => 'classrooms', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste rôles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouveau rôle'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste Ufs'), array('controller' => 'ufs', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvelle Uf'), array('controller' => 'ufs', 'action' => 'add')); ?> </li>

		<li><?php echo $this->Html->link(__('Accueil'), array('controller' => 'pages', 'action' => 'home')); ?></li>
		<li><?php echo $this->Html->link(__('Mon profil'), array('controller' => 'users', 'action' => 'view', $_SESSION['id_user'])); ?></li>
		<li><?php echo $this->Html->link(__('Gérer profil'), array('controller' => 'users', 'action' => 'edit', $_SESSION['id_user'])); ?></li>
		</br>

		<?php if (($_SESSION['role'] == 'Eleve') || ($_SESSION['role'] == 'Professeur')){ ?>			

		<?php } else {		
            include('/../Zones/zone.ctp');
         }?>

	</ul>
</div>

<?php if(($_SESSION['role'] != 'Eleve') && ($_SESSION['role'] != 'Professeur')){ ?>

	<div class="related">
		<h3><?php echo __('Liaison des rôles'); ?></h3>
		<?php if (!empty($user['Role'])): ?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Role'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($user['Role'] as $role): ?>
			<tr>
				<td><?php echo $role['id']; ?></td>
				<td><?php echo $role['role']; ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('Consulter'), array('controller' => 'roles', 'action' => 'view', $role['id'])); ?>
					<?php echo $this->Html->link(__('Editer'), array('controller' => 'roles', 'action' => 'edit', $role['id'])); ?>
					<?php echo $this->Form->postLink(__('Supprimer'), array('controller' => 'roles', 'action' => 'delete', $role['id']), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $role['id']))); ?>
	                                
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

		<div class="actions">
			<ul>
				<li><?php //echo $this->Html->link(__('Nouveau rôle'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
	<div class="related">
		<h3><?php echo __('Liaison des Ufs'); ?></h3>
		<?php if (!empty($user['Uf'])): ?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('Name'); ?></th>
			<th><?php echo __('Code'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($user['Uf'] as $uf): ?>
			<tr>
				<td><?php echo $uf['id']; ?></td>
				<td><?php echo $uf['name']; ?></td>
				<td><?php echo $uf['code']; ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('Consulter'), array('controller' => 'ufs', 'action' => 'view', $uf['id'])); ?>
					<?php echo $this->Html->link(__('Editer'), array('controller' => 'ufs', 'action' => 'edit', $uf['id'])); ?>
					<?php echo $this->Form->postLink(__('Supprimer'), array('controller' => 'ufs', 'action' => 'delete', $uf['id']), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $uf['id']))); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>

		<div class="actions">
			<ul>
				<li><?php //echo $this->Html->link(__('Nouvelle Uf'), array('controller' => 'ufs', 'action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
<?php }?>