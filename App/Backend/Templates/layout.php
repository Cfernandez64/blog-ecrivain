      <!DOCTYPE html>
      <html>
        <head>
          <title>
            <?= isset($title) ? $title : 'Mon super site' ?>
          </title>

          <meta charset="utf-8" />
          <!--<script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=1xkjf8jecnrgz9hyj95bb0xjyfqes4n5ixgcm9vwy3c2jenh'></script>
          <script>
          tinymce.init({
            selector: '#myContent',
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
          });
        </script>-->
          <script
          src="https://code.jquery.com/jquery-3.3.1.js"
          integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
          crossorigin="anonymous"></script>
          <link href="https://fonts.googleapis.com/css?family=Fugaz+One" rel="stylesheet">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
          <link rel="stylesheet" href="/css/style.css" type="text/css" />
        </head>

        <body class="bg-light">
            <header id="pageHeader" class="text-center container-fluid p-0">
              <h1 id="site-title" class="position-absolute text-center"><a class="text-white text-decoration-none" href="/">Billet simple pour l'Alaska</a></h1>
              <p id="sub-title" class="text-white position-absolute">Carnet d'aventures</p>
              <nav class="position-fixed">
                  <ul class="nav flex-column">
                    <li><a class="nav-link" title="Accueil" href="/"><div class="row align-items-center"><div class="picto col"><img src="/images/house.png"/></div><div class="item col">&nbsp;Accueil</div></div></a></li>
                    <li><a class="nav-link" title="L'auteur" href="/general-1"><div class="row align-items-center"><div class="picto col"><img src="/images/manager.png"/></div><div class="item col">&nbsp;L'auteur</div></div></a></li>
                    <?php if ($user->isAuthenticated()) { ?>
                      <li class="nav-item"><a class="nav-link" href="/admin/">Admin</a></li>
                      <li class="nav-item"><a class="nav-link" href="/admin/general">Liste des pages</a></li>
                      <li class="nav-item"><a class="nav-link" href="/admin/general-insert">Ajouter une page</a></li>
                      <li class="nav-item"><a class="nav-link" href="/admin/news-insert">Ajouter une news</a></li>
                      <li class="nav-item"><a class="nav-link" href="/admin/deconnexion">Se déconnecter</a></li>
                    <?php } ?>
                  </ul>
                </nav>
            </header>



      <section id="" class="container">

              <?= $content ?>

      </section>

      <footer class="text-center text-muted p-2">
        Jean Forteroche
      </footer>
    <script src="/js/main.js"></script>

  </body>
</html>
