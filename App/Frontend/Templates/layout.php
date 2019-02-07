<!DOCTYPE html>
<html>
  <head>
    <title>
      <?= isset($title) ? $title : 'Mon super site' ?>
    </title>

    <meta charset="utf-8" />

    <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Fugaz+One" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css" type="text/css" />
  </head>

    <body class="bg-light">

      <?php
      if ($_SERVER['REQUEST_URI']!='/')
      {
          require 'header-normal.php';
      } else {
          require 'header-home.php';
      }
      ?>

      <section id="main mb-5">

              <?= $content ?>

      </section>

      <footer class="text-center text-muted p-2">
        Jean Forteroche
      </footer>
    <script src="/js/main.js"></script>

  </body>
</html>
