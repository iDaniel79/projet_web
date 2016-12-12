<div class="zones view">
<h2><?php echo __('Zone'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($zone['Zone']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nom'); ?></dt>
		<dd>
			<?php echo h($zone['Zone']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Chemin'); ?></dt>
		<dd>
			<?php echo h($zone['Zone']['path']); ?>
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

		<li><?php //echo $this->Html->link(__('Editer zone'), array('action' => 'edit', $zone['Zone']['id'])); ?> </li>
		<li><?php //echo $this->Form->postLink(__('Supprimer zone'), array('action' => 'delete', $zone['Zone']['id']), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $zone['Zone']['id']))); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste zones'), array('action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvelle zone'), array('action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste rôles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouveau rôle'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Liason des rôles'); ?></h3>
	<?php if (!empty($zone['Role'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($zone['Role'] as $role): ?>
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
