<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Reserveringen overzicht'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="reservations form large-9 medium-8 columns content">
    <?= $this->Form->create($reservation) ?>
    <fieldset>
        <legend><?= __('Voeg reservering toe') ?></legend>
        <?php
            echo $this->Form->control('reservation_date', array('label' => 'Reserveringsdatum'));
            echo $this->Form->control('reservation_time', array('label' => 'Reserveringstijd'));
            echo $this->Form->control('persons', array('label' => 'Aantal personen'));
            echo $this->Form->control('lastname', array('label' => 'Achternaam'));
            echo $this->Form->control('email', array('label' => 'E-mail'));
            echo $this->Form->control('telephonenumber', array('label' => 'Telefoonnummer'));
            echo $this->Form->control('company_name', array('label' => 'Bedrijfsnaam'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Toevoegen')) ?>
    <?= $this->Form->end() ?>
</div>
