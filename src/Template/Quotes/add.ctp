<?php //file : src/Templates/Quotes/add.ctp ?>

<?= $this->Form->create($new) ?>
<h1>Ajouter une citation</h1>
<?= $this->Form->control('content') ?>
<?= $this->Form->control('author') ?>
<?= $this->Form->button('Ajouter') ?>
<?= $this->Form->end() ?>