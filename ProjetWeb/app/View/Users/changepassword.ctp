<div class="users form">
        <?= $this->Form->create('User') ?>
            <fieldset>
                <legend><?= __('Changer son mot de passe') ?></legend>
                <?php
               		echo $this->Form->input('password1',array('label' => 'Mdp'));
					echo $this->Form->input('password2',array('label' => 'Confirmation du mdp'));
				?>      
            </fieldset>
        <?= $this->Form->button(__('Valider')); ?>
        <?= $this->Form->end() ?>
</div>