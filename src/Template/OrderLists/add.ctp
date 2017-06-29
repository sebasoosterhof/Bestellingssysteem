<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Orderlists'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dishes'), ['controller' => 'Dishes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dish'), ['controller' => 'Dishes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderlists form large-9 medium-8 columns content">
    <?= $this->Form->create($orderlist) ?>
    <fieldset>
        <legend><?= __('Voeg order toe') ?></legend>
        <?php
            echo $this->Form->control('reservations_id', array('label' => 'Reservering'), ['options' => $reservations, 'empty' => false,  'required' => true]);
            echo $this->Form->control('dishes_id', array('label' => 'Gerect'), ['empty' => false,  'required' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Toevoegen')) ?>
    <?= $this->Form->end() ?>
</div>
