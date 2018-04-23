<?php
// Traitement du formulaire s'il a bien été envoyé
if(isset($_POST['ajout_produit'])) {
  if(!empty($_GET['ajoutproduit'])) {
  // Déclaration des variables sécurisées
  $name = htmlentities(trim($_POST['name']));
  $prix = htmlentities(trim($_POST['prix']));
  $promo = htmlentities(trim($_POST['promo']));
  $description = htmlentities(trim($_POST['description']));

  //Convertion maj to min
  $name = strtolower($name);
  $description = strtolower($description);
  $linkimg =  $_GET['ajoutproduit'];

  if(!empty($_POST['name']) AND !empty($_POST['prix']) AND !empty($_POST['description']) AND !empty($_POST['categorie']) AND !empty($_POST['marque']) AND !empty($_POST['couleur'])) {
                  //Détermine la Marque
                  $marque = $_POST['marque'];
                  if ($marque == "1") {
                    $marque = "nike";
                  }
                  if ($marque == "2") {
                    $marque = "adidas";
                  }
                  if ($marque == "3") {
                    $marque = "coqsportif";
                  }
                  if ($marque == "4") {
                    $marque = "ralphlauren";
                  }
                  if ($marque == "5") {
                    $marque = "tommyhilfiger";
                  }

                  //Détermine la Categorie
                  $categorie = $_POST['categorie'];
                  if ($categorie == "1") {
                    $categorie = "tshirt";
                  }
                  if ($categorie == "2") {
                    $categorie = "pull";
                  }
                  if ($categorie == "3") {
                    $categorie = "pantalon";
                  }
                  if ($categorie == "4") {
                    $categorie = "jogging";
                  }
                  if ($categorie == "5") {
                    $categorie = "chaussures";
                  }
                  if ($categorie == "6") {
                    $categorie = "cadeaux";
                  }

                  //Détermine la Couleur
                  $couleur = $_POST['couleur'];
                  if ($couleur == "1") {
                    $couleur = "beige";
                  }
                  if ($couleur == "2") {
                    $couleur = "blanc";
                  }
                  if ($couleur == "3") {
                    $couleur = "bleu";
                  }
                  if ($couleur == "4") {
                    $couleur = "gris";
                  }
                  if ($couleur == "5") {
                    $couleur = "jaune";
                  }
                  if ($couleur == "6") {
                    $couleur = "noir";
                  }
                  if ($couleur == "7") {
                    $couleur = "rose";
                  }
                  if ($couleur == "8") {
                    $couleur = "rouge";
                  }
                  if ($couleur == "9") {
                    $couleur = "vert";
                  }

                  //Attribue 0 si promo vide
                  if (empty($promo)){
                    $promo = 0;
                  } else {}

                  //Verifie promo contient seulement des chiffres
                  if (is_numeric($promo)){

                  //Vérifie que le prix et la promo contient seulement des chiffres
                  if (is_numeric($prix)){

                  // Création du produit SANS CODE PRODUIT dans la bdd
                  $creationproduit = $bdd->prepare("INSERT INTO produits(marque_produit, nom_produit, prix_produit, promo_produit, description_produit, couleur_produit, categorie_produit, image_produit) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
                  $creationproduit->execute(array($marque, $name, $prix, $promo, $description, $couleur, $categorie, $linkimg));
                  //Recup ID produit
                  $takeid = $bdd->prepare("SELECT * FROM produits WHERE marque_produit = ? AND nom_produit = ? AND description_produit = ? AND categorie_produit = ? LIMIT 1");
                  $takeid->execute(array($marque, $name, $description, $categorie));
                  $row = $takeid->fetch(PDO::FETCH_ASSOC);
                  $id = $row['id_produit'];

                  //Définit le CODE PRODUIT
                  $lettremarque = $marque[0] . $marque[1] . $marque[2];
                  $lettrecategorie = $categorie[0] . $categorie[1] . $categorie[2];
                  $codeproduit = $lettremarque . $lettrecategorie . $id;
                  $codeproduit = strtoupper($codeproduit);

                  //Ajout du codeP
                  $ajoutcodep = $bdd->prepare("UPDATE produits SET code_produit = ? WHERE id_produit = ? LIMIT 1");
                  $ajoutcodep->execute(array($codeproduit, $id));

                  $errors1[] = "Le produit a été ajouté avec succès !";

                } else {
                  $errors[] = "Le prix ne contient pas que des chiffres !";
                }
                } else {
                  $errors[] = "La promo ne contient pas que des chiffres !";
                }
                } else {
                  $errors[] = "Tous les champs doivent être complétés !";
                }
              } else {
                  $errors[] = "Une image doit avoir été Upload avant l'envoi du formuaire !";
              }
            }
?>
