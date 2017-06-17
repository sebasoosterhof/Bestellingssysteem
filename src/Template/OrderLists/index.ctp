<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Orderlist[]|\Cake\Collection\CollectionInterface $orderlists
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Orderlist'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dishes'), ['controller' => 'Dishes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dish'), ['controller' => 'Dishes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderlists index large-9 medium-8 columns content">
    <h3><?= __('Orderlists') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reservation_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reseration_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('persons') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telephonenumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('copmany_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dish_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderlists as $orderlist): ?>
            <tr>
                <td><?= $this->Number->format($orderlist->id) ?></td>
                <td><?= h($orderlist->reservation_date) ?></td>
                <td><?= h($orderlist->reseration_time) ?></td>
                <td><?= $this->Number->format($orderlist->persons) ?></td>
                <td><?= h($orderlist->lastname) ?></td>
                <td><?= h($orderlist->email) ?></td>
                <td><?= h($orderlist->telephonenumber) ?></td>
                <td><?= h($orderlist->copmany_name) ?></td>
                <td><?= $orderlist->has('dish') ? $this->Html->link($orderlist->dish->title, ['controller' => 'Dishes', 'action' => 'view', $orderlist->dish->id]) : '' ?></td>
                <td><?= h($orderlist->created) ?></td>
                <td><?= h($orderlist->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orderlist->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderlist->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderlist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderlist->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
