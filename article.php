<?php include ('inc/bdd.php'); ?>

<?php
// RECUPERATION PRODUIT
  if (isset($_GET['id'])) { //SI UN ID A ETE SELECTIONNE
    $id = $_GET['id'];
    $req = $bdd->prepare('SELECT * FROM produits WHERE id_produit = ? LIMIT 1');
    $req->execute(array($id));

  // On récupère le resultat
  $result = $req->fetchAll();

  // RECUPERATION PHOTOS PRODUITS PAR DEFAUT
  $reqphoto = $bdd->prepare('SELECT photo_produit FROM photoproduit WHERE id_produit = ? AND pardefaut_photoproduit = 1');
  $reqphoto->execute(array($id));
  // On récupère le resultat
  $resultphoto = $reqphoto->fetch();
  $photopardefaut = $resultphoto['photo_produit'];

  $reqavis = $bdd->prepare('SELECT * FROM avis WHERE id_produit = ?');
  $reqavis->execute(array($id));
  $resultavis = $reqavis->fetchAll();




?>

<?php include ("inc/header.php"); ?>
<script src="assets/js/article.js"></script>

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
  <?php ?>
  <div class="lecom">
      <h1>Laissez nous un commentaire :</h1>
      <form class="lecommentaire" action="index.html" method="post">
        <input type="text" name="titre" placeholder="titre du commentaire">
        <div class="vote">
          <span><strong>note : </strong>


            <select class="noteselect" >
  <option value="1"> 1</option>
  <option value="2" >2</option>
  <option value="3">3</option>
  <option value="4" >4</option>
  <option value="5">5</option>

</select>
        </span>
        </div>
        <textarea name="comment" rows="6" cols="80"></textarea>
        <input class ="boutonvalider" type="submit" name="commentez" value="poster"/>
      </form>
  </div>



  <h2>avis et commentaires :</h2></br>
  <div class="commentaires">
  <?php     if($resultavis) {
      foreach($resultavis as $row) {

        $requseravis = $bdd->prepare('SELECT * FROM client WHERE id_client = (SELECT id_client FROM avis WHERE id_client = ?)');
        $requseravis->execute(array($row['id_client']));
        $resultoui = $requseravis->fetch();

    ?>

<div class="comentaire">
  <h3><?php echo $row['titre_avis'] ?></h3>
  <p><strong><?php echo $resultoui['nom_client']?></strong> le <?php echo $row['date_avis'] ?> note : <?php echo $row['note_avis'] ?></p>
<p><?php echo $row['description_avis'] ?></p>

</div>
<?php }} ?>
</div>
</article>
<script text="Javascript" src="./assets/js/article.js">


</script>


<!-- FOOTER -->
<?php include ('inc/footer.php') ?>

<?php }else{echo "error 404 Not Found";} ?>
