<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Dishcategory $dishcategory
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dishcategory'), ['action' => 'edit', $dishcategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dishcategory'), ['action' => 'delete', $dishcategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dishcategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dishcategories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dishcategory'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dishcategories view large-9 medium-8 columns content">
    <h3><?= h($dishcategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= h($dishcategory->category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subcategory') ?></th>
            <td><?= h($dishcategory->subcategory) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dishcategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($dishcategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($dishcategory->modified) ?></td>
        </tr>
    </table>
</div>
