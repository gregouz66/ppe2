<?php include ('inc/bdd.php'); ?>

<?php
// RECUPERATION PRODUIT
  if (isset($_GET['id'])) { //SI UN ID A ETE SELECTIONNE
    $id = $_GET['id'];
    $req = $bdd->prepare('SELECT * FROM produits WHERE id_produit = ?');
    $req->execute(array($id));

  // On récupère le resultat
  $result = $req->fetchAll();

  // RECUPERATION PHOTOS PRODUITS PAR DEFAUT
  $reqphoto = $bdd->prepare('SELECT photo_produit FROM photoproduit WHERE id_produit = ? AND pardefaut_photoproduit = 1');
  $reqphoto->execute(array($id));
  // On récupère le resultat
  $resultphoto = $reqphoto->fetch();
  $photopardefaut = $resultphoto['photo_produit'];
?>

<?php include ("inc/header.php"); ?>

<!-- CSS DE LA PAGE -->
<link rel="stylesheet" href="assets/css/article.css" />

<div id="wrapper">

    <div id="main">
        <!-- Main -->
        <article class="post">
      	<!-- div du cadre qui contient image + description + prix de l'article -->
   	<div class="cadre-article">

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

          //Attribue maj au premier mot
          $couleur_prod = ucfirst(strtolower($row['couleur_produit']))?>

   		<!-- div de l'image de l'article selectionner -->
    	<div class="cadre-image-article">
    		<img class="img_article" src="<?php echo $photopardefaut; ?>" alt="image produit">
    	</div>

		<!-- div du nom + description de l'article -->
    	<div class="description-article">
    		<h2><?php echo $marque_prod ?> </br></h2> <h2 class="h2_name">"<?php echo $row['nom_produit']; ?>"</h2></br>

    		<span><?php echo $row['description_produit']; ?></br></span>

        <span><strong>Couleur :</strong> <?php echo $couleur_prod ?></span></br>

        <span><strong>Code du produit :</strong> <?php echo $row['code_produit']; ?></span></br>

    		<span><strong>Made in france</strong></span>
    	</div>

    	<!-- div du prix de l'article -->

        <?php if (!empty($row['promo_produit'])) { ?>
          <div class="prix-article-promo">
          <h4 class="ancien_prix"><?php echo $prix; ?> € </h4>
          <h4 class="prix_promo"><?php echo $promoprix; ?> € </h4>
        <?php } else { ?>
          <div class="prix-article">
          <h4><?php echo $row['prixunitaireHT_produit']; ?> € </h4>
        <?php } ?>

    	</div>

      <?php } } ?>

	</div>
</article>


<!-- FOOTER -->
<?php include ('inc/footer.php') ?>

<?php }else{echo "error 404 Not Found";} ?>
