<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Orderlist $orderlist
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Orderlist'), ['action' => 'edit', $orderlist->reservations_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Orderlist'), ['action' => 'delete', $orderlist->reservations_id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderlist->reservations_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orderlists'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orderlist'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Dishes'), ['controller' => 'Dishes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dish'), ['controller' => 'Dishes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orderlists view large-9 medium-8 columns content">
    <h3><?= h($orderlist->reservations_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Reservation') ?></th>
            <td><?= $orderlist->has('reservation') ? $this->Html->link($orderlist->reservation->id, ['controller' => 'Reservations', 'action' => 'view', $orderlist->reservation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dish') ?></th>
            <td><?= $orderlist->has('dish') ? $this->Html->link($orderlist->dish->title, ['controller' => 'Dishes', 'action' => 'view', $orderlist->dish->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($orderlist->id) ?></td>
        </tr>
    </table>
</div>
