<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Subcategory $subcategory
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Categorie bewerken'), ['action' => 'edit', $subcategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Categorie verwijderen'), ['action' => 'delete', $subcategory->id], ['confirm' => __('Weet u zeker dat u de {0} categorie wilt verwijderen?', $subcategory->subcategory)]) ?> </li>
        <li><?= $this->Html->link(__('Categorieën overzicht'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Voeg categorie toe'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subcategories view large-9 medium-8 columns content">
    <h3><?= h($subcategory->subcategory) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Categorie') ?></th>
            <td><?= h($subcategory->subcategory) ?></td>
        </tr>
    </table>
</div>
