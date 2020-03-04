<h1>Gérer les commentaires</h1>

<table class='table'>
    <thead>
    <tr>
        <td>Chapitre</td>
        <td>Commentaires</td>
        <td>Voir les commentaires</td>
    </tr>
    </thead>
    <tbody>
        <?php foreach($chapters as $chapter): ?>
                <tr>
                    <td><?= $chapter->title ?></td>
                    <!-- Works, but kinda messy code. 
                            Just as a side note to keep track :
                                returned the value of count inside the CommentModel
                                to assign it to each chapter id in the controller...
                                To be changed -->
                    <td><?= $countComments[($chapter->id)]; ?></td>
                    <td>
                        <a href="?p=admin.comment.manage&id=<?= $chapter->id?>" class="btn btn-primary">Voir</a>
                    </td>
                </tr>
        <?php endforeach; ?>
    </tbody>
</table>