<?php //file : src/Templates/Quotes/view.ctp 

?>
<h1>Une Citation</h1>
<p><?php echo $citation->content; ?></p>
<p>Author : <?php  if (!empty($citation->author)) { echo $citation->author; }else{ echo '<span style="font-style:italic;">Anonyme</span>'; } ?></p>
<p>Created  : <?php echo $citation->created; ?></p>
<p>Modified  : <?php echo $citation->modified; ?></p>
<p>id # <?php echo $citation->id; ?></p>

<p><?php echo ' '.$this->Html->link('Edit', ['action' => 'edit', $citation->id]); ?></p>

<p><?= $this->Form->postLink('Supprimer', ['action' => 'delete', $citation->id], ['confirm' => 'Etes-vous sûr de vouloir supprimer cette citation ?']); ?></p>