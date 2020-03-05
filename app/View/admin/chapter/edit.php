<?php if(!isset($_GET['id'])): ?>
    <h1>Nouveau Chapitre</h1>
<?php else: ?>
    <h1>Editer le chapitre</h1>
<?php endif; ?>

<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        <?= $errors ?>
    </div>
<?php endif; ?>

<form method="post">
    <?= $form->input('title', 'Titre du chapitre'); ?>
    <?= $tinyForm->tinyInput('basic-example', 'content', 'Contenu du chapitre'); ?>

    <button class="btn btn-primary">Sauvegarder les modifications</button>
</form>