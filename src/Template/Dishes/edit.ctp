<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Gerecht toevoegen'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Gerechten bewerken'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="form large-9 medium-8 columns content">
    <?= $this->Form->create($dish) ?>
    <fieldset>
        <legend><?= __('Bewerk gerecht') ?></legend>
        <?php
            //*********************************************************************************************************************************
            //
            // Temporary solution for enum's in CakePHP - https://stackoverflow.com/questions/38200034/cakephp-query-for-enum-field-in-database
            //
            //*********************************************************************************************************************************
            $category = [ 'Kies een kaart...', 'Lunch', 'Diner', 'Dessert'];
            $subcategory = ['Kies een categorie...', 'Broodjes','Clubs','Wraps','Salades','Soep','Warm',
                'Kids','Stevige hap','Voorgerecht - Koud','Voorgerecht - Soep','Voorgerecht - Warm',
                'Voorgerecht - Salades','Hoofdgerecht - Vis','Hoofdgerecht - Vegetarisch','Hoofdgerecht - Vlees', 'IJs'];
            //*********************************************************************************************************************************
            //
            //*********************************************************************************************************************************

            echo $this->Form->select('category', $category, array('label' => 'Kaart'));
            echo $this->Form->select('subcategory', $subcategory, array('label' => 'Categorie'));
            echo $this->Form->control('title', array('label' => 'Titel'));
            echo $this->Form->control('description', array('label' => 'Beschrijving'));
            echo $this->Form->control('price', array('label' => 'Prijs'));
            //*********************************************************************************************************************************
            //
            // Discounts won't be implemented in the current version.
            //
            //*********************************************************************************************************************************
            // echo $this->Form->control('discount_title');
            // echo $this->Form->control('discount_amount');
            // echo $this->Form->control('discount_duration', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Bewerken')) ?>
    <?= $this->Form->end() ?>
</div>
