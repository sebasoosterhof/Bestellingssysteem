<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Nieuwe medewerker toevoegen'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Medewerkers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('username', array('label' => 'Gebruikersnaam')); ?></th>
                <th scope="col"><?= $this->Paginator->sort('password', array('label' => 'Wachtwoord')); ?></th>
                <th scope="col" class="actions"><?= __('Acties') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->password) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Bekijken'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Bewerken'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Verwijderen'), ['action' => 'delete', $user->id], ['confirm' => __('Weet u zeker dat u {0} wilt verwijderen?', $user->username)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} van {{pages}}, toont {{current}} medewerker(s) van {{count}} totaal')]) ?></p>
    </div>
</div>
