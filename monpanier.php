<?php include ('inc/bdd.php'); ?>

<?php
if(isset($_SESSION['id_client'])){

//Formulaire infos livraisons
include ('inc/panier/suppr_prod.php');

// REQUETE POUR VOIR LES ARTICLES DANS LE PANIER DU CLIENT
$id_client = $_SESSION['id_client'];
$monpanier = $bdd->prepare("SELECT * FROM panier WHERE id_client = ?");
$monpanier->execute(array($id_client));
$result_panier = $monpanier->rowCount();
}
?>

<?php include './inc/header.php' ?>
<!-- CSS DE LA PAGE -->
<link rel="stylesheet" href="assets/css/index.css" />
<link rel="stylesheet" href="assets/css/monpanier.css" />

  <div id="wrapper">
  <div id="main">
    <article class="post">

      <?php
    	     if (empty($errors) === false) {
    	        echo '<ul>';
    	        foreach ($errors as $error) {
    	            echo "<div class='alert alert-danger alert-dismissible fade show'> $error
    	            <button type='button' class='close errors' data-dismiss='alert' aria-label='Close'>
    	              <span aria-hidden='true'>&times;</span>
    	            </div>";
    	        }
    	        echo '</ul>';
    	    } else if (empty($errors1) === false) {
             echo '<ul>';
             foreach ($errors1 as $error1) {
                 echo "<div class='alert alert-success alert-dismissible fade show'> $error1
                 <button type='button' class='close errors' data-dismiss='alert' aria-label='Close'>
                   <span aria-hidden='true'>&times;</span>
                 </div>";
             }
             echo '</ul>';
         }
    	 ?>

    <?php if(isset($_SESSION['id_client'])){ //SI IL EST CONNECTER
    if($result_panier != 0) { // SI IL Y A DES PROD DANS LE PANIER
      //VAR QUI SERVIRA POUR LE CALC DU PRIX TOTAL DES PROD
      $prod_panier = ''; ?>

      <h3>Votre panier</h3>
      <div class="row">
        <div class="col-md-9 col-sm-6" style="border-right: solid;">

          <?php // On récupère le resultat
          $result = $monpanier->fetchAll();

          foreach($result as $row0) { // ON AFFICHE A LA CHAINE TOUT LES PROD TROUVER

            $id_prod = $row0['id_produit'];
            $req_prod = $bdd->prepare('SELECT * FROM produits WHERE id_produit = ?');
            $req_prod->execute(array($id_prod));
            $result_prod = $req_prod->fetchAll();

            foreach($result_prod as $row) { // ON AFFICHE 1 PAR 1 CHAQUE ARTICLES

              //VAR QUI SERVIRA POUR LE CALC DU PRIX TOTAL DES PROD
              $prod_panier .= $row["id_produit"].',';

              //Lire la liste des photos du produit
              $req2 = $bdd->prepare('SELECT * FROM photoproduit WHERE id_produit = ? AND pardefaut_photoproduit = 1 LIMIT 1');
              $req2->execute(array($row["id_produit"]));
              // On récupère le resultat
              $photo = $req2->fetch();
              $photodefaut = $photo['photo_produit'];

              // SI IL Y A UNE PROMO
              if (!empty($row['promo_produit'])) {
                //Attribue le prix avec réduction
                $promo = str_replace(".",",",$row['promo_produit']);
                $prix = str_replace(".",",",$row['prixunitaireHT_produit']);
                $promoeuro = $prix * $promo / 100;
                $promoprix = $prix - $promoeuro;
                $promoprix = str_replace(",",".",$promoprix);
              } ?>

              <!-- HTML DE CHAQUE PRODUIT AFFICHER -->
              <article style="margin-left: 1em;">
                <a class="a_prod" href="article.php?id=<?php echo $row["id_produit"];?>">
                  <div style="width:100px;">
                    <img data-auto-id="productTileImage" class="zoom" src="<?php echo $photodefaut; ?>" alt="" style="width:100%;">
                  </div>
                  <label><?php echo $row['nom_produit'] ?></label>
                  <?php if (!empty($row['promo_produit'])) { ?>
                    <span class="prix_style2 ancienprix" data-auto-id=""><?php echo $row['prixdepartHT_produit']; ?> € </span>
                    <span class="prix_style2 prixpromo" data-auto-id=""><?php echo $row['prixunitaireHT_produit']; ?> € </span>
                  <?php } else { ?>
                    <span class="prix_style2" data-auto-id=""><?php echo $row['prixunitaireHT_produit']; ?> € </span>
                  <?php } ?>
                </a>
                  <a href="monpanier.php?suppr=<?php echo $row["id_produit"] ?>"><button type="submit" name="suppr_prod">Retirer</button></a>
              </article>
              <hr>

            <?php }
          } ?>

        </div>
        <!-- CALC VALEUR TOTAL DES PROD DANS PANIER -->
        <?php
        $prod_panier = substr($prod_panier, 0, -1);
        //Lire la liste des photos du produit
        $req_total = $bdd->query('SELECT SUM(prixunitaireHT_produit) FROM produits WHERE id_produit IN ('.$prod_panier.')');
        // On récupère le resultat
        $total = $req_total->fetch();
        ?>
        <!-- HTML PARTIE COMMANDER + PRIX TOTAL DES PROD -->
        <div class="col-md-3 col-sm-6">
          <h3>Prix total des produits</h3>
          <label><?php echo $total['SUM(prixunitaireHT_produit)']; ?>€</label>
          <a href="affichecommandeclient.php"><button type="submit">Commander</button></a>
        </div>
    <?php } else { ?>
      <h3>Votre panier est vide</h3>
    <?php } } else { ?>
      <h3><a href="connexion.php">Connectez-vous pour acceder à votre panier !</a></h3>
    <?php } ?>
</article>
</div>
</div>

<?php include './inc/footer.php' ?>
