<h3 class="login-title">Medewerkers login Het Theehuis</h3>
<div class="login-container">
    <div class="login-form">
        <?= $this->Form->create() ?>
        <?= $this->Form->input('username', array('label' => 'Gebruikersnaam')) ?>
        <?= $this->Form->input('password', array('label' => 'Wachtwoord')) ?>
        <?= $this->Form->button('Login') ?>
        <?= $this->Form->end() ?>
    </div>
</div>
