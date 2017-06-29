<?php
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
            <li><a href="?kaart=lunch" class="link">Lunch</a></li>
            <li><a href="?kaart=diner" class="link">Diner</a></li>
            <li><a href="?kaart=dessert" class="link">Dessert</a></li>
        </ul>
</nav>

<div class="index large-9 medium-8 columns content">


        <?php
            foreach ($filteredDishes as $dish): ?>
                <div class="dish medium-8 columns">
                    <div class="medium-8 columns">
                        <div class="columns">
                            <h4><?php
                                foreach ($subcategories as $key => $value) {
                                    if($value->id === $dish->subcategories_id + 1) {
                                        echo $value->subcategory;
                                    }
                                }?></h4>
                            <h5 class="dish-title"><?= h($dish->title) ?></h5>
                            <span class="dish-price">€<?php echo number_format(h($dish->price),2) ?></span>
                        </div>
                        <div class="columns">
                            <p><?= h($dish->description) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
</div>

