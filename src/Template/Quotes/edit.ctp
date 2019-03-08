<?php //file : src/Templates/Quotes/edit.ctp  ?>

<?= $this->Form->create($citation) ?>
<h1>Modifier une citation</h1>
<?= $this->Form->control('content') ?>
<?= $this->Form->control('author') ?>
<?= $this->Form->button('Modifier') ?>
<?= $this->Form->end() ?>