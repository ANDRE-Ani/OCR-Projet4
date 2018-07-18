<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Le blog de Jean Forteroche" />
    <meta name="author" content="Patrice ANDREANI">
    <meta name="keywords" content="écrivain, jean forteroche">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="icon" type="image/png" href="images/favicon.ico" />

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">

    <meta name="twitter:card" content="Le blog de Jean Forteroche">
    <meta name="twitter:site" content="https://p4ocr.andre-ani.fr/" />
    <meta name="twitter:title" content="Le blog de Jean Forteroche" />
    <meta name="twitter:description" content="Le blog de Jean Forteroche" />
    <meta name="twitter:image" content="https://p4ocr.andre-ani.fr/images/logo-velov.png" />

    <meta property="og:title" content="Le blog de Jean Forteroche" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://p4ocr.andre-ani.fr" />
    <meta property="og:image" content="https://p4ocr.andre-ani.fr/images/logo-velov.png" />
    <meta property="og:description" content="Le blog de Jean Forteroche" />

    <title><?=$titre?></title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/blog-home.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php?action=listPosts">Jean Forteroche</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php?action=listPosts">Accueil
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=about">A propos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=legal">Mentions Légales</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">Le blog de Jean Forteroche</h1>

          <?=$contenu?>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
          
          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Suivez-moi</h5>
            <div class="card-body">
       <p><a href="https://mamot.fr/auth/sign_in" target="_blank"><img src="images/mastodon.png" width="32" height="34" alt="Mastodon"></a>
       <a href="https://framasphere.org/users/sign_in" target="_blank"><img src="images/diaspora.png" width="32" height="32" alt="Diaspora"></a></p>
            </div>
          </div>

          
          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Administration</h5>
            <div class="card-body">

        <?php
          if (isset($_SESSION['user'])) {
            echo '<p>Connecté : ' . '<a href="index.php?action=administration">' . $_SESSION['user'] . '</a></p>';
            echo '<p><a href="index.php?action=logout">Se déconnecter</a></p>';
            } else {
            echo '<p><a href="index.php?action=connection">Se connecter</a></p>';
            echo '<p><a href="index.php?action=creationUser">Créer un compte</a></p>';
          }
        ?>
      </div>
    </div>
          
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; 2018 - Jean Forteroche - Acteur / Ecrivain</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
