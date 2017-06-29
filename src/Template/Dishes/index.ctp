<!--<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Dish[]|\Cake\Collection\CollectionInterface $dishes
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Dish'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dishes index large-9 medium-8 columns content">
    <h3><?= __('Dishes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categories_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subcategories_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dishes as $dish): ?>
            <tr>
                <td><?= $this->Number->format($dish->id) ?></td>
                <td><?= $this->Number->format($dish->categories_id) ?></td>
                <td><?= $this->Number->format($dish->subcategories_id) ?></td>
                <td><?= h($dish->title) ?></td>
                <td><?= h($dish->description) ?></td>
                <td><?= $this->Number->format($dish->price) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dish->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dish->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dish->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dish->id)]) ?>
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
        <li class="link"><?= $this->Html->link(__('Reserveringen bekijken'), ['controller' => 'Orderlists', 'action' => 'orders']) ?></li>
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
                            <h4><?php
                                    foreach ($subcategories as $subkey => $subvalue) {
                                        if($subvalue['id'] === $dish['subcategories_id'] + 1) {
                                            echo $subvalue['subcategory'];
                                        }
                                }
                                 $dish->subcategory ?></h4>
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
