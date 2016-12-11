<p>
	<strong>Bonjour <?php echo $email; ?></strong>
</p>

<p>
	Pour activer votre compte, suivez ce lien : 
</p>

<p>
		<?php //debug($this->html->url($link,true));
		//die();
		 ?>	
	<?php echo $this->Html->link('Activer mon compte',$this->Html->url($link,true)); ?>	
		
</p>