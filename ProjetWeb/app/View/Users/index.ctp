<div class="users index">
	<h2><?php echo __('Utilisateurs'); ?></h2>

		 <?= $this->Form->create('User') ?>
            <fieldset>
                <legend><?= __('Choix du filtrage') ?></legend>
                <?= $this->Form->input('Role', array(
                	'type'=>'select','options'=>$list)) ?>
                       
            </fieldset>
               
        <?php echo $this->Form->end(__('Filtrer')); ?>

    <?php if(!empty($users)){?>

		<table cellpadding="0" cellspacing="0">
		<thead>
		<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('Email'); ?></th>			
				<th><?php echo $this->Paginator->sort('Prénom'); ?></th>
				<th><?php echo $this->Paginator->sort('Nom'); ?></th>			
				<th><?php echo $this->Paginator->sort('Validé'); ?></th>
				<th><?php echo $this->Paginator->sort('Date de création'); ?></th>			
		</tr>
		</thead>
		<tbody>
		<?php foreach ($users as $user): ?>
		<tr>
		
			<td><?php echo h($user['id']); ?>&nbsp;</td>
			<td><?php echo h($user['email']); ?>&nbsp;</td>		
			<td><?php echo h($user['firstname']); ?>&nbsp;</td>
			<td><?php echo h($user['name']); ?>&nbsp;</td>		
			<td><?php if($user['active'] == 1)
						{
							echo h("Oui");
						}else
						{
							echo h("Non");
						}?>&nbsp;</td>
			<td><?php echo h($user['create']); ?>&nbsp;</td>		
			<td class="actions">
				<?php echo $this->Html->link(__('Consulter'), array('action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Supprimer'), array('action' => 'delete', $user['id']), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $user['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</tbody>
		</table>
		<p>
		<?php
		echo $this->Paginator->counter(array(
			'format' => __("Page {:page} sur {:pages}, montre {:current} enregristrements sur un total de {:count}, démarre sur l'enregistrement {:start}, termine sur l'enregistrement {:end}")
		));
		?>	</p>

		
		<div class="paging">
		<?php
			echo $this->Paginator->prev('< ' . __('précédent'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('suivant') . ' >', array(), null, array('class' => 'next disabled'));
		?>
		</div>

	<?php } ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Accueil'), array('controller' => 'pages', 'action' => 'home')); ?></li>
		<li><?php echo $this->Html->link(__('Mon profil'), array('controller' => 'users', 'action' => 'view', $_SESSION['id_user'])); ?></li>
		<li><?php echo $this->Html->link(__('Gérer profil'), array('controller' => 'users', 'action' => 'edit', $_SESSION['id_user'])); ?></li>
		</br>
		<li><?php //echo $this->Html->link(__('Nouvel utilisateur'), array('action' => 'add')); ?></li>
		<li><?php //echo $this->Html->link(__('Liste classe'), array('controller' => 'classrooms', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvelle classe'), array('controller' => 'classrooms', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste rôles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouveau rôle'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste Ufs'), array('controller' => 'ufs', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvelle Uf'), array('controller' => 'ufs', 'action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
