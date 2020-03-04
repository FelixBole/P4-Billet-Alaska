<a href="index.php">Home</a>

<h1><?= $chapter->title ?></h1>

<p><?= $chapter->content ?></p>

<?php foreach($comments as $comment): ?>
   
    <div class="col-sm-6">
        <h4><?= $comment->name ?></h3>
        <p><?= $comment->message ?></p>
    </div>
<?php endforeach; ?>

<h3>Poster un nouveau commentaire</h2>
<form action="?p=comment.newComment&id=<?= $_GET['id'] ?>" method="post">
    <?= $form->input('name', 'Nom'); ?>
    <?= $form->input('message', 'Commentaire', ['type' => 'textarea']); ?>
    <button class="btn btn-primary">Commenter</button>
</form>