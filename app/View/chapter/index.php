<div class="row">
    <div class="col-sm-8">
        <h1>I am home</h1>


        <?php foreach($lastChapters as $chapter): ?> <!-- This returns a new Chapter object -->

            <h2><a href="<?= $chapter->url; ?>"><?= $chapter->title; ?></a></h2>

            <p><?= $chapter->excerpt; ?></p>


        <?php endforeach; ?>
    </div>

    <div class="col-sm-4">
        <ul>
            <?php foreach($chapters as $chapter): ?>
                <li><a href="<?= $chapter->url ?>"><?= $chapter->title ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
