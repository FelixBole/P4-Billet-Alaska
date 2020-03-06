
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title><?= App::getInstance()->title ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/starter-template/">
    
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <!-- Personal stylesheet -->
    <link rel="stylesheet" href="/P4-Alaska/public/css/style.css">

    <!-- Favicons -->
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/dqg6jkjxix54zjp03l9uxaphwjepqs1x2nlb9upt1t0govbc/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


    <style>

        .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.php">Accueil</a>
        <ul class="nav">
            <li class="nav-item"><a href="?p=users.login" class="nav-link">DEV - LOGIN</a></li>
            <li class="nav-item"><a href="?p=admin.chapter.index" class="nav-link">DEV - ADMIN - CHAPTERS</a></li>
            <li class="nav-item"><a href="?p=admin.comment.index" class="nav-link">DEV - ADMIN - COMMENTS</a></li>
        </ul>
    </nav>

    <main role="main" class="container" style='padding-top: 100px;'>

        <div class="starter-template">
            <?= $content ?>
        </div>

    </main><!-- /.container -->
    <script src="/P4-Alaska/public/js/tinymce.js"></script>
</body>
</html>
