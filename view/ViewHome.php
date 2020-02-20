<!-- Needs page design -->

<div class="row homeHeader">
    <div class="col-md-6">
        <h1>Jean Forteroche</h1>
        <h2>Un billet pour l'Alaska</h2>
    </div>
    <div class="col-md-6">
        <p>
            Découvrez mon oeuvre chapitre par chapitre au fur & à mesure que je l'écris. <br />
            Donnez-moi vos avis et qui sait ? L'histoire pourrait tourner avec vos idées !
        </p>
    </div>
</div>

<div class="row">
    <div class="col-md-8 chapterList">
        <?php foreach ($chapters as $chapter): ?>
            <div class="chapterInfo">
                <h2><?= $chapter->title() ?></h2>
                <p><?= $chapter->excerpt() ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="col-md-4">
        <ul class="list-group">
            <?php foreach ($chapters as $chapter): ?>
                <li class="list-group-item"><a href="?p=chapter&id=<?= $chapter->id() ?>" class="nav-link"><?= $chapter->title() ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>