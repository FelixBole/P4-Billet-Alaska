<?php 
// Check that chapter exists for next chapter to work
?>

<div class="row">
    <?php foreach($chapter as $element): ?>
        <div class="col-md-8">
            <h2><em>Chapitre <?= $element->chapter() ?></em></h2>
            <h1><?= $element->title() ?></h1>
            <div>
                <p><?= $element->content() ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <ul class="list-group">
                <!-- ID +1 could lead to problems if a chapter is deleted it will create gaps
                    Could fix with a check on the chapter number and not id so add a column 
                    chapter num in database -->
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

