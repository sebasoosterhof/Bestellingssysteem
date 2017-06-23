<?php
//session_start();
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Orderlist[]|\Cake\Collection\CollectionInterface $orderlists
  */
?>

<?php
    $filteredDishes = $lunchDishes;
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
            foreach ($this->request->session()->read('sessionOrders') as $key => $value) { ?>
                <p><?php echo $value['subcategory'] ?> - <?php echo $value['title']?> <?php echo $value['price']?></p>
            <?php } ?>

        <div class="divider"></div>
        <!--TO DO: price calculation-->
        <p>Subtotaal €2,30</p>
        <?= $this->Form->button('Reserveren', array('hiddenField' => false)); ?>
    </div>

        <?php
            foreach ($filteredDishes as $dish): ?>
                <div class="dish medium-8 columns">
                    <div class="dish-add-orderlist">

                        <?= $this->Form->postLink(
                            $this->Html->tag('i', '',
                                array('class' => 'fa fa-plus')),
                                array('action' => 'addDishToOrder', $dish->id),
                                array('escape'=>false)); ?>

                        <!--<form action="">
                            <input type="number" id="dishcount" min="0" max="9"/>
                            <input type="submit">Gerecht(en) toevoegen</input>
                        </form>-->
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
