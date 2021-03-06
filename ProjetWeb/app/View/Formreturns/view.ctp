<div class="formreturns view">
<h2><?php echo __('Formulaire de retour'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($formreturn['Formreturn']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date de creation'); ?></dt>
		<dd>
			<?php echo h($formreturn['Formreturn']['create']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Commentaire 1'); ?></dt>
		<dd>
			<?php echo h($formreturn['Formreturn']['commentaire_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluation 1'); ?></dt>
		<dd>
			<?php echo h($formreturn['Formreturn']['evaluation_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Commentaire 2'); ?></dt>
		<dd>
			<?php echo h($formreturn['Formreturn']['commentaire_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluation 2'); ?></dt>
		<dd>
			<?php echo h($formreturn['Formreturn']['evaluation_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Commentaire 3'); ?></dt>
		<dd>
			<?php echo h($formreturn['Formreturn']['commentaire_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluation 3'); ?></dt>
		<dd>
			<?php echo h($formreturn['Formreturn']['evaluation_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Commentaire 4'); ?></dt>
		<dd>
			<?php echo h($formreturn['Formreturn']['commentaire_4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluation 4'); ?></dt>
		<dd>
			<?php echo h($formreturn['Formreturn']['evaluation_4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Commentaire 5'); ?></dt>
		<dd>
			<?php echo h($formreturn['Formreturn']['commentaire_5']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluation 5'); ?></dt>
		<dd>
			<?php echo h($formreturn['Formreturn']['evaluation_5']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Commentaire 6'); ?></dt>
		<dd>
			<?php echo h($formreturn['Formreturn']['commentaire_6']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluation 6'); ?></dt>
		<dd>
			<?php echo h($formreturn['Formreturn']['evaluation_6']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Commentaire 7'); ?></dt>
		<dd>
			<?php echo h($formreturn['Formreturn']['commentaire_7']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluation 7'); ?></dt>
		<dd>
			<?php echo h($formreturn['Formreturn']['evaluation_7']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ufs'); ?></dt>
		<dd>
			<?php echo $this->Html->link($formreturn['Ufs']['name'], array('controller' => 'ufs', 'action' => 'view', $formreturn['Ufs']['id'])); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Formulaire de référence'); ?></dt>
		<dd>
			<?php echo $this->Html->link($formreturn['Formulaires']['version'], array('controller' => 'formulaires', 'action' => 'view', $formreturn['Formulaires']['id'])); ?>
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
		<li><?php //echo $this->Html->link(__('Editer formulaire de retour'), array('action' => 'edit', $formreturn['Formreturn']['id'])); ?> </li>
		<li><?php //echo $this->Form->postLink(__('Supprimer formulaire de retour'), array('action' => 'delete', $formreturn['Formreturn']['id']), array('confirm' => __('Êtes-vous sûr de vouloir supprimer le # %s?', $formreturn['Formreturn']['id']))); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste formulaires de retour'), array('action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouveau formulaire de retour'), array('action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('Liste Ufs'), array('controller' => 'ufs', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouveau Uf'), array('controller' => 'ufs', 'action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
