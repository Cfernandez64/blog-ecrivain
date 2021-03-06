      <header id="homeHeader" class="vw-100 vh-100 text-center container-fluid p-0">
        <div id="filterHome">

        </div>
        <div id="site-title-home" class="position-absolute">
          <h1  class="text-center text-white">Billet simple pour l'Alaska</h1>
          <div class="borderTitre mt-4 mb-4"></div>
          <h2 class="text-white">Un roman de Jean Forteroche</h2>
        </div>
        <div id="site-bottom-home" class="position-absolute">
          <h3 class="text-white pb-2">Entrez dans l'aventure</h3>
            <p><img src="/images/down.png"/>
          </p>
        </div>

        <nav class="position-fixed">
            <ul class="nav">
              <li><a class="nav-link" title="Accueil" href="/"><div class="row align-items-center"><div class="picto col"><img src="/images/house.png"/></div><div class="item col">&nbsp;Accueil</div></div></a></li>
              <li><a class="nav-link" title="L'auteur" href="/general-1"><div class="row align-items-center"><div class="picto col"><img src="/images/manager.png"/></div><div class="item col">&nbsp;L'auteur</div></div></a></li>
              <li><a class="nav-link" title="Tous les chapitres" href="/livre/part-1"><div class="row align-items-center"><div class="picto col"><img src="/images/books.png"/></div><div class="item col">&nbsp;Tous les chapitres</div></div></a></li>
<li><a class="nav-link" title="Livre d'or" href="/livre-or"><div class="row align-items-center"><div class="picto col"><img src="/images/agenda.png"/></div><div class="item col">&nbsp;Livre d'or</div></div></a></li>
              <?php if ($user->isAuthenticated()) { ?>
                <li class="nav-item"><a class="nav-link" href="/admin/dashboard">Admin</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/dashboard/comments">Commentaires</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/dashboard/deconnexion">Déconnexion</a></li>
              <?php } ?>
            </ul>
          </nav>
      </header>
