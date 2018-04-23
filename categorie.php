<?php include ('inc/bdd.php'); ?>

<?php
//Lire la liste de produit
if (isset($_GET['cat'])) { //SI UNE CAT A ETE SELECTIONNE
  $cat = $_GET['cat'];

  // //TROUVER LA CATEGORIE
  // $reqcat = $bdd->prepare('SELECT id_categorie FROM categories WHERE libelle_categorie = ? ');
  // $reqcat->execute(array($cat));
  // // On récupère le resultat
  // $catnum = $reqcat->fetch(PDO::FETCH_ASSOC);
  // $catnum = $catnum['id_categorie'];

  if (isset($_GET['marque'])) { //SI LA MARQUE A ETE SELECTIONNE AUSSI
    $marque = $_GET['marque'];
    $req = $bdd->prepare('SELECT * FROM produits WHERE libelle_categorie = ? AND libelle_marque = ?');
    $req->execute(array($cat, $marque));
    $titre = $cat . " - " . $marque;

  } else { //SI LA CAT SIMPLE SIMPLE A ETE SELECTIONNE
    $req = $bdd->prepare('SELECT * FROM produits WHERE libelle_categorie = ?');
    $req->execute(array($cat));
    $titre = $cat;
    }

} else if (isset($_GET['marque'])) { //SI LA MARQUE SIMPLE A ETE SELECTIONNE
  $marque = $_GET['marque'];
  $req = $bdd->prepare('SELECT * FROM produits WHERE libelle_marque = ?');
  $req->execute(array($marque));
  $titre = $marque;

  } else { //SI RIEN N'A ETE SELECTIONNE
  $titre = "Un problème est survenu !";
}

// On récupère le resultat
$result = $req->fetchAll();
// On récupère le nombre de ligne trouvée
$nbreresult = count($result);
//SI AUCUN RESULT DES ARTICLES RECHERCHER
if ($nbreresult == 0) {
  $titre = "Aucun résultat trouvé !";
}
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
              <h1 class="style_titre"><?php echo $titre; ?></h1>
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
