      <header id="pageHeader" class="text-center container-fluid p-0">
        <h1 id="site-title" class="position-absolute text-center"><a class="text-white text-decoration-none" href="/">Billet simple pour l'Alaska</a></h1>
        <h2 id="sub-title" class="text-white position-absolute">Carnet d'aventures</h2>
        <nav class="position-fixed">
            <ul class="nav flex-column">
              <li><a class="nav-link" title="Accueil" href="/"><div class="row align-items-center"><div class="picto col"><img src="/images/house.png"/></div><div class="item col">&nbsp;Accueil</div></div></a></li>
              <li><a class="nav-link" title="L'auteur" href="/general-1"><div class="row align-items-center"><div class="picto col"><img src="/images/manager.png"/></div><div class="item col">&nbsp;L'auteur</div></div></a></li>
              <li><a class="nav-link" title="Tous les chapitres" href="/livre"><div class="row align-items-center"><div class="picto col"><img src="/images/books.png"/></div><div class="item col">&nbsp;Tous les chapitres</div></div></a></li>
              <li><a class="nav-link" title="Livre d'or" href="/livre-or"><div class="row align-items-center"><div class="picto col"><img src="/images/agenda.png"/></div><div class="item col">&nbsp;Livre d'or</div></div></a></li>
              <?php if ($user->isAuthenticated()) { ?>
                <li class="nav-item"><a class="nav-link" href="/admin/dashboard">Admin</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/dashboard/comments">Commentaires</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/dashboard/deconnexion">Déconnexion</a></li>
              <?php } ?>
            </ul>
          </nav>
      </header>
