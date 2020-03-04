<a href="index.php?p=home">Home</a>

<h1><?= $chapter->title ?></h1>

<p><?= $chapter->content ?></p>

<?php foreach($comments as $comment): ?>
   
    <div class="col-sm-6">
        <h3><?= $comment->name ?></h3>
        <p><?= $comment->message ?></p>
    </div>
<?php endforeach; ?>