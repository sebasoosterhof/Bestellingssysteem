<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Medewerker verwijderen'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Weet u zeker dat u {0} wilt verwijderen?', $user->username)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Medewerkers overzicht'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Bewerk medewerker') ?></legend>
        <?php
            echo $this->Form->control('username', array('label' => 'Gebruikersnaam'));
            echo $this->Form->control('password', array('label' => 'Wachtwoord'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Bewerken')) ?>
    <?= $this->Form->end() ?>
</div>
