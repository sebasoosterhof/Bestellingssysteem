<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <!--<li class="heading"><?= __('Actions') ?></li>-->
        <li><?= $this->Html->link(__('Gerecht toevoegen'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Gerechten bewerken'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="dishes form large-9 medium-8 columns content">
    <?= $this->Form->create($dish) ?>
    <fieldset>
        <legend><?= __('Gerecht toevoegen') ?></legend>
        <?php

        //*********************************************************************************************************************************
        //
        // Tijdelijke oplossing voor enum's in PHP - https://stackoverflow.com/questions/38200034/cakephp-query-for-enum-field-in-database
        //
        //*********************************************************************************************************************************
        $category = [ 'Kies een categorie...', 'Lunch', 'Diner', 'Dessert'];
        $subcategory = ['Kies een subcategorie...', 'Broodjes','Clubs','Wraps','Salades','Soep','Warm',
            'Kids','Stevige hap','Voorgerecht - Koud','Voorgerecht - Soep','Voorgerecht - Warm',
            'Voorgerecht - Salades','Hoofdgerecht - Vis','Hoofdgerecht - Vegetarisch','Hoofdgerecht - Vlees'];
        //*********************************************************************************************************************************
        //
        //*********************************************************************************************************************************

            echo $this->Form->select('category', $category);
            echo $this->Form->select('subcategory', $subcategory);
            echo $this->Form->control('title');
            echo $this->Form->control('description');
            echo $this->Form->control('price');
            echo $this->Form->control('discount_title');
            echo $this->Form->control('discount_amount');
            echo $this->Form->control('discount_duration', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Toevoegen')) ?>
    <?= $this->Form->end() ?>
</div>
