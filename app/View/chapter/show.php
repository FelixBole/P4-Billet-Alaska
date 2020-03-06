<div class="row">
    <div class="col-sm-9">
        <div class="chapterContainer">
            <div class="chapterTitle">
                <h1><?= $chapter->title ?></h1>
            </div>
            <div class="chapterBody">
                <p><?= $chapter->content ?></p>
            </div>
        </div>

        <nav class="nav justify-content-end">
            <?php if($prevChapter !== false): ?>
                <a href="<?= $prevChapter->url ?>" class="chapterNavBtn">Chapitre précédent</a>
            <?php endif; ?>
            <?php if($nextChapter !== false): ?>
                <a href="<?= $nextChapter->url ?>" class="chapterNavBtn">Chapitre suivant</a>
            <?php endif; ?>
        </nav>
    </div>

    <div class="col-sm-3">
        <ul class="list-group chapterList">
            <?php $chapNum = 0; // To list chapters by number and not title ?>
            <?php foreach($chapters as $oneChapter): ?>
                <?php $chapNum += 1; ?>
                <li class="list-group-item <?php if($_GET['id'] == $chapNum) {echo "activeChapter";} ?>">
                    <a href="<?= $oneChapter->url ?>" class="nav-link" style="color:black;">
                        <i class="fas fa-arrow-alt-circle-right"></i>
                        <span>Chapitre <?= $chapNum ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-md-9">
        <div class="separator"></div>
    </div>
</div>

<h3>Commentaires</h3>

<?php if(!is_null($errors)): ?>
    <div class="alert alert-danger">
        <?= $errors ?>
    </div>
<?php endif; ?>

<?php if(!is_null($commentConfirm)): ?>
    <div class="alert alert-success">
        <?= $commentConfirm ?>
    </div>
<?php endif; ?>

<?php if(empty($comments)): ?>
    <div class="noComment">
        Il n'y a pas de commentaires sur ce chapitre
    </div>
<?php endif; ?>

<?php foreach($comments as $comment): ?>


    <div class="col-sm-8 userCommentContainer">
        <div class="userCommentBody">
            <div class="userCommentInfo">
                <h5><?= $comment->name ?></h5>
                <p>le <?= $comment->date ?></p>
                <!-- Sending id of comment with a form to be able to redirect with the chapter ID after -->
            </div>
            <div class="userCommentMessage">
                <span class="arrow"></span>
                <p><?= $comment->message ?></p>
            </div>
            <form action="?p=comment.report&id=<?= $chapter->id ?>" method="post">
                <input type="hidden" name="id" value="<?= $comment->id; ?>">
                <button class="reportBtn"> Signaler</button>
            </form>
        </div>     
    </div>
<?php endforeach; ?>

<div class="row">
    <div class="col-md-9">
        <div class="separator"></div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <h3>Poster un nouveau commentaire</h2>
        <form action="?p=comment.newComment&id=<?= $_GET['id'] ?>" method="post">
            <?= $form->input('name', 'Nom'); ?>
            <?= $form->input('message', 'Commentaire', ['type' => 'textarea']); ?>
            <button class="commentBtn">Commenter</button>
        </form>
    </div>
</div>