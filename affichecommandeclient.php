
<?php include ('inc/bdd.php'); ?>
<?php
         // info client
if (isset($_POST['valider'])){
  //adresse livraison
  $Prenom_livr=htmlentities(trim($_POST['Prenom_livr']));
  $Nom_livr=htmlentities(trim($_POST['Nom_livr']));
  $Adresse=htmlentities(trim($_POST['Adresse']));
  $Societe=htmlentities(trim($_POST['Societe'])); //PAS OBLIGATOIRE
  $CP=htmlentities(trim($_POST['Cp']));
  $Ville=htmlentities(trim($_POST['Ville']));
  $Pays=htmlentities(trim($_POST['Pays']));
  $etat_prov=htmlentities(trim($_POST['etat_province']));
  $adr_defaut = 1;

  $nomcomplet_client = $Prenom_livr . ' ' . $Nom_livr;

  // Création adresse livraison du client anonyme
  $AdresseLivraison = $bdd->prepare("INSERT INTO Commandeanonymes(Titre,Mail,Prenom,Nom,Date,Prenom2,Nom2,Societe,adresse,Cp,Ville,Pays,Tel) VALUES(?, ?, ?,?,?,?, ?, ?,?,?,?,?,?)");
  $AdresseLivraison->execute(array($Titre, $Mail, $Prenom,$Nom,$Date,$Prenom2, $Nom2 , $Societe,$Adresse,$CP,$Ville,$Pays,$Tel));
}
?>

<?php include './inc/header.php' ?>

<article class="post">
  <div id="wrapper">
  <body>

  <div id="main">
    <h1>Votre Commande</h1>

    <h3>Compte</h3>

    <form id="form" method="POST" action="#">

      <label>Mail</label>
      <input type="text" name="Mail" placeholder="mail" value="<?php echo $_SESSION['email_client'] ?>" disabled/>

      <label>Prenom</label>
      <input type="text" name="Prenom" placeholder="Prenom" value="<?php echo $_SESSION['prenom_client'] ?>" disabled/>

      <label>Nom</label>
      <input type="text" name="Nom" placeholder="Nom" value="<?php echo $_SESSION['nom_client'] ?>" disabled/>

      <br>

      <h3>Adresse de livraison</h3>

      <label>Prenom</label>
      <input type="text" name="Prenom_livr" placeholder="Prenom"/>

      <label>Nom</label>
      <input type="text" name="Nom_livr" placeholder="Nom"/>

      <label>Societe(optionel)</label>
      <input type="text" name="Societe" placeholder="Société"/>

      <label>Adresse</label>
      <input type="text" name="Adresse" placeholder="Adresse"/>

      <label>Pays</label>
      <select name="Pays">
      <option value ="France">France</option>
      <option value ="Canada">Canada</option>
      </select>

      <label>Etat / Province</label>
      <input type="text" name="etat_province" placeholder="Etat / Province"/>

      <label>Ville</label>
      <input type="text" name="Ville" placeholder="Ville"/>

      <label>Code Postal</label>
      <input type="text" name="Cp" placeholder="Code Postal"/>

      </br>

      <input style="font-size: 22px;" type="submit" name="valider"/>

    </form>

  </div>
</article>

</body>

</html>
