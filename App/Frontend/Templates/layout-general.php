<!DOCTYPE html>
<html>
  <head>
    <title>
      <?= isset($title) ? $title : 'Mon super site' ?>
    </title>

    <meta charset="utf-8" />
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=1xkjf8jecnrgz9hyj95bb0xjyfqes4n5ixgcm9vwy3c2jenh'></script>
    <script>
    tinymce.init({
      selector: '#myContent',
      toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
    });
    </script>
    <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Fugaz+One" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css" type="text/css" />
  </head>

  <body class="bg-light">
      <header class="text-center container-fluid p-0">
        <img class="w-100" src="/images/alaskaRoad.jpg">
        <h1 id="site-title" class="position-absolute text-center"><a href="/">Billet simple pour l'Alaska</a></h1>
        <p id="sub-title" class="text-white position-absolute">Carnet d'aventures</p>
      </header>

      <nav class="container">
        <ul class="nav justify-content-center">
          <li class="nav-item"><a class="nav-link" href="/">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="/general-1">A propos de l'auteur</a></li>
          <?php if ($user->isAuthenticated()) { ?>
          <li class="nav-item"><a class="nav-link" href="/admin/">Admin</a></li>
          <li class="nav-item"><a class="nav-link" href="/admin/news-insert.html">Ajouter une news</a></li>
          <li class="nav-item"><a class="nav-link" href="/admin/deconnexion.html">Se déconnecter</a></li>
          <?php } ?>
        </ul>
      </nav>

      <div id="" class="container">

              <?= $content ?>

      </div>

      <footer></footer>
    <script src="/js/main.js"></script>

  </body>
</html>