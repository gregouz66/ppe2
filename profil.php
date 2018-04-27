<?php include ('inc/bdd.php'); ?>

<?php
include ('inc/profil/modiflivr.php');
include ('inc/profil/ajout_adressedefaut.php');

//Trouver le client connecté
$id_client = $_SESSION['id_client'];
$req_client = $bdd->prepare('SELECT * FROM client WHERE id_client = ? LIMIT 1');
$req_client->execute(array($id_client));
// On récupère le resultat
$result_client = $req_client->fetch();

//Trouver l'adresse de livraison par defaut du client connecté
$adrpardef = $bdd->prepare("SELECT * FROM adresseclient WHERE id_client = ? AND adressedefaut_adresseclient = 1 LIMIT 1");
$adrpardef->execute(array($id_client));
$adrexist = $adrpardef->rowCount();
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
            <section id="category-banner-wrapper" class="sect_titre">
              <h1 class="style_titre">Mon compte</h1>
            </section>
            <div class="primary">
              <br>
              <?php if(empty($_GET['adrlivr'])){ ?>
                <div class="row">
                  <div class="col-md-6 col-sm-6" style="border-right: solid;">
                    <h4>Votre adresse email*</h4>
                    <input type="text" placeholder="Adresse email" value="<?php echo $result_client['email_client'] ?>" name="" style="width:90%;">
                    <br>
                    <h4>Votre prénom*</h4>
                    <input type="text" placeholder="Prénom" value="<?php echo $result_client['prenom_client'] ?>" name="" style="width:90%;">
                    <br>
                    <h4>Votre nom*</h4>
                    <input type="text" placeholder="Nom" value="<?php echo $result_client['nom_client'] ?>" name="" style="width:90%;">
                    <br>
                    <h4>Civilité</h4>
                    <input type="text" placeholder="Civilité" value="<?php echo $result_client['civilite'] ?>" name="" style="width:90%;">
                    <br>
                    <h4>Téléphone</h4>
                    <input type="text" placeholder="Téléphone" value="<?php echo $result_client['telephone_client'] ?>" name="" style="width:90%;">
                    <br>
                    <button type="submit" name="">Enregistrer</button>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <?php if($adrexist != 0){
                      // On récupère le resultat
                      $result_adr = $adrpardef->fetch();?>
                      
                      <h4>Adresse de livraison par défaut</h4>
                      <table>
                         <tr>
                             <th>Nom complet</th>
                             <td><?php echo $result_adr['nomcomplet_adresseclient'] ?></td>
                         </tr>
                         <?php if(!empty($result_adr['societe_adresseclient'])){ ?>
                           <tr>
                               <th>Societe(optionel)</th>
                               <td><?php echo $result_adr['societe_adresseclient'] ?></td>
                           </tr>
                         <?php } ?>
                         <tr>
                             <th>Adresse</th>
                             <td><?php echo $result_adr['libelle_adresseclient'] ?></td>
                         </tr>
                         <tr>
                             <th>Pays</th>
                             <td><?php echo $result_adr['pays_adresseclient'] ?></td>
                         </tr>
                         <tr>
                             <th>Etat / Province</th>
                             <td><?php echo $result_adr['etatprovince_adresseclient'] ?></td>
                         </tr>
                         <tr>
                             <th>Ville</th>
                             <td><?php echo $result_adr['ville_adresseclient'] ?></td>
                         </tr>
                         <tr>
                             <th>Code postal</th>
                             <td><?php echo $result_adr['codepostal_adresseclient'] ?></td>
                         </tr>
                      </table>
                      <a href="profil.php?adrlivr=1"><button type="submit">Modifier</button></a>
                    <?php } else { ?>
                      <h4>Vous ne possedez aucune adresse de livraison</h4>
                      <a href="profil.php?adrlivr=1"><button type="submit">En ajouter une</button></a>
                    <?php } ?>
                  </div>
                </div>
              <?php } else {
                if($_GET['adrlivr']==1){
                  if($adrexist != 0){
                    // On récupère le resultat
                    $result_adr = $adrpardef->fetch();?>

                  <h4>Modifier votre adresse de livraison</h4>
                  <form id="form" method="POST" action="#">

                  <label>Nom complet*</label>
                  <input type="text" name="nomcomplet_livr" placeholder="Prenom + Nom" value="<?php echo $result_adr['nomcomplet_adresseclient'] ?>"/>
                  <br>
                  <label>Societe(optionel)</label>
                  <input type="text" name="Societe" placeholder="Société" value="<?php echo $result_adr['societe_adresseclient'] ?>"/>
                  <br>
                  <label>Adresse*</label>
                  <input type="text" name="Adresse" placeholder="Adresse" value="<?php echo $result_adr['libelle_adresseclient'] ?>"/>
                  <br>
                  <label>Pays*</label>
                  <select name="Pays">
                  <option value ="<?php echo $result_adr['pays_adresseclient'] ?>"><?php echo $result_adr['pays_adresseclient'] ?></option>
                  </select>
                  <br>
                  <label>Etat / Province*</label>
                  <select name="etat_province">
                  <option value ="<?php echo $result_adr['etatprovince_adresseclient'] ?>"><?php echo $result_adr['etatprovince_adresseclient'] ?></option>
                  </select>
                  <br>
                  <label>Ville*</label>
                  <input type="text" name="Ville" placeholder="Ville" value="<?php echo $result_adr['ville_adresseclient'] ?>"/>
                  <br>
                  <label>Code Postal*</label>
                  <input type="text" name="Cp" placeholder="Code Postal" value="<?php echo $result_adr['codepostal_adresseclient'] ?>"/>

                  </br>

                  <input style="font-size: 22px;" type="submit" name="modif_livr"/>

                </form>
              <?php } else {?>
                <h4>Ajoutez une adresse de livraison</h4>
                <form id="form" method="POST" action="#">

                <label>Prénom*</label>
                <input type="text" name="Prenom_livr" placeholder="Prenom"/>
                <br>
                <label>Nom*</label>
                <input type="text" name="Nom_livr" placeholder="Nom"/>
                <br>
                <label>Societe(optionel)</label>
                <input type="text" name="Societe" placeholder="Société"/>
                <br>
                <label>Adresse*</label>
                <input type="text" name="Adresse" placeholder="Adresse"/>
                <br>
                <label>Pays*</label>
                <select name="Pays">
                <option value ="France">France</option>
                </select>
                <br>
                <label>Etat / Province*</label>
                <select name="etat_province">
                <option value ="Occitanie">Occitanie</option>
                </select>
                <br>
                <label>Ville*</label>
                <input type="text" name="Ville" placeholder="Ville"/>
                <br>
                <label>Code Postal*</label>
                <input type="text" name="Cp" placeholder="Code Postal"/>

                </br>

                <input style="font-size: 22px;" type="submit" name="ajout_livr"/>

              </form>
              <?php } } else { ?>
                <h4>Une erreur est survenue !</h4>
              <?php } } ?>
            </div>
          </article>
          <!-- FOOTER -->
          <?php include ('inc/footer.php') ?>
