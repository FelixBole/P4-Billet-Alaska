<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="./public/css/style.css">

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/dqg6jkjxix54zjp03l9uxaphwjepqs1x2nlb9upt1t0govbc/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <title>Alaska</title>
</head>
<body style="padding-top: 100px">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="?p=home">Jean Forteroche</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="?p=home" class="nav-link">Home</a>
            </li>
        </ul>
    </nav>
    
    <div class="main">
        <?= $content ?>
    </div>
</body>
</html>