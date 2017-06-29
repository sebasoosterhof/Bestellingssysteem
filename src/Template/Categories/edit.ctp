<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Kaart verwijderen'),
                ['action' => 'delete', $category->id],
                ['confirm' => __('Weet u zeker dat u de {0} kaart wilt verwijderen?', $category->category)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Kaarten overzicht'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="categories form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Kaart bewerken') ?></legend>
        <?php
            echo $this->Form->control('category', array('label' => 'Kaart'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Bewerken')) ?>
    <?= $this->Form->end() ?>
</div>
