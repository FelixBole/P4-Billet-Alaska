
<div class="row">
    <h1>Gestion des commentaires</h1>
</div>
<a href="?p=admin.comment.index" class="btn btn-success adminNavBtn">Retour à la page précédente</a>
<div class="row adminHelpInfo">
    <p>
        Liste des commentaires du chapitre sélectionné <br/> <br/>
        La première liste concerne les commentaires qui ont été signalés par des utilisateurs ainsi que le nombre de signalements que le commentaire à reçu. <br/>
        L'action <span style="color:goldenrod">Nettoyer</span> annulera les signalements, tandis que l'action <span style="color:red">Supprimer</span> 
        supprimera définitivement le commentaire.
    </p>
</div>

<h2 class="mt-4">Commentaires signalés</h2>

<table id="adminTableCommentManageSignaled" class='table table-striped mt-3'>
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Signalements</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($reportedComments as $reported): ?>
            <tr>
                <td><?= $reported->name ?></td>
                <td><?= substr($reported->message, 0, 50) . "..." ?></td>
                <!-- Fixed ambiguity, do the same in index -->
                <td><?= $reported->reports ?> fois</td>
                <td>
                    <form action="?p=admin.comment.clear&id=<?= $_GET['id'] ?>" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $reported->id; ?>">
                        <button type="submit" class="btn btn-warning">Nettoyer</button>
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
    
<div class="separator"></div>

<div class="separator"></div>

<h2>Autres commentaires</h2>

<table id="adminTableCommentManageUnsignaled" class='table table-striped'>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Commentaire</th>
            <th>Action</th>
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