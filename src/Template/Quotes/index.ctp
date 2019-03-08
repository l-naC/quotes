<?php //file : src/Templates/Quotes/index.ctp 
//var_dump($quotes, count($quotes));
?>
<h1>Quotes</h1>
<ul>
	<?php foreach ($quotes as $uneLigne) {
		// raccourcie qui écrit un lien en paramettre (sur quoi on click, le liende redirection[si on change de controller, l'action , et parametre qu'on rajoute a l'url])
		//$this->Html->link($uneLigne->content, ['controller' => 'autresController', 'action' => 'view', $$uneLigne->id])
		echo '<li>'.$this->Html->link($uneLigne->content, ['action' => 'view', $uneLigne->id]);
		if (!empty($uneLigne->author)) {
			echo '('.$uneLigne->author.')';
		}
		echo '</li>';
	} 
	?>
</ul>
<p>Il y a <?= $quotes->count(); ?> citation(s)</p>

<p><?= $this->Html->link('Ajouter une citation', ['action' => 'add']); ?></p>