<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Subcategory[]|\Cake\Collection\CollectionInterface $subcategories
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Nieuwe categorie toevoegen'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subcategories index large-9 medium-8 columns content">
    <h3><?= __('Categorieën') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Categorie') ?></th>
                <th scope="col" class="actions"><?= __('Acties') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subcategories as $subcategory): ?>
            <tr>
                <td><?= h($subcategory->subcategory) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Tonen'), ['action' => 'view', $subcategory->id]) ?>
                    <?= $this->Html->link(__('Bewerken'), ['action' => 'edit', $subcategory->id]) ?>
                    <?= $this->Form->postLink(__('Verwijderen'), ['action' => 'delete', $subcategory->id], ['confirm' => __('Weet u zeker dat u de {0} categorie wilt verwijderen??', $subcategory->subcategory)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} van {{pages}}, toont {{current}} categorie(ën) van {{count}} totaal')]) ?></p>
    </div>
</div>
