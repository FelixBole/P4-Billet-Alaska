<?php 
// Check that chapter exists for next chapter to work
?>

<div class="row">
    <?php foreach($chapter as $element): ?>
        <div class="col-md-8">
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
                <li class="list-group-item"><a href="?p=chapter&id=<?= $element->id()+1 ?>" class="nav-link">Chapitre suivant</a></li>
                <li class="list-group-item"><a href="?p=chapter&id=<?= $element->id()-1 ?>" class="nav-link">Chapitre Précédent</a></li>
                <li class="list-group-item"><a href="?p=home" class="nav-link">Retourner à la liste des chapitres</a></li>
            </ul>
        </div>
    <?php endforeach; ?>
</div>
