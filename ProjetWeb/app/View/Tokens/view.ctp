<div class="tokens view">
<h2><?php echo __('Token'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($token['Token']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Creation'); ?></dt>
		<dd>
			<?php echo h($token['Token']['date_creation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Fin'); ?></dt>
		<dd>
			<?php echo h($token['Token']['date_fin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Statut'); ?></dt>
		<dd>
			<?php echo h($token['Token']['statut']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero'); ?></dt>
		<dd>
			<?php echo h($token['Token']['numero']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ufs'); ?></dt>
		<dd>
			<?php echo $this->Html->link($token['Ufs']['name'], array('controller' => 'ufs', 'action' => 'view', $token['Ufs']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editer token'), array('action' => 'edit', $token['Token']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Supprimer token'), array('action' => 'delete', $token['Token']['id']), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $token['Token']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('Liste tokens'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouveau token'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Liste Ufs'), array('controller' => 'ufs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvelle Uf'), array('controller' => 'ufs', 'action' => 'add')); ?> </li>
	</ul>
</div>
