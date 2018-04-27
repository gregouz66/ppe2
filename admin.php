<?php require ('inc/bdd.php'); ?>
<?php require ('admin/incadmin.php'); ?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Administration - LCDB</title>

    <link rel="stylesheet" href="admin/assets/css/dropdown.css" />
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="admin/assets/css/admin.css" rel="stylesheet">
  </head>

  <body>
    <!-- VISIBLE ORDI -->
    <nav class="navbar navbar-dark sticky-top bg-transparent flex-md-nowrap p-0 ordi">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="admin.php">ADMINISTRATION</a>
    </nav>

    <!-- VISIBLE TEL POUR DROPDOWN -->
    <nav class="navbar navbar-dark sticky-top bg-transparent flex-md-nowrap p-0 tel">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#menu">ADMINISTRATION</a>
    </nav>

    <!-- main -->
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">

              <?php
                    switch ($selector) {
                      case '1':
                      include ('admin/activenav/active1.php');
                      break;

                      case '2':
                      include ('admin/activenav/active2.php');
                      break;

                      case '3':
                      include ('admin/activenav/active3.php');
                      break;

                      case '4':
                      include ('admin/activenav/active4.php');
                      break;

                      case '5':
                      include ('admin/activenav/active3.php');
                      break;

                      case '6':
                      include ('admin/activenav/active4.php');
                      break;

                      default:
                      include ('admin/activenav/active1.php');
                      break;
                    }
                  ?>


            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Rapports enregistrés</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Rapport 1
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Rapport 2
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Rapport 3
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Rapport 4
                </a>
              </li>
            </ul>

            <a class="nav-link" href="index.php">
                <span data-feather="home"></span>
                Retour <span class="sr-only">(current)</span>
              </a>

          </div>
        </nav>

        <!-- DROPDOWN TEL -->
        <!-- Menu -->
        <section id="menu">

        <!-- Links -->

          <a class="nav-link active" href="admin.php?selector=1">
            <span data-feather="home"></span>
            Tableau de bord <span class="sr-only">(current)</span>
          </a>

          <a class="nav-link" href="admin.php?selector=2">
            <span data-feather="users"></span>
            Utilisateurs
          </a>

          <a class="nav-link" href="admin.php?selector=3">
            <span data-feather="layers"></span>
            Produits
          </a>

          <a class="nav-link" href="admin.php?selector=4">
            <span data-feather="tv"></span>
            Commandes
          </a>

          <a class="nav-link" href="index.php">
           <span data-feather="home"></span>
           Retour
          </a>

        </section>

        <?php
              switch ($selector) {
                case '1':
                include ('admin/dashboard.php');
                break;

                case '2':
                include ('admin/utilisateurs.php');
                break;

                case '3':
                include ('admin/produits.php');
                break;

                case '4':
                include ('admin/commandes.php');
                break;

                case '5':
                include ('admin/editproduit.php');
                break;

                case '6':
                include ('admin/affichcommande.php');
                break;

                default:
                include ('admin/dashboard.php');
                break;
              }
          ?>


      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="admin/assets/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>


  </body>
</html>
