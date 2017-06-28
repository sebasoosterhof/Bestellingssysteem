<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="reservations form large-9 medium-8 columns content">
    <?= $this->Form->create($reservation) ?>
    <fieldset>
        <legend><?= __('Add Reservation') ?></legend>
        <?php
            echo $this->Form->control('reservation_date', array('label' => 'Reserveringsdatum'));
            echo $this->Form->control('reservation_time', array('label' => 'Reserveringstijd'));
            echo $this->Form->control('persons', array('label' => 'Aantal personen'));
            echo $this->Form->control('lastname', array('label' => 'Achternaam'));
            echo $this->Form->control('email', array('label' => 'E-mail'));
            echo $this->Form->control('telephonenumber', array('label' => 'Telefoonnummer'));
            echo $this->Form->control('company_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
