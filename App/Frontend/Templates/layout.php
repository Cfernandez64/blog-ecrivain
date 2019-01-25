<!DOCTYPE html>
<html>
  <head>
    <title>
      <?= isset($title) ? $title : 'Mon super site' ?>
    </title>

    <meta charset="utf-8" />
    <link href="https://fonts.googleapis.com/css?family=Fugaz+One" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css" type="text/css" />
  </head>

  <body class="bg-light">
    <div id="wrap">
      <header class="text-center container-fluid p-0">
        <img class="w-100" src="/images/alaskaRoad.jpg">
        <h1 id="site-title" class="position-absolute text-center"><a href="/">Voyage en Alaska</a></h1>
        <p id="sub-title" class="text-white position-absolute">Carnet d'aventures</p>
      </header>

      <nav class="container">
        <ul class="nav justify-content-center">
          <li class="nav-item"><a class="nav-link" href="/">Accueil</a></li>
          <?php if ($user->isAuthenticated()) { ?>
          <li class="nav-item"><a class="nav-link" href="/admin/">Admin</a></li>
          <li class="nav-item"><a class="nav-link" href="/admin/news-insert.html">Ajouter une news</a></li>
          <li class="nav-item"><a class="nav-link" href="/admin/deconnexion.html">Se déconnecter</a></li>
          <?php } ?>
        </ul>
      </nav>

      <div id="content-wrap" class="container bg-white shadow-sm p-3">
        <section id="main">
          <?php if ($user->hasFlash()) echo '<p style="text-align: center;">', $user->getFlash(), '</p>'; ?>

          <?= $content ?>
        </section>
      </div>

      <footer></footer>
    </div>
  </body>
</html>
