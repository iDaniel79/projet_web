<div class="formulaires view">
<h2><?php echo __('Formulaire refusé'); ?></h2>		
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($form['Formulaire']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('version'); ?></dt>
			<dd>
				<?php echo h($form['Formulaire']['version']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('name'); ?></dt>
			<dd>
				<?php echo h($form['Formulaire']['name']); ?>
				&nbsp;
			</dd>
</div>

<div class="formulaires form">
	<?php echo $this->Form->create('Formulaire'); ?>
		<fieldset>
			<?php echo $this->Form->input('error_message', array('label' => " Message d'erreur"));?>
			&nbsp;		
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>