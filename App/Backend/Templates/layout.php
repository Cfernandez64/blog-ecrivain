      <!DOCTYPE html>
      <html>
        <head>
          <title>
            <?= isset($title) ? $title : 'Mon super site' ?>
          </title>

          <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
          <meta charset="utf-8" />
          <script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=1xkjf8jecnrgz9hyj95bb0xjyfqes4n5ixgcm9vwy3c2jenh'></script>
          <script>
          tinymce.init({
            plugins: [
              "advlist autolink lists link charmap print preview anchor",
              "searchreplace visualblocks code fullscreen",
              "insertdatetime table paste wordcount"
            ],
            invalid_elements: 'div',
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
            <header id="pageHeader" class="text-center container-fluid p-0">
              <h1 id="site-title" class="position-absolute text-center"><a class="text-white text-decoration-none" href="/">Billet simple pour l'Alaska</a></h1>
              <p id="sub-title" class="text-white position-absolute">Carnet d'aventures</p>
              <nav class="position-fixed">
                  <ul class="nav">
                    <li><a class="nav-link" title="Accueil" href="/"><div class="row align-items-center"><div class="picto col"><img src="/images/house.png"/></div><div class="item col">&nbsp;Accueil</div></div></a></li>
                    <?php if ($user->isAuthenticated()) { ?>
                      <li><a class="nav-link" title="Episodes" href="/admin/dashboard"><div class="row align-items-center"><div class="picto col"><img src="/images/books.png"/></div><div class="item col">&nbsp;Episodes</div></div></a></li>
                      <li><a class="nav-link" title="Commentaires" href="/admin/dashboard/comments"><div class="row align-items-center"><div class="picto col"><img src="/images/chat.png"/></div><div class="item col">&nbsp;Commentaires</div></div></a></li>
                      <li><a class="nav-link" title="Déconnexion" href="/admin/dashboard/deconnexion"><div class="row align-items-center"><div class="picto col"><img src="/images/logout.png"/></div><div class="item col">&nbsp;Déconnexion</div></div></a></li>
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
    <script
			  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
			  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
			  crossorigin="anonymous"></script>

  </body>
</html>
