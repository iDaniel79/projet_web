<p>
	<strong>Bonjours <?php echo $email; ?></strong>
</p>

<p>
	Pour activer ce compte suivez le lien : 
</p>

<p>
		<?php debug($this->html->url($link,true));
		die();
		 ?>	
	<?php echo $this->Html->link('Activer mon compte',$this->Html->url($link,true)); ?>	
		
</p>