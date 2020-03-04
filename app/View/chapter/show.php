<div class="row">
    <div class="col-sm-8">
        <h1><?= $chapter->title ?></h1>
        
        <p><?= $chapter->content ?></p>

        <nav class="nav nav-pills nav-fill justify-content-end">
            <?php if(!is_null($prevChapter)): ?>
                <a href="<?= $prevChapter->url ?>" class="nav-item nav-link">Chapitre précédent</a>
            <?php endif; ?>
            <?php if(!is_null($nextChapter)): ?>
                <a href="<?= $nextChapter->url ?>" class="nav-item nav-link">Chapitre suivant</a>
            <?php endif; ?>
        </nav>
    </div>

    <div class="col-sm-4">
        <ul class="list-group">
            <a href="index.php" class="list-group-item">Retourner à l'accueil</a>
            <?php $chapNum = 0; // To list chapters by number and not title ?>
            <?php foreach($chapters as $oneChapter): ?>
                <?php $chapNum += 1; ?>
                <li class="list-group-item <?php if($_GET['id'] == $chapNum) {echo "active";} ?>">
                    <a href="<?= $oneChapter->url ?>" class="nav-link" style="color:black;">Chapitre <?= $chapNum ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<h3>Commentaires</h3>

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