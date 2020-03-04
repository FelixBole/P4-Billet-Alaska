<a href="index.php?p=home">Home</a>

<h1>All comments</h1>

<?php foreach($comments as $comment): ?>
   
    <div class="col-sm-6">
        <h3><?= $comment->name ?></h3>
        <p><?= $comment->message ?></p>
    </div>
<?php endforeach; ?>