<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Categorie verwijderen'),
                ['action' => 'delete', $subcategory->id],
                ['confirm' => __('Weet u zeker dat u de {0} categorie wilt verwijderen?', $subcategory->subcategory)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Categorieën overzicht'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="subcategories form large-9 medium-8 columns content">
    <?= $this->Form->create($subcategory) ?>
    <fieldset>
        <legend><?= __('Categorie bewerken') ?></legend>
        <?php
            echo $this->Form->control('subcategory', array('label' => 'Categorie'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Bewerken')) ?>
    <?= $this->Form->end() ?>
</div>
