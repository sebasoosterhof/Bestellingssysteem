<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Dish[]|\Cake\Collection\CollectionInterface $dishes
  */
?>
<?php
    $category = "";
    $filteredDishes = $lunchDishes;
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Gerecht toevoegen'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Gerechten bewerken'), ['action' => 'index']) ?></li>
    </ul>

    <ul class="side-nav">
        <h5><b>Kaarten</b></h5>
        <?php
            if(isset($_GET['kaarten'])){
                $kaarten=$_GET['kaarten'];
                if ($kaarten == 'lunch'){
                    $filteredDishes = $lunchDishes;
                }
                if ($kaarten == 'diner'){
                    $filteredDishes = $dinerDishes;
                }
                if ($kaarten == 'dessert'){
                    $filteredDishes = $dessertDishes;
                }
            }  ?>
        <li><a href="?kaarten=lunch">Lunch</a></li>
        <li><a href="?kaarten=diner">Diner</a></li>
        <li><a href="?kaarten=dessert">Dessert</a></li>
    </ul>
</nav>

<div class="index large-9 medium-8 columns content">
        <?php

            foreach ($filteredDishes as $dish): ?>
                <!--<td><?= $dish->has('dish') ? $this->Html->link($orderlist->dish->title, ['controller' => 'Dishes', 'action' => 'view', $orderlist->dish->id]) : '' ?></td>-->
                <div class="dish large-12 medium-8 columns">
                    <div class="dish-delete">
                        <?= $this->Form->postLink(
                            $this->Html->tag('i', '',
                                array('class' => 'fa fa-trash delete-icon')),
                                array('action' => 'delete', $dish->id),
                                array('escape'=>false)); ?>
                    </div>

                    <div class="medium-6 columns">
                        <div class="columns">
                            <h4><?= h($dish->subcategory) ?></h4>
                            <h5 class="dish-title"><?= h($dish->title) ?></h5>
                            <span class="dish-price">€<?= h($dish->price) ?></span>
                        </div>
                        <div class="columns">
                            <p><?= h($dish->description) ?></p>
                        </div>
                    </div>

                    <div class="dish-edit">
                        <?= $this->Html->link("<i class='fa fa-pencil edit-icon'></i>", ['action' => 'edit', $dish->id], ['escape' => false]) ?>
                    </div>
                </div>
                        <!--<td><?= h($dish->discount_title) ?></td>-->
                        <!--<td><?= h($dish->discount_amount) ?></td>-->
                        <!--<td><?= h($dish->discount_duration) ?></td>-->
            <?php endforeach; ?>
</div>
