<div class="import">
    <?= $this->Form->create('User') ?>
        <fieldset>
        	<legend><?= __('Choisir un CSV à importer') ?></legend>
        		<?php echo $this->Form->create('User', array('type' => 'file')); ?>
       			 <input type="file" name="fichier"/>     
        </fieldset>
	<?php echo $this->Form->end(__('Valider')); ?>
</div>


