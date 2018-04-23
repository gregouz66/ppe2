<?php if($result) {
  foreach($result as $row) {

    if (!empty($row['promo_produit'])) {
      //Attribue le prix avec réduction
      $promo = str_replace(".",",",$row['promo_produit']);
      $prix = str_replace(".",",",$row['prixunitaireHT_produit']);
      $promoeuro = $prix * $promo / 100;
      $promoprix = $prix - $promoeuro;
      $promoprix = str_replace(",",".",$promoprix);
    }

    //Attribuer le value des marque
    $marque_prod = $row['libelle_marque'];
    if ($marque_prod == "nike"){
      $marque_prod = "Nike";
    } else if ($marque_prod == "adidas"){
      $marque_prod = "Adidas";
    } else if ($marque_prod == "coqsportif"){
      $marque_prod = "Coq Sportif";
    } else if ($marque_prod == "ralphlauren"){
      $marque_prod = "Ralph Lauren";
    } else if ($marque_prod == "tommyhilfiger") {
      $marque_prod = "Tommy Hilfiger";
    }

    //Lire la liste des photos du produit
    $req2 = $bdd->prepare('SELECT * FROM photoproduit WHERE id_produit = ? AND pardefaut_photoproduit = 1 LIMIT 1');
    $req2->execute(array($row["id_produit"]));
    // On récupère le resultat
    $photo = $req2->fetch();
    $photodefaut = $photo['photo_produit'];



    //Attribue maj au premier mot
    $couleur_prod = ucfirst(strtolower($row['couleur_produit']))?>

<article id="product-9307520" data-auto-id="productTile" class="art_prod">
  <a class="a_prod" href="article.php?id=<?php echo $row["id_produit"];?>" aria-label="Original Penguin - Veste color block ajustée à enfiler - Bleu marine">
    <div class="div_img_prod">
      <img data-auto-id="productTileImage" class="zoom" src="<?php echo $photodefaut; ?>" sizes="(min-width: 1366px) 300px, (min-width: 768px) 220px, 142px" srcset="" alt="Original Penguin - Veste color block ajustée à enfiler - Bleu marine">
    </div>
    <div data-auto-id="" class="titre_prod1">
      <div class="titre_prod2">
        <div>
          <p><?php echo $marque_prod ?> - <?php echo $row['nom_produit']; ?> - <?php echo $couleur_prod ?> <?php echo $row['code_produit']; ?></p>
        </div>
      </div>
    </div>
    <p class="prix_style1">
      <?php if (!empty($row['promo_produit'])) { ?>
        <span class="prix_style2 ancienprix" data-auto-id=""><?php echo $prix; ?> € </span>
        <span class="prix_style2 prixpromo" data-auto-id=""><?php echo $promoprix; ?> € </span>
      <?php } else { ?>
        <span class="prix_style2" data-auto-id=""><?php echo $row['prixunitaireHT_produit']; ?> € </span>
      <?php } ?>
    </p>
  </a>
  <button type="button" data-auto-id="" data-auto-state="inactive" class="button_fav" aria-label="Sauvegarder">
    <span class="icon_fav" data-feather="heart"></span>
  </button>
</article>
<?php } } ?>
