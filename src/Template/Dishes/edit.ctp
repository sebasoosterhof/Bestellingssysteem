<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Gerecht verwijderen'),
                ['action' => 'delete', $dish->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dish->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Gerechten bewerken'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="dishes form large-9 medium-8 columns content">
    <?= $this->Form->create($dish) ?>
    <fieldset>
        <legend><?= __('Gerecht bewerken') ?></legend>
        <?php
            echo $this->Form->control('categories_id', array('label' => 'Kaart'), ['options' => $categories, 'empty' => true]);
            echo $this->Form->control('subcategories_id', array('label' => 'Categorie'), ['options' => $subcategories, 'empty' => true]);
            echo $this->Form->control('title', array('label' => 'Titel'));
            echo $this->Form->control('description', array('label' => 'Beschrijving'));
            echo $this->Form->control('price', array('label' => 'Prijs'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Bewerken')) ?>
    <?= $this->Form->end() ?>
</div>
