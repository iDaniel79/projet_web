<div class="roles view">
<h2><?php echo __('Rôle'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($role['Role']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rôle'); ?></dt>
		<dd>
			<?php echo h($role['Role']['role']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Accueil'), array('controller' => 'pages', 'action' => 'home')); ?></li>
		<li><?php echo $this->Html->link(__('Mon profil'), array('controller' => 'users', 'action' => 'view', $_SESSION['id_user'])); ?></li>
		<li><?php echo $this->Html->link(__('Gérer profil'), array('controller' => 'users', 'action' => 'edit', $_SESSION['id_user'])); ?></li>
		</br>

		<li><?php //echo $this->Html->link(__('Editer rôle'), array('action' => 'edit', $role['Role']['id'])); ?> </li>
		<li><?php //echo $this->Form->postLink(__('Supprimer rôle'), array('action' => 'delete', $role['Role']['id']), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $role['Role']['id']))); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste rôles'), array('action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouveau rôle'), array('action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste zones'), array('controller' => 'zones', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvelle zone'), array('controller' => 'zones', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste utilisateurs'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvel utilisateur'), array('controller' => 'users', 'action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Liaison des zones'); ?></h3>
	<?php if (!empty($role['Zone'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nom'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($role['Zone'] as $zone): ?>
		<tr>
			<td><?php echo $zone['id']; ?></td>
			<td><?php echo $zone['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Consulter'), array('controller' => 'zones', 'action' => 'view', $zone['id'])); ?>
				<?php echo $this->Html->link(__('Editer'), array('controller' => 'zones', 'action' => 'edit', $zone['id'])); ?>
				<?php echo $this->Form->postLink(__('Supprimer'), array('controller' => 'zones', 'action' => 'delete', $zone['id']), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $zone['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nouvelle zone'), array('controller' => 'zones', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Liaison des utilisateurs'); ?></h3>
	<?php if (!empty($role['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Prénom'); ?></th>
		<th><?php echo __('Nom'); ?></th>
		<th><?php echo __('Date de naissance'); ?></th>
		<th><?php echo __('Téléphone'); ?></th>
		<th><?php echo __('GSM'); ?></th>
		<th><?php echo __('Rue'); ?></th>
		<th><?php echo __('Numéro'); ?></th>
		<th><?php echo __('Ville'); ?></th>
		<th><?php echo __('Code Postal'); ?></th>
		<th><?php echo __('Pays'); ?></th>
		<th><?php echo __('Actif'); ?></th>
		<th><?php echo __('Date de création'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($role['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['firstname']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['birthdate']; ?></td>
			<td><?php echo $user['phone']; ?></td>
			<td><?php echo $user['mobile']; ?></td>
			<td><?php echo $user['street']; ?></td>
			<td><?php echo $user['number']; ?></td>
			<td><?php echo $user['city']; ?></td>
			<td><?php echo $user['postal_code']; ?></td>
			<td><?php echo $user['country']; ?></td>
			<td><?php echo $user['active']; ?></td>
			<td><?php echo $user['create']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Consulter'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Editer'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Supprimer'), array('controller' => 'users', 'action' => 'delete', $user['id']), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $user['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nouvel utilisateur'), array('controller' => 'users', 'action' => 'add')); ?> </li>
                        
		</ul>
	</div>
</div>
