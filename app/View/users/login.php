<?php if($errors): ?>
    <div class="alert alert-danger">
        Identifiants Incorrects.
    </div>
<?php endif; ?>


<form method="post">
    <?= $form->input('username', 'Nom de compte'); ?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Se connecter</button>
</form>