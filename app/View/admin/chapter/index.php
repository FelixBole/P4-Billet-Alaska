

<h1>Gestion des chapitres</h1>




<div class="nav mb-2">
    <a href="?p=admin.chapter.new" class='btn btn-success'>Nouveau chapitre</a>
    <a href="?p=admin.comment.index" class="nav-link adminNavBtn">Gérer les commentaires</a>
</div>

<table class='table table-striped table-dark'>
    <thead>
    <tr>
        <th scope="col">ID</td>
        <th scope="col">Titre</td>
        <th scope="col">Actions</td>
    </tr>
    </thead>
    <Tbody>
        <?php foreach($chapters as $chapter): ?>
            <tr scope="row">
                <td><?= $chapter->id ?></td>
                <td><?= $chapter->title ?></td>
                <td>
                    <a href="?p=admin.chapter.edit&id=<?= $chapter->id?>" class="btn btn-primary">Editer</a>
                    <!-- Gérer la sécurité du bouton delete pour eviter qu'un utilisateur envoie un lien vers un delete -->
                    <form action="?p=admin.chapter.delete" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $chapter->id; ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </Tbody>
</table>