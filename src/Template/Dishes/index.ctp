<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Dish[]|\Cake\Collection\CollectionInterface $dishes
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('Gerecht toevoegen'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Gerechten bewerken'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="dishes index large-9 medium-8 columns content">
    <h3><?= __('Dishes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subcategory') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount_duration') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>-->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dishes as $dish): ?>
            <tr>
                <td><?= $this->Number->format($dish->id) ?></td>
                <td><?= h($dish->category) ?></td>
                <td><?= h($dish->subcategory) ?></td>
                <td><?= h($dish->title) ?></td>
                <td><?= h($dish->price) ?></td>
                <td><?= h($dish->discount_title) ?></td>
                <td><?= h($dish->discount_amount) ?></td>
                <td><?= h($dish->discount_duration) ?></td>
                <!--<td><?= h($dish->created) ?></td>
                <td><?= h($dish->modified) ?></td>-->
                <td class="actions">
                    <?= $this->Html->link(__('Bekijken'), ['action' => 'view', $dish->id]) ?>
                    <?= $this->Html->link(__('Bewerken'), ['action' => 'edit', $dish->id]) ?>
                    <?= $this->Form->postLink(__('Verwijderen'), ['action' => 'delete', $dish->id], ['confirm' => __('Weet u zeker dat u # {0} wilt verwijderen?', $dish->id)]) ?>
                </td>
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
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} van {{pages}}, toont {{current}} gerecht(en) van {{count}} totaal')]) ?></p>
    </div>
</div>
