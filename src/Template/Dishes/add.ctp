<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="link"><?= $this->Html->link(__('Gerecht toevoegen'), ['action' => 'add']) ?></li>
        <li class="link"><?= $this->Html->link(__('Gerechten bewerken'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="form large-9 medium-8 columns content">
    <?= $this->Form->create($dish) ?>
        <fieldset>
            <legend><?= __('Gerecht toevoegen') ?></legend>
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
            // echo $this->Form->control('discount_title', array('label' => 'Wachtwoord'));
            // echo $this->Form->control('discount_amount', array('label' => 'Wachtwoord'));
            // echo $this->Form->control('discount_duration', ['empty' => true], array('label' => 'Wachtwoord'));
            ?>
        </fieldset>
    <?= $this->Form->button(__('Toevoegen')) ?>
    <?= $this->Form->end() ?>
</div>
