

<h1>Gérer les chapitres</h1>

<div>
    <p><a href="?p=admin.chapter.new" class='btn btn-success'>Nouveau chapitre</a></p>
</div>

<table class='table'>
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Actions</td>
    </tr>
    </thead>
    <Tbody>
        <?php foreach($chapters as $chapter): ?>
            <tr>
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