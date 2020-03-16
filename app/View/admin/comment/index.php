<h1>Gérer les commentaires</h1>

<ul class="nav">
    <li class="nav-item"><a href="?p=admin.chapter.index" class="btn btn-success adminNavBtn">Gestion des chapitres</a></li>
</ul>

<table id="adminTableCommentIndex" class='table table-striped mt-2'>
    <thead>
    <tr>
        <th scope="col">Chapitre</th>
        <th scope="col">Commentaires</th>
        <th scope="col">Voir les commentaires</th>
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