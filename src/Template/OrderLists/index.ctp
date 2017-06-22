<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Orderlist[]|\Cake\Collection\CollectionInterface $orderlists
  */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Orderlist'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Dishes'), ['controller' => 'Dishes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Dish'), ['controller' => 'Dishes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderlists index large-9 medium-8 columns content">
    <h3><?= __('Orderlists') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reservation_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reseration_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('persons') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telephonenumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('copmany_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dish_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderlists as $orderlist): ?>
            <tr>
                <td><?= $this->Number->format($orderlist->id) ?></td>
                <td><?= h($orderlist->reservation_date) ?></td>
                <td><?= h($orderlist->reseration_time) ?></td>
                <td><?= $this->Number->format($orderlist->persons) ?></td>
                <td><?= h($orderlist->lastname) ?></td>
                <td><?= h($orderlist->email) ?></td>
                <td><?= h($orderlist->telephonenumber) ?></td>
                <td><?= h($orderlist->copmany_name) ?></td>
                <td><?= $orderlist->has('dish') ? $this->Html->link($orderlist->dish->title, ['controller' => 'Dishes', 'action' => 'view', $orderlist->dish->id]) : '' ?></td>
                <td><?= h($orderlist->created) ?></td>
                <td><?= h($orderlist->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orderlist->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderlist->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderlist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderlist->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>-->












<?php
    $category = "";
    $filteredDishes = $lunchDishes;
    $orderslist = $orders;
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
      <ul class="side-nav">
        <h5><b>Kaarten</b></h5>
        <?php
            if(isset($_GET['kaart'])){
                $kaart=$_GET['kaart'];
                if ($kaart == 'lunch'){
                    $filteredDishes = $lunchDishes;
                }
                if ($kaart == 'diner'){
                    $filteredDishes = $dinerDishes;
                }
                if ($kaart == 'dessert'){
                    $filteredDishes = $dessertDishes;
                }
            }  ?>
            <li><a href="?kaart=lunch">Lunch</a></li>
            <li><a href="?kaart=diner">Diner</a></li>
            <li><a href="?kaart=dessert">Dessert</a></li>
        </ul>

        <ul class="side-nav">
        <h5><b>Reservering</b></h5>
            <!--TO DO: Fetch reservation data from plugin on website: http://www.hettheehuis.nl -->
            <li>Datum: 17-06-2017</li>
            <li>Tijd: 19:45</li>
            <li>Aantal personen: 2 </li>
        </ul>
</nav>

<div class="index large-9 medium-8 columns content">
    <div class="order">
        <h5><b>Uw bestelling</b></h5>
        <?php
            foreach ($orderslist as $order): ?>
                <p><?= $order ?></p>
                <!--<span class="dish-title"><?= h($dish->title) ?></span>-->
                <!--<span class="dish-price">€<?= h($dish->price) ?></span>-->
            <?php endforeach; ?>

        <div class="divider"></div>
        <p>Subtotaal €2,30</p>
        <?= $this->Form->button('Reserveren', array('hiddenField' => false)); ?>
    </div>

        <?php
            foreach ($filteredDishes as $dish): ?>
                <div class="dish medium-8 columns">
                    <div class="dish-add-orderlist">

                        <?= $this->Form->postLink(
                            $this->Html->tag('i', '',
                                array('class' => 'fa fa-plus delete-icon')),
                                array('action' => 'addDishToOrder', $dish->title),
                                array('escape'=>false)); ?>

                        <!--<form action="">
                            <input type="number" id="dishcount" min="0" max="9"/>
                            <input type="submit">Gerecht(en) toevoegen</input>
                        </form>-->
                        <!--<?= $this->Form->checkbox('checkbox', [array_push($orders, $dish)], ['escape'=>false]); ?>-->

                        <!--<?= $this->Form->checkbox('checkbox', array('hiddenField' => false)); ?>-->
                    </div>

                    <div class="medium-8 columns">
                        <div class="columns">
                            <h4><?= h($dish->subcategory) ?></h4>
                            <h5 class="dish-title"><?= h($dish->title) ?></h5>
                            <span class="dish-price">€<?= h($dish->price) ?></span>
                        </div>
                        <div class="columns">
                            <p><?= h($dish->description) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
</div>
