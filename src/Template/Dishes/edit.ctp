<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dish->id],
                ['confirm' => __('Weet u zeker dat u # {0} wilt verwijderen?', $dish->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Gerecht toevoegen'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Gerechten bewerken'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="dishes form large-9 medium-8 columns content">
    <?= $this->Form->create($dish) ?>
    <fieldset>
        <legend><?= __('Bewerk gerecht') ?></legend>
        <?php
            echo $this->Form->control('category');
            echo $this->Form->control('subcategory');
            echo $this->Form->control('title');
            echo $this->Form->control('description');
            echo $this->Form->control('price');
            echo $this->Form->control('discount_title');
            echo $this->Form->control('discount_amount');
            echo $this->Form->control('discount_duration', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Bewerken')) ?>
    <?= $this->Form->end() ?>
</div>
