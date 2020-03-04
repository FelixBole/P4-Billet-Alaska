<a href="?p=admin.comment.index">Index</a>

<h1>Gérer les commentaires</h1>


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
                        <a href="?p=admin.comment.clean" class="btn btn-primary">Annuler les signalements</a>
                        <form action="?p=admin.comment.delete" method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $comment->id; ?>">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
        <?php endforeach; ?>
    </tbody>
</table>