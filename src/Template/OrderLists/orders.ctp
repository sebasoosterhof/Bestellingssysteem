<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Orderlist[]|\Cake\Collection\CollectionInterface $orderlists
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Gerechten overzicht'), ['controller' => 'Dishes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Gerecht toevoegen'), ['controller' => 'Dishes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderlists index large-9 medium-8 columns content">
    <h3><?= __('Orders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('reservations_date', array('label' => 'Reserveringsdatum')); ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastname', array('label' => 'Naam reserveerder')); ?></th>
                <th scope="col"><?= $this->Paginator->sort('dishes_id', array('label' => 'Gerecht')); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderlists as $orderlist): ?>
            <tr>
                <td><?= $orderlist->has('reservation') ? $this->Html->link($orderlist->reservation->reservation_date, ['controller' => 'Reservations', 'action' => 'view', $orderlist->reservation->id]) : '' ?></td>
                <td><?= $orderlist->has('reservation') ? $this->Html->link($orderlist->reservation->lastname, ['controller' => 'Reservations', 'action' => 'view', $orderlist->reservation->id]) : '' ?></td>
                <td><?= $orderlist->has('dish') ? $this->Html->link($orderlist->dish->title, ['controller' => 'Dishes', 'action' => 'view', $orderlist->dish->id]) : '' ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Eerste')) ?>
            <?= $this->Paginator->prev('< ' . __('Vorige')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Volgende') . ' >') ?>
            <?= $this->Paginator->last(__('Laatste') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} van {{pages}}, toont {{current}} orders van {{count}} totaal')]) ?></p>
    </div>
</div>
