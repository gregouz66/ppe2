<?php include ('inc/bdd.php'); ?>

<?php
if(isset($_SESSION['id_client'])){

  $id_client = $_SESSION['id_client'];
  $verifpanier = $bdd->prepare("SELECT * FROM panier WHERE id_client = ?");
  $verifpanier->execute(array($id_client));
  $panierexist = $verifpanier->rowCount();

  if($panierexist != 0){ //Si le panier n'est pas vide

    //Formulaire infos livraisons
    include ('inc/commandes/ajout_adressedefaut.php');
    include ('inc/commandes/suppr_adressedefaut.php');
    include ('inc/commandes/achat_gratuit.php');

    // REQUETE POUR SAVOIR SI LE CLIENT A UNE ADRESSE PAR DEFAUT

    $adrpardef = $bdd->prepare("SELECT * FROM adresseclient WHERE id_client = ? AND adressedefaut_adresseclient = 1 LIMIT 1");
    $adrpardef->execute(array($id_client));
    $adrexist = $adrpardef->rowCount();
  }
}
?>

<?php include './inc/header.php' ?>
<link rel="stylesheet" href="assets/css/commandes.css" />

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

      <?php if(isset($_SESSION['id_client'])){
      if($panierexist != 0){ //Si le panier n'est pas vide
      if($adrexist == 1) { ?>
      <div class="row">
        <div class="col-md-6 col-sm-6" style="border-right: solid;">
        <?php } ?>

          <h3>Adresse de livraison</h3>

          <!-- SI LE CLIENT N'A AUCUNE ADRESSE PAR DEFAUT EXISTANTE ALORS IL PEUT EN CREER UNE -->
          <?php if($adrexist == 0) { ?>

            <form id="form" method="POST" action="#">

            <label>Prenom*</label>
            <input type="text" name="Prenom_livr" placeholder="Prenom"/>

            <label>Nom*</label>
            <input type="text" name="Nom_livr" placeholder="Nom"/>

            <label>Societe(optionel)</label>
            <input type="text" name="Societe" placeholder="Société"/>

            <label>Adresse*</label>
            <input type="text" name="Adresse" placeholder="Adresse"/>

            <label>Pays*</label>
            <select name="Pays">
            <option value ="France">France</option>
            </select>

            <label>Etat / Province*</label>
            <select name="etat_province">
            <option value ="Occitanie">Occitanie</option>
            </select>

            <label>Ville*</label>
            <input type="text" name="Ville" placeholder="Ville"/>

            <label>Code Postal*</label>
            <input type="text" name="Cp" placeholder="Code Postal"/>

            </br>

            <input style="font-size: 22px;" type="submit" name="valider"/>

          </form>

        <?php } else {
          $fetchall_adrpardef = $adrpardef->fetchAll();
          foreach($fetchall_adrpardef as $row) { ?> <!--SI LE CLIENT POSSEDE DEJA UNE ADRESSE PAR DEFAUT ALORS LES INFOS S'AFFICHES-->

            <div class="col-md-6 col-sm-6" style="float: left;">

              <label><?php echo $row['nomcomplet_adresseclient'] ?></label>

              <?php if($row['societe_adresseclient'] != ""){?>
              <label><?php echo $row['societe_adresseclient'] ?></label>
              <?php } ?>

              <label><?php echo $row['libelle_adresseclient'] ?></label>

              <label><?php echo $row['pays_adresseclient'] ?></label>

              <label><?php echo $row['etatprovince_adresseclient'] ?></label>

              <label><?php echo $row['ville_adresseclient'] ?></label>

              <label><?php echo $row['codepostal_adresseclient'] ?></label>
            </div>

            <div class="col-md-6 col-sm-6" style="float: left;">
              <form id="form" method="POST" action="#">
                <button type="submit" name="suppr">Supprimer</button>
              </form>
            </div>


        <?php } ?>
      </div>
      <div class="col-md-6 col-sm-6">

        <h3>Option de livraison</h3>

        <form id="form" method="POST" action="#">
          <input type="radio" class="" name="option_livr" value="Standard" checked/> <label>Livraison Standard (GRATUIT)</label>
          <br>
          <input type="radio" class="" name="option_livr" value="24h"/> <label>Livraison 24h (10€)</label>

      </div>
    </div>

    <hr>

    <div class="row">
      <div class="col-md-3 col-sm-6" style="border-right: solid; padding-right: 15px;">
        <h3>Paiement</h3>
        <div class="payment-methods">
          <ul>
            <li>
              <button class="btn secondary payment-method card" style="background-image: url(&quot;https://assets.asosservices.com/asos-finance/images/paymentmethods/card.png&quot;);" disabled>Ajouter une carte de crédit/débit</button>
              <label>Ou</label>
            </li>
            <li>
              <button class="btn secondary payment-method payPal" style="background-image: url(&quot;https://assets.asosservices.com/asos-finance/images/paymentmethods/paypal.png&quot;);" disabled>PayPal</button>
              <label>Ou</label>
            </li>
            <li>
                <button name="achat_gratuit" class="btn secondary payment-method payPal" style="background-image: url(&quot;images/gratuit.png&quot;);">GRATUIT</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-9 col-sm-6">
        <h3>Nous acceptons :</h3>
        <img alt="" src="https://assets.asosservices.com/asos-finance/images/marketing/fr/single.png">
      </div>
    </div>
  <?php } } else { //SI LE PANIER EST VIDE ?>
    <h3><a href="nouveaute.php">Vous ne pouvez pas commander si votre panier est vide !</a></h3>
  <?php } } else { //SI L'UTILISATEUR N'EST PAS CO ?>
    <h3><a href="connexion.php">Connectez-vous pour acceder à cette page !</a></h3>
  <?php } ?>

</article>
</div>
</div>

<?php include './inc/footer.php' ?>
