<?php
//Formulaire infos livraisons
if (isset($_POST['ajout_livr'])){
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
        header('Location: profil.php');
        $errors1[] = "L'adresse de livraison a été ajouté par defaut avec succès !";
      } else {
        $errors[] = "Erreur lors de l'ajout de l'adresse de livraison !";
      }
    } else {
      $errors[] = "Le code postal doit contenir 5 chiffres et/ou doit contenir seulement des chiffres !";
    }
  } else {
    $errors[] = "Les champs obligatoires doivent être remplis !";
  }
} ?>
