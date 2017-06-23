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
        <li class="link"><?= $this->Html->link(__('Gerecht toevoegen'), ['action' => 'add']) ?></li>
        <li class="link"><?= $this->Html->link(__('Gerechten bewerken'), ['action' => 'index']) ?></li>
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
        <li><a href="?kaarten=lunch" class="link">Lunch</a></li>
        <li><a href="?kaarten=diner" class="link">Diner</a></li>
        <li><a href="?kaarten=dessert" class="link">Dessert</a></li>
    </ul>
</nav>

<div class="index large-9 medium-8 columns content">
        <?php

            foreach ($filteredDishes as $dish): ?>
                <div class="dish large-12 medium-8 columns">
                    <div class="dish-delete">
                        <?=
                            $this->Form->postLink('<i class="fa fa-trash delete-icon"></i> ',
                                    ['action' => 'delete', $dish->id],
                                    [
                                        'escape' => false,
                                        'confirm' => __('Weet u zeker dat u {0} wilt verwijderen?', $dish->title)
                                    ]
                                )
                        ?>
                    </div>

                    <div class="medium-6 columns">
                        <div class="columns">
                            <h4><?= h($dish->subcategory) ?></h4>
                            <h5 class="dish-title"><?= h($dish->title) ?></h5>
                            <span class="dish-price">€<?php echo number_format(h($dish->price),2) ?></span>
                        </div>
                        <div class="columns">
                            <p><?= h($dish->description) ?></p>
                        </div>
                    </div>

                    <div class="dish-edit">
                        <?= $this->Html->link("<i class='fa fa-pencil edit-icon'></i>", ['action' => 'edit', $dish->id], ['escape' => false]) ?>
                    </div>
                </div>
            <?php endforeach; ?>
</div>
