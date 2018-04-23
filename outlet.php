<?php include ('inc/bdd.php'); ?>

<?php                               //ICI METTEZ LE PHP POUR TROUVER LES PRODUITS CONCERNER
//Lire la liste de produit
$req = $bdd->prepare('SELECT * FROM produits ORDER BY prixunitaireHT_produit ASC');
$req->execute();
// On récupère le resultat
$result = $req->fetchAll();
// On récupère le nombre de ligne trouvée
$nbreresult = count($result);
?>

        <!-- HEADER -->
        <?php include ('inc/header.php') ?>
        <!-- CSS DE LA PAGE -->
        <link rel="stylesheet" href="assets/css/index.css" />
        <!-- Wrapper -->
        <div id="wrapper">
        <!-- Main -->
        <div id="main">
          <article class="post">
            <section id="category-banner-wrapper" class="sect_titre">

                                  <!-- ICI METTEZ LE TITRE DES PRODUITS CONCERNER -->
              <h1 class="style_titre">Outlet (prix plus bas)</h1>
            </section>
            <div class="primary">
              <p data-auto-id="styleCount" class="resultp styleCount"><?php echo $nbreresult; ?> styles trouvés</p>
              <div class="prod">
                <section class="for_phone">

                  <?php include ('inc/produits/affichageproduits.php'); ?>
                  
                </section>
              </div>
            </div>
          </article>
          <!-- FOOTER -->
          <?php include ('inc/footer.php') ?>
