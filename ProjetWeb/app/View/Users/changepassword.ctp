<div class="users form">
        <?= $this->Form->create('User') ?>
            <fieldset>
                <legend><?= __('Changer son mot de passe') ?></legend>
                <?php
               		echo $this->Form->input('password1',array('label' => 'mot de passe', 'type' => 'password'));
					echo $this->Form->input('password2',array('label' => 'Confirmation du mot de passe', 'type' => 'password'));
				?>      
            </fieldset>
            <?php echo $this->Form->end(__('Valider')); ?>       
        <?= $this->Form->end() ?>
</div>