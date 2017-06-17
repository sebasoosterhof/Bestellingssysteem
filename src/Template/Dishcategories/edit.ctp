<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dishcategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dishcategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Dishcategories'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="dishcategories form large-9 medium-8 columns content">
    <?= $this->Form->create($dishcategory) ?>
    <fieldset>
        <legend><?= __('Edit Dishcategory') ?></legend>
        <?php
            echo $this->Form->control('category');
            echo $this->Form->control('subcategory');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
