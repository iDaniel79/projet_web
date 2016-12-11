<div class="formreturns form">
<?php echo $this->Form->create('Formreturn'); ?>
	<fieldset>
		<legend><?php echo __("Ajouter un formulaire de retour"); ?></legend>
	<?php
		echo $this->Form->input('create',array('label' => 'Date de création'));
                echo $this->Form->input('commentaire_1');
                echo $this->Form->input('evaluation_1', array(                     
                        'options' => array(1=>'Je ne suis pas satisfait.',
                            2=>'Je ne suis pas entièrement satisfait.',
                            3=>'Je suis satisfait, ni plus, ni moins.',
                            4=>'Mes attentes sont amplement rencontrées.',
                            5=>'Excellent, je suis très satisfait.'),
                            'value'=>3,
                        'type' => 'radio'
                    ));
		echo $this->Form->input('commentaire_2');
                echo $this->Form->input('evaluation_2', array(                     
                        'options' => array(1=>'Je ne suis pas satisfait.',
                            2=>'Je ne suis pas entièrement satisfait.',
                            3=>'Je suis satisfait, ni plus, ni moins.',
                            4=>'Mes attentes sont amplement rencontrées.',
                            5=>'Excellent, je suis très satisfait.'),
                        'value'=>3,
                        'type' => 'radio'
                    ));
		echo $this->Form->input('commentaire_3');
                echo $this->Form->input('evaluation_3', array(                     
                        'options' => array(1=>'Je ne suis pas satisfait.',
                            2=>'Je ne suis pas entièrement satisfait.',
                            3=>'Je suis satisfait, ni plus, ni moins.',
                            4=>'Mes attentes sont amplement rencontrées.',
                            5=>'Excellent, je suis très satisfait.'),
                            'value'=>3,
                        'type' => 'radio'
                    ));                
		echo $this->Form->input('commentaire_4');
                echo $this->Form->input('evaluation_4', array(                     
                        'options' => array(1=>'Je ne suis pas satisfait.',
                            2=>'Je ne suis pas entièrement satisfait.',
                            3=>'Je suis satisfait, ni plus, ni moins.',
                            4=>'Mes attentes sont amplement rencontrées.',
                            5=>'Excellent, je suis très satisfait.'),
                            'value'=>3,
                        'type' => 'radio'
                    ));
		echo $this->Form->input('commentaire_5');
                echo $this->Form->input('evaluation_5', array(                     
                        'options' => array(1=>'Je ne suis pas satisfait.',
                            2=>'Je ne suis pas entièrement satisfait.',
                            3=>'Je suis satisfait, ni plus, ni moins.',
                            4=>'Mes attentes sont amplement rencontrées.',
                            5=>'Excellent, je suis très satisfait.'),
                            'value'=>3,
                        'type' => 'radio'
                    ));
		echo $this->Form->input('commentaire_6');
                echo $this->Form->input('evaluation_6', array(                     
                        'options' => array(1=>'Je ne suis pas satisfait.',
                            2=>'Je ne suis pas entièrement satisfait.',
                            3=>'Je suis satisfait, ni plus, ni moins.',
                            4=>'Mes attentes sont amplement rencontrées.',
                            5=>'Excellent, je suis très satisfait.'),
                            'value'=>3,
                        'type' => 'radio'
                    ));
		echo $this->Form->input('commentaire_7');
                echo $this->Form->input('evaluation_7', array(                     
                        'options' => array(1=>'Je ne suis pas satisfait.',
                            2=>'Je ne suis pas entièrement satisfait.',
                            3=>'Je suis satisfait, ni plus, ni moins.',
                            4=>'Mes attentes sont amplement rencontrées.',
                            5=>'Excellent, je suis très satisfait.'),
                            'value'=>3,
                        'type' => 'radio'
                    ));
		echo $this->Form->input('ufs_id');
                echo $this->Form->input('formulaires_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php //echo $this->Html->link(__('Liste formulaires de retour'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('Liste Ufs'), array('controller' => 'ufs', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('Nouvelle Uf'), array('controller' => 'ufs', 'action' => 'add')); ?> </li>
                <?php include('/../Zones/zone.ctp')?>
	</ul>
</div>
