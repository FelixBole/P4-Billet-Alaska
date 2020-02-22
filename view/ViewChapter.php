<?php 
if (isset($_POST['name']) && isset($_POST['message'])) {
    // Create comment in database
} else {
    // Msg d'erreur
}
?>


<div class="row">
    <?php foreach($chapter as $element): ?>
        <div class="col-md-9">
            <h2><em>Chapitre <?= $element->chapter() ?></em></h2>
            <h1><?= $element->title() ?></h1>
            <div>
                <p><?= $element->content() ?></p>
            </div>
        </div>
        <div class="col-md-3">
            <ul class="list-group">
                <?php if (!empty($nextChapter)):?>
                    <li class="list-group-item"><a href="?p=chapter&id=<?= $element->chapter()+1 ?>" class="nav-link">Chapitre suivant</a></li>
                <?php endif;?>

                <?php if(!empty($previousChapter)): ?>
                    <li class="list-group-item"><a href="?p=chapter&id=<?= $element->chapter()-1 ?>" class="nav-link">Chapitre Précédent</a></li>
                <?php endif;?>
                
                    <li class="list-group-item"><a href="?p=home" class="nav-link">Retourner à la liste des chapitres</a></li>
            </ul>
        </div>
    <?php endforeach; ?>
</div>

<?php if (!empty($comments)): ?>
    <div class="row">
        <div class="col-md-6">
            <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <em><?= $comment->name() ?></em>
                    <p><?= $comment->message() ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-6">
        <h2>Poster un nouveau commentaire</h2>
        <form action="?p=comment&id=<?= $_GET['id'] ?>" method="post">
            <div class="form-group">
                <input type="text" maxlength="30" class="form-control" placeholder="Nom" name="name">
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="5" placeholder="Votre commentaire" name="message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" href="<?= 'index.php?p=comment&id=' . $_GET['id'] ?>">Poster</button>
        </form>
    </div>
</div>

<?php 
/* if (!empty($_POST['name']) || !empty($_POST['message'])) {
    if (isset($errMsg)) {
        echo $errMsg;
    }
} */
?>