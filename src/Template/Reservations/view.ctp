<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Reservation $reservation
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reservation'), ['action' => 'edit', $reservation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reservation'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reservations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reservations view large-9 medium-8 columns content">
    <h3><?= h($reservation->lastname) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Reserveringsdatum') ?></th>
            <td><?= h($reservation->reservation_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reserveringstijd') ?></th>
            <td><?php echo $time = date("H:i",strtotime($reservation->reservation_time)) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Achternaam') ?></th>
            <td><?= h($reservation->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($reservation->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefoonnummer') ?></th>
            <td><?= h($reservation->telephonenumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bedrijfsnaam') ?></th>
            <td><?= h($reservation->company_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aantal personen') ?></th>
            <td><?= $this->Number->format($reservation->persons) ?></td>
        </tr>
    </table>
</div>
