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

        <ul class="side-nav">
        <h5><b>Reservering</b></h5>
            <!--TO DO: Fetch reservation data from plugin on website: http://www.hettheehuis.nl -->
            <?php
                foreach($orderlists as $key => $value) { ?>
                    <li>Datum: <?php echo $value['reservation_date'] ?></li>
                    <li>Tijd:  <?php echo $time = date("H:i",strtotime($value['reservation_time']));  ?></li>
                    <li>Aantal personen:  <?php echo $value['persons'] ?></li>
            <?php } ?>


        </ul>
</nav>

<div class="index large-9 medium-8 columns content">
    <div class="order">

        <h5><?=
                $this->Form->postLink('<i class="fa fa-minus delete-icon"></i> ',
                        ['action' => 'deleteOrders'],
                        [
                            'escape' => false,
                            'confirm' => __('Weet u zeker dat u de bestellingen leeg wilt halen?')
                        ]
                    );
            ?><b>Uw bestellingen</b></h5>
        <?php
            if ($this->request->session()->check('sessionOrders')) {


            foreach ($this->request->session()->read('sessionOrders') as $key => $value) { ?>
                <p>
                    <?=
                        $this->Form->postLink('<i class="fa fa-trash delete-icon"></i> ',
                                ['action' => 'removeDishFromOrder', $value->id],
                                [
                                    'escape' => false,
                                    'confirm' => __('Weet u zeker dat u {0} uit de bestelling wilt halen?', $value->title)
                                ]
                            );

                        echo $value['subcategory'] ?> - <?php echo $value['title']?> <?php echo number_format($value['price'],2) ?></p>
            <?php
                }
            } ?>

        <div class="divider"></div>

        <?php
            $totalPrice = array();
            foreach ($this->request->session()->read('sessionOrders') as $key => $value) {
                array_push($totalPrice, $value['price']);
            }
        ?>


        <p>Subtotaal €<?php echo number_format(array_sum($totalPrice),2) ?> excl. dranken</p>

        <?= $this->Form->button('Reserveren',
            array('action' => 'deleteOrders'),
            array('hiddenField' => false)
        ); ?>
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
                    </div>

                    <div class="medium-8 columns">
                        <div class="columns">
                            <h4><?= h($dish->subcategory) ?></h4>
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
