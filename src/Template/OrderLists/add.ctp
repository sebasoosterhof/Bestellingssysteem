<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Orderlists'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Dishes'), ['controller' => 'Dishes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dish'), ['controller' => 'Dishes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderlists form large-9 medium-8 columns content">
    <?= $this->Form->create($orderlist) ?>
    <fieldset>
        <legend><?= __('Add Orderlist') ?></legend>
        <?php
            echo $this->Form->control('reservation_date');
            echo $this->Form->control('reseration_time');
            echo $this->Form->control('persons');
            echo $this->Form->control('lastname');
            echo $this->Form->control('email');
            echo $this->Form->control('telephonenumber');
            echo $this->Form->control('copmany_name');
            echo $this->Form->control('dish_id', ['options' => $dishes, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
