<?php
// Traitement du formulaire s'il a bien été envoyé
if(isset($_POST['edit_produit'])) {
  // Déclaration des variables sécurisées
  $name = htmlentities(trim($_POST['name']));
  $prix = htmlentities(trim($_POST['prix']));
  $promo = htmlentities(trim($_POST['promo']));
  $description = htmlentities(trim($_POST['description']));
  $marque = htmlentities(trim($_POST['marque']));
  $categorie = htmlentities(trim($_POST['categorie']));
  $couleur = htmlentities(trim($_POST['couleur']));

  //Convertion maj to min
  $name = strtolower($name);
  $description = strtolower($description);

if(!empty($_POST['name']) AND !empty($_POST['prix']) AND !empty($_POST['description']) AND !empty($_POST['categorie']) AND !empty($_POST['marque']) AND !empty($_POST['couleur'])) {

                  //Attribue 0 si promo vide
                  if (empty($promo)){
                    $promo = 0;
                  } else {}

                  //Verifie promo contient seulement des chiffres
                  if (is_numeric($promo)){

                  //Vérifie que le prix et la promo contient seulement des chiffres
                  if (is_numeric($prix)){

									//Définit le CODE PRODUIT
	                $lettremarque = $marque[0] . $marque[1] . $marque[2];
	                $lettrecategorie = $categorie[0] . $categorie[1] . $categorie[2];
	                $codeproduit = $lettremarque . $lettrecategorie . $idproduit;
	                $codeproduit = strtoupper($codeproduit);

									//Ajout de la fiche produit du produit en question dans bdd
							    $edit = $bdd->prepare("UPDATE produits set code_produit = ?, libelle_marque = ?, nom_produit = ?, prixunitaireHT_produit = ?, promo_produit = ?, couleur_produit = ?, description_produit = ?, libelle_categorie = ? WHERE id_produit = ? LIMIT 1");
							    $edit->execute(array($codeproduit, $marque, $name, $prix, $promo, $couleur, $description, $categorie, $idproduit));
                  $edit_result = $edit->rowCount();

                  if($edit_result == 1){
                    $errors1[] = "Le produit a été ajouté avec succès !";
                  } else {
                    $errors[] = "Erreur lors de l'ajout !";
                  }

                } else {
                  $errors[] = "Le prix ne contient pas que des chiffres !";
                }
                } else {
                  $errors[] = "La promo ne contient pas que des chiffres !";
                }
                } else {
                  $errors[] = "Tous les champs doivent être complétés !";
                }
            }
?>
