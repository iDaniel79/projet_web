<div class="users index">
    <thead>
	<tr>
			
	</tr>
    </thead>
    <tbody>
       <dl>
            
                <?= $this->Form->create('User', array('type' => 'file')) ?>
                    <fieldset>
                            <legend><?= __('Choisir un CSV à importer') ?></legend>
                                    <?php echo $this->Form->create('User', array('type' => 'file')); ?>
                                     <?= $this->Form->input('csv_file',array('label' => 'Fichier au format CSV', 'type' => 'file')); ?>    
                    </fieldset>
                <?php echo $this->Form->end(__('Envoyer les données')); ?>
            
       </dl>
    </tbody>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
        <li><?php echo $this->Html->link(__('Accueil'), array('controller' => 'pages', 'action' => 'home')); ?></li>
        <li><?php echo $this->Html->link(__('Mon profil'), array('controller' => 'users', 'action' => 'view', $_SESSION['id_user'])); ?></li>
        <li><?php echo $this->Html->link(__('Gérer profil'), array('controller' => 'users', 'action' => 'edit', $_SESSION['id_user'])); ?></li>
        </br>
        <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>