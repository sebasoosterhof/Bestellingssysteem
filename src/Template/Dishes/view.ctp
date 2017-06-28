<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Dish $dish
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dish'), ['action' => 'edit', $dish->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dish'), ['action' => 'delete', $dish->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dish->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dishes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dish'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dishes view large-9 medium-8 columns content">
    <h3><?= h($dish->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($dish->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dish->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categories Id') ?></th>
            <td><?= $this->Number->format($dish->categories_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subcategories Id') ?></th>
            <td><?= $this->Number->format($dish->subcategories_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($dish->price) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($dish->description)); ?>
    </div>
</div>
