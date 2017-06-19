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
                ['confirm' => __('Are you sure you want to delete # {0}?', $dish->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Dishes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orderlists'), ['controller' => 'Orderlists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orderlist'), ['controller' => 'Orderlists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dishes form large-9 medium-8 columns content">
    <?= $this->Form->create($dish) ?>
    <fieldset>
        <legend><?= __('Edit Dish') ?></legend>
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
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
