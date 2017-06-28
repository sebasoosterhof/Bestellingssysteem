<!--<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Orderlist[]|\Cake\Collection\CollectionInterface $orderlists
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Orderlist'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
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
                <th scope="col"><?= $this->Paginator->sort('reservations_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dishes_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderlists as $orderlist): ?>
            <tr>
                <td><?= $this->Number->format($orderlist->id) ?></td>
                <td><?= $orderlist->has('reservation') ? $this->Html->link($orderlist->reservation->id, ['controller' => 'Reservations', 'action' => 'view', $orderlist->reservation->id]) : '' ?></td>
                <td><?= $orderlist->has('dish') ? $this->Html->link($orderlist->dish->title, ['controller' => 'Dishes', 'action' => 'view', $orderlist->dish->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orderlist->reservations_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderlist->reservations_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderlist->reservations_id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderlist->reservations_id)]) ?>
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
            <!--<?php
                foreach($reservations as $key => $value) { ?>
                    <li>Datum: <?php echo $value['reservation_date'] ?></li>
                    <li>Tijd:  <?php echo $time = date("H:i",strtotime($value['reservation_time']));  ?></li>
                    <li>Aantal personen:  <?php echo $value['persons'] ?></li>
            <?php } ?>-->


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
                        foreach ($subcategories as $subkey => $subvalue) {
                            if($subvalue->id === $value->subcategories_id + 1) {
                                echo $subvalue->subcategory;
                            }
                        } ?> - <?php echo $value['title']?> <?php echo number_format($value['price'],2) ?></p>
            <?php
                }
            } ?>

        <div class="divider"></div>

        <?php
            $totalPrice = array();
            if ($this->request->session()->check('sessionOrders')) {
                foreach ($this->request->session()->read('sessionOrders') as $key => $value) {
                    array_push($totalPrice, $value['price']);
                }
            }
        ?>

        <p>Subtotaal €<?php echo number_format(array_sum($totalPrice),2) ?> (excl. dranken)</p>

        <?php
            echo $this->Html->link(
                'Reserveren',
                'http://www.hettheehuis.nl',
                ['class' => 'button']
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

