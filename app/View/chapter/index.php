<div class="row">
    <div class="col-md-12 homePageTitle">
        <h1>Jean Forteroche</h1>
        <h2>Billet simplet pour l'Alaska</h2>
    </div>
</div>


<div class="row mt-5">
    <div class="col-md-8 latestChaptersContainer">
        <h3>Découvrez les derniers chapitres de mon oeuvre</h3>
        <div class="separator"></div>
        <?php foreach($lastChapters as $chapter): ?> <!-- This returns a new Chapter object -->
            <div class="latestChapterSingle mt-2">
                <h2><a href="<?= $chapter->url; ?>"><?= $chapter->title; ?></a></h2>   
                <?= $chapter->excerpt; ?>
                <!-- <?= var_dump($chapter->excerpt); ?> -->
            </div>
        <?php endforeach; ?>
    </div>

    <div class="col-md-4">
        <ul class="list-group chapterListContainer">
            <li class="list-group-item chapterListTitle">Liste des chapitres</li>
            <?php foreach($chapters as $chapter): ?>
                <li class="list-group-item"><a class="list-group-item chapterListLink" href="<?= $chapter->url ?>"><?= $chapter->title ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
