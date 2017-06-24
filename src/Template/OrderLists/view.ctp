<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Orderlist $orderlist
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Orderlist'), ['action' => 'edit', $orderlist->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Orderlist'), ['action' => 'delete', $orderlist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderlist->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orderlists'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orderlist'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Dishes'), ['controller' => 'Dishes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dish'), ['controller' => 'Dishes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orderlists view large-9 medium-8 columns content">
    <h3><?= h($orderlist->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($orderlist->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($orderlist->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telephonenumber') ?></th>
            <td><?= h($orderlist->telephonenumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Copmany Name') ?></th>
            <td><?= h($orderlist->copmany_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dish') ?></th>
            <td><?= $orderlist->has('dish') ? $this->Html->link($orderlist->dish->title, ['controller' => 'Dishes', 'action' => 'view', $orderlist->dish->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($orderlist->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Persons') ?></th>
            <td><?= $this->Number->format($orderlist->persons) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reservation Date') ?></th>
            <td><?= h($orderlist->reservation_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reseration Time') ?></th>
            <td><?= h($orderlist->reservation_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($orderlist->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($orderlist->modified) ?></td>
        </tr>
    </table>
</div>
