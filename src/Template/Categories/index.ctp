<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Voeg categorie toe'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categories index large-9 medium-8 columns content">
    <h3><?= __('Kaarten') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Kaart') ?></th>
                <th scope="col" class="actions"><?= __('Acties') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= h($category->category) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Tonen'), ['action' => 'view', $category->id]) ?>
                    <?= $this->Html->link(__('Bewerken'), ['action' => 'edit', $category->id]) ?>
                    <?= $this->Form->postLink(__('Verwijderen'), ['action' => 'delete', $category->id], ['confirm' => __('Weet u zeker dat u de {0} kaart wilt verwijderen?', $category->category)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} van {{pages}}, toont {{current}} kaart(en) van {{count}} totaal')]) ?></p>
    </div>
</div>
