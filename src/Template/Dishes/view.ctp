<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Dish $dish
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dish'), ['action' => 'edit', $dish->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Verwijder gerecht'), ['action' => 'delete', $dish->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dish->id)]) ?> </li>
        <li><?= $this->Html->link(__('Gerecht toevoegen'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Gerechten bewerken'), ['action' => 'index']) ?></li>
        <!--<li><?= $this->Html->link(__('List Orderlists'), ['controller' => 'Orderlists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orderlist'), ['controller' => 'Orderlists', 'action' => 'add']) ?> </li>-->
    </ul>
</nav>
<div class="dishes view large-9 medium-8 columns content">
    <h3><?= h($dish->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= h($dish->category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subcategory') ?></th>
            <td><?= h($dish->subcategory) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($dish->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= h($dish->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount Title') ?></th>
            <td><?= h($dish->discount_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount Amount') ?></th>
            <td><?= h($dish->discount_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dish->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount Duration') ?></th>
            <td><?= h($dish->discount_duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($dish->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($dish->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($dish->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Orderlists') ?></h4>
        <?php if (!empty($dish->orderlists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Reservation Date') ?></th>
                <th scope="col"><?= __('Reseration Time') ?></th>
                <th scope="col"><?= __('Persons') ?></th>
                <th scope="col"><?= __('Lastname') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Telephonenumber') ?></th>
                <th scope="col"><?= __('Copmany Name') ?></th>
                <th scope="col"><?= __('Dish Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($dish->orderlists as $orderlists): ?>
            <tr>
                <td><?= h($orderlists->id) ?></td>
                <td><?= h($orderlists->reservation_date) ?></td>
                <td><?= h($orderlists->reseration_time) ?></td>
                <td><?= h($orderlists->persons) ?></td>
                <td><?= h($orderlists->lastname) ?></td>
                <td><?= h($orderlists->email) ?></td>
                <td><?= h($orderlists->telephonenumber) ?></td>
                <td><?= h($orderlists->copmany_name) ?></td>
                <td><?= h($orderlists->dish_id) ?></td>
                <td><?= h($orderlists->created) ?></td>
                <td><?= h($orderlists->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Orderlists', 'action' => 'view', $orderlists->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Orderlists', 'action' => 'edit', $orderlists->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orderlists', 'action' => 'delete', $orderlists->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderlists->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
