<?php include ('inc/bdd.php'); ?>

<?php
// REQUETE POUR SAVOIR SI LE CLIENT A UNE ADRESSE PAR DEFAUT
$id_client = $_SESSION['id_client'];
$adrpardef = $bdd->prepare("SELECT * FROM adresseclient WHERE id_client = ? AND adressedefaut_adresseclient = 1 LIMIT 1");
$adrpardef->execute(array($id_client));
$adrexist = $adrpardef->rowCount();

//Formulaire infos livraisons
if (isset($_POST['valider'])){
  $id_client = $_SESSION['id_client'];
  $Adresse=htmlentities(trim($_POST['Adresse']));
  $Prenom_livr=htmlentities(trim($_POST['Prenom_livr']));
  $Nom_livr=htmlentities(trim($_POST['Nom_livr']));
  $Societe=htmlentities(trim($_POST['Societe'])); //PAS OBLIGATOIRE
  $CP=htmlentities(trim($_POST['Cp']));
  $etat_prov=htmlentities(trim($_POST['etat_province']));
  $Ville=htmlentities(trim($_POST['Ville']));
  $Pays=htmlentities(trim($_POST['Pays']));
  $adr_defaut = 1;

  $nomcomplet_client = $Prenom_livr . ' ' . $Nom_livr; //Réuni prenom + nom

  if(!empty($_POST['Adresse']) AND !empty($_POST['Prenom_livr']) AND !empty($_POST['Nom_livr']) AND !empty($_POST['Cp']) AND !empty($_POST['etat_province']) AND !empty($_POST['Ville']) AND !empty($_POST['Pays'])) {

    //Verifie code postal contient 5 chiffres ET seulement des chiffres
    $verif_CP = strlen($CP);
    if(is_numeric($CP) AND $verif_CP==5){

      // // Création adresse livraison du client anonyme
      $AdresseLivraison = $bdd->prepare("INSERT INTO adresseclient(id_client,libelle_adresseclient,nomcomplet_adresseclient,societe_adresseclient,codepostal_adresseclient,etatprovince_adresseclient,ville_adresseclient,pays_adresseclient,adressedefaut_adresseclient) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $AdresseLivraison->execute(array($id_client, $Adresse, $nomcomplet_client, $Societe, $CP, $etat_prov, $Ville, $Pays, $adr_defaut));
      $result_livr = $AdresseLivraison->rowCount();

      if($result_livr == 1){
        $errors1[] = "L'adresse de livraison a été ajouté par defaut avec succès !";
      } else {
        $errors[] = "Erreur lors de l'ajout de l'adresse de livraison !";
        var_dump($AdresseLivraison->errorInfo());
      }
    } else {
      $errors[] = "Le code postal doit contenir 5 chiffres et/ou doit contenir seulement des chiffres !";
    }
  } else {
    $errors[] = "Les champs obligatoires doivent être remplis !";
  }
}
?>

<?php include './inc/header.php' ?>

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

    <h1>Votre Commande</h1>

    <h3>Compte</h3>

      <label>Mail*</label>
      <input type="text" name="Mail" placeholder="mail" value="<?php echo $_SESSION['email_client'] ?>" disabled/>

      <label>Prenom*</label>
      <input type="text" name="Prenom" placeholder="Prenom" value="<?php echo $_SESSION['prenom_client'] ?>" disabled/>

      <label>Nom*</label>
      <input type="text" name="Nom" placeholder="Nom" value="<?php echo $_SESSION['nom_client'] ?>" disabled/>

      <br>

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

      <label>Nom complet</label>
      <input type="text" name="Prenom_livr" value="<?php echo $row['nomcomplet_adresseclient'] ?>" disabled/>

      <label>Societe</label>
      <input type="text" name="Societe" value="<?php echo $row['societe_adresseclient'] ?>" disabled/>

      <label>Adresse</label>
      <input type="text" name="Adresse" value="<?php echo $row['libelle_adresseclient'] ?>" disabled/>

      <label>Pays</label>
      <select name="Pays" disabled>
      <option><?php echo $row['pays_adresseclient'] ?></option>
      </select>

      <label>Etat / Province</label>
      <select name="etat_province" disabled>
      <option><?php echo $row['etatprovince_adresseclient'] ?></option>
      </select>

      <label>Ville</label>
      <input type="text" name="Ville" value="<?php echo $row['ville_adresseclient'] ?>" disabled/>

      <label>Code Postal</label>
      <input type="text" name="Cp" value="<?php echo $row['codepostal_adresseclient'] ?>" disabled/>

      <br>

      <a href='#'>Changer d'adresse de livraison par défaut</a>

    <?php } } ?>

</article>
</div>
</div>

<?php include './inc/footer.php' ?>
