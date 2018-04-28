<?php
// Traitement du formulaire s'il a bien été envoyé
if(isset($_POST['ajout_produit'])) {
  if(!empty($_GET['ajoutproduit'])) {
  // Déclaration des variables sécurisées
  $name = htmlentities(trim($_POST['name']));
  $prix = htmlentities(trim($_POST['prix']));
  $promo = htmlentities(trim($_POST['promo']));
  $description = htmlentities(trim($_POST['description']));
  $marque = htmlentities(trim($_POST['marque']));
  $categorie = htmlentities(trim($_POST['categorie']));
  $couleur = htmlentities(trim($_POST['couleur']));
  $quantite = htmlentities(trim($_POST['quantite']));


  //Convertion maj to min
  $name = strtolower($name);
  $description = strtolower($description);
  $linkimg =  $_GET['ajoutproduit'];

  if(!empty($_POST['name']) AND !empty($_POST['prix']) AND !empty($_POST['description']) AND !empty($_POST['categorie']) AND !empty($_POST['marque']) AND !empty($_POST['quantite']) AND !empty($_POST['couleur'])) {

                  //Attribue 0 si promo vide
                  if (empty($promo)){
                    $promo = 0;
                  } else {}

                  //Verifie quantité contient seulement des chiffres
                  if (is_numeric($quantite)){

                  //Verifie promo contient seulement des chiffres
                  if (is_numeric($promo)){

                  //Vérifie que le prix et la promo contient seulement des chiffres
                  if (is_numeric($prix)){

                  $prixdepart = $prix;
                  $reduc = $prix*$promo/100;
                  $prixfinal = $prix-$reduc;
                  // Création du produit SANS CODE PRODUIT dans la bdd
                  $creationproduit = $bdd->prepare("INSERT INTO produits(libelle_marque, quantite_produit, nom_produit, prixdepartHT_produit, prixunitaireHT_produit, promo_produit, description_produit, couleur_produit, libelle_categorie) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
                  $creationproduit->execute(array($marque, $quantite, $name,$prixdepart , $prixfinal, $promo, $description, $couleur, $categorie));
                  $creationprod = $creationproduit->rowCount();

                  if($creationprod == 1){

                  //Recup ID produit
                  $takeid = $bdd->query('SELECT id_produit FROM produits ORDER BY id_produit DESC LIMIT 0, 1');
                  $recupid = $takeid->rowCount();

                  if($recupid == 1){
                  $row = $takeid->fetch(PDO::FETCH_ASSOC);
                  var_dump($row);
                  $id = $row['id_produit'];

                  // Création de l'image du produit dans BDD
                  $creationimage = $bdd->prepare("INSERT INTO photoproduit(photo_produit, id_produit, pardefaut_photoproduit) VALUES(?, ?, ?)");
                  $creationimage->execute(array($linkimg, $id, 1));
                  var_dump($creationimage->errorInfo());
                  $creationimg = $creationimage->rowCount();

                  if($creationimg == 1){

                  //Définit le CODE PRODUIT
                  $lettremarque = $marque[0] . $marque[1] . $marque[2];
                  $lettrecategorie = $categorie[0] . $categorie[1] . $categorie[2];
                  $codeproduit = $lettremarque . $lettrecategorie . $id;
                  $codeproduit = strtoupper($codeproduit);

                  //Ajout du codeP
                  $ajoutcodep = $bdd->prepare("UPDATE produits SET code_produit = ? WHERE id_produit = ? LIMIT 1");
                  $ajoutcodep->execute(array($codeproduit, $id));
                  $result_codep = $ajoutcodep->rowCount();

                  if($result_codep == 1){

                  $errors1[] = "Le produit a été ajouté avec succès !";

                } else {
                  $errors[] = "Erreur lors de l'ajout du code produit !";
                  // SUPPR
                  $deleteprod = $bdd->prepare("DELETE FROM produits WHERE id_produit = ? LIMIT 1");
                  $deleteprod->execute(array($id));
                }
                } else {
                  $errors[] = "Erreur lors de la création de l'image !";
                  // SUPPR
                  $deleteprod = $bdd->prepare("DELETE FROM produits WHERE id_produit = ? LIMIT 1");
                  $deleteprod->execute(array($id));
                }
                } else {
                  $errors[] = "Erreur lors de la récupération de l'id !";
                }
                } else {
                  $errors[] = "Erreur lors de la création du produit !";
                  var_dump($creationproduit->errorInfo());
                }
                } else {
                  $errors[] = "Le prix ne contient pas que des chiffres !";
                }
                } else {
                  $errors[] = "La promo ne contient pas que des chiffres !";
                }
                } else {
                  $errors[] = "La quantité ne contient pas que des chiffres !";
                }
                } else {
                  $errors[] = "Tous les champs doivent être complétés !";
                }
              } else {
                  $errors[] = "Une image doit avoir été Upload avant l'envoi du formuaire !";
              }
            }
?>
