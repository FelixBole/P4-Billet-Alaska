<a href="?p=admin.comment.index">Index</a>

<h1>Gestion des commentaires</h1>

<h2>Commentaires signalés</h2>

<table class='table'>
    <thead>
    <tr>
        <td>Nom</td>
        <td>Commentaire</td>
        <td>Signalements</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
        <?php foreach($reportedComments as $reported): ?>
                <tr>
                    <td><?= $reported->name ?></td>
                    <td><?= $reported->message ?></td>
                    <!-- Just like for comment.index - could be better -->
                    <td><?= $reportCount[$reported->reports]->reports ?></td>
                    <td>
                        <form action="?p=admin.comment.clear&id=<?= $_GET['id'] ?>" method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $reported->id; ?>">
                            <button type="submit" class="btn btn-warning">Annuler les signalements</button>
                        </form>
                        <form action="?p=admin.comment.delete&id=<?= $_GET['id'] ?>" method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $reported->id; ?>">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h2>Autres commentaires</h2>

<table class='table'>
    <thead>
    <tr>
        <td>Nom</td>
        <td>Commentaire</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
        <?php foreach($comments as $comment): ?>
                <tr>
                    <td><?= $comment->name ?></td>
                    <td><?= $comment->message ?></td>
                    <td>
                        <form action="?p=admin.comment.delete&id=<?= $_GET['id'] ?>" method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $comment->id; ?>">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
        <?php endforeach; ?>
    </tbody>
</table>