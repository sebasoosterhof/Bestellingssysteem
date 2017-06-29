<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Reservation[]|\Cake\Collection\CollectionInterface $reservations
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Nieuwe reservering toevoegen'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reservations index large-9 medium-8 columns content">
    <h3><?= __('Reserveringen') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('reservation_date', array('label' => 'Reserveringsdatum')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('reservation_time', array('label' => 'Reserveringstijd')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('persons', array('label' => 'Aantal personen')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastname', array('label' => 'Naam reserveerder')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('email', array('label' => 'Email')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('telephonenumber', array('label' => 'Telefoon')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_name', array('label' => 'Bedrijfsnaam')) ?></th>
                <th scope="col" class="actions"><?= __('Acties') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation): ?>
            <tr>
                <td><?= h($reservation->reservation_date) ?></td>
                <td><?= $time = date("H:i",strtotime($reservation->reservation_time)) ?></td>
                <td><?= $this->Number->format($reservation->persons) ?></td>
                <td><?= h($reservation->lastname) ?></td>
                <td><?= h($reservation->email) ?></td>
                <td><?= h($reservation->telephonenumber) ?></td>
                <td><?= h($reservation->company_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Tonen'), ['action' => 'view', $reservation->id]) ?>
                    <?= $this->Html->link(__('Bewerken'), ['action' => 'edit', $reservation->id]) ?>
                    <?= $this->Form->postLink(__('Verwijderen'), ['action' => 'delete', $reservation->id], ['confirm' => __('Weet u zeker dat u de reservering {0} wilt verwijderen?', $reservation->lastname)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Eerste')) ?>
            <?= $this->Paginator->prev('< ' . __('Vorige')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Volgende') . ' >') ?>
            <?= $this->Paginator->last(__('Laatste') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} van {{pages}}, toont {{current}} reservering(en) van {{count}} totaal')]) ?></p>
    </div>
</div>
