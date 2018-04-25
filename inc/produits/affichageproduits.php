<?php if($result) {
  foreach($result as $row) {

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
        <span class="prix_style2 ancienprix" data-auto-id=""><?php echo $row['prixdepartHT_produit']; ?> € </span>
        <span class="prix_style2 prixpromo" data-auto-id=""><?php echo $row['prixunitaireHT_produit']; ?> € </span>
      <?php } else { ?>
        <span class="prix_style2" data-auto-id=""><?php echo $row['prixunitaireHT_produit']; ?> € </span>
      <?php } ?>
    </p>
  </a>
  <button type="button" onclick="ajout_panier()" class="button_fav" aria-label="Ajouter au panier">
    <span class="span_icon_header">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path fill="black" fill-rule="nonzero" d="M18 17.987V7H2v11l16-.013zM4.077 5A5.996 5.996 0 0 1 10 0c2.973 0 5.562 2.162 6.038 5H20v14.986L0 20V5h4.077zm9.902-.005C13.531 3.275 11.86 2 10 2 8.153 2 6.604 3.294 6.144 4.995c.92 0 7.654.03 7.835 0z"></path>
      </svg>
    </span>
    <span class="span_panier_icon_header"></span>
  </button>
</article>

<!-- SCRIPT POUR AJOUT DANS PANIER -->
<script>
function ajout_panier()
{
  <?php
  $idproduit = $row['id_produit'];
  $idclient = $_SESSION['id_client'];

  // Vérif si le produit existe deja dans le panier
  $exist_panier = $bdd->prepare('SELECT * FROM panier WHERE id_client = ? AND id_produit = ? LIMIT 1');
  $exist_panier->execute(array($idclient,$idproduit));
  $result_exist_panier = $exist_panier->rowCount();

  if($result_exist_panier == 0){

  // Ajout du produit dans panier du client
  $ajout_panier = $bdd->prepare("INSERT INTO panier(id_client, id_produit) VALUES(?, ?)");
  $ajout_panier->execute(array($idclient,$idproduit));
  $result_ajout_panier = $ajout_panier->rowCount();

  if($result_ajout_panier == 1){ ?>
    alert('Produit ajouté au panier');
  <?php } else { ?>
    alert('Problème lors de l\'ajout au panier');
  <?php } } else {?>
    alert('Ce produit est déjà dans votre panier !');
    <?php } ?>
}
</script>


<?php } } ?>
