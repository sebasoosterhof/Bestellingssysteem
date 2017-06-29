<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Category $category
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Kaart bewerken'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Kaart verwijderen'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('Kaarten overzicht'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nieuwe kaart toevoegen'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->category) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Kaart') ?></th>
            <td><?= h($category->category) ?></td>
        </tr>
    </table>
</div>
