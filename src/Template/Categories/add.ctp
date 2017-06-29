<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Kaarten overzicht'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="categories form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Kaart toevoegen') ?></legend>
        <?php
            echo $this->Form->control('category', array('label' => 'Kaart'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Toevoegen')) ?>
    <?= $this->Form->end() ?>
</div>
