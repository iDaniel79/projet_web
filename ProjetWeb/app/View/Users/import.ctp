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
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>