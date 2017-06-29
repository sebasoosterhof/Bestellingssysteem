<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Reservation $reservation
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Reservering bewerken'), ['action' => 'edit', $reservation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Reservering verwijderen'), ['action' => 'delete', $reservation->id], ['confirm' => __('Weet u zeker dat u reservering {0} wilt verwijderen?', $reservation->lastname)]) ?> </li>
        <li><?= $this->Html->link(__('Reserveringen overzicht'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nieuwe reservering toevoegen'), ['action' => 'add']) ?> </li>
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
