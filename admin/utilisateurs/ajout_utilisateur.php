<?php

// Traitement du formulaire s'il a bien été envoyé
if(isset($_POST['ajout_utilisateur'])) {
// Déclaration des variables sécurisées
  $prenom = htmlentities(trim($_POST['prenom']));
  $nom = htmlentities(trim($_POST['nom']));
  $email = htmlentities(trim($_POST['email']));
  $mdp = sha1($_POST['mdp']);
  $mdprpt = sha1($_POST['mdprpt']);

  //Convertion maj to min
  $prenom = strtolower($prenom);
  $nom = strtolower($nom);

if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['mdprpt']) AND !empty($_POST['admin'])) {
        // Vérification si les deux mdp correspondent
        if ($mdp == $mdprpt) {
          // Vérification e-mail valide ou non
          if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $reqemail = $bdd->prepare("SELECT * FROM utilisateurs WHERE adresse_email = ?");
            $reqemail->execute(array($email));
            $mailpris = $reqemail->rowCount();
            // Vérification si e-mail existe
            if($mailpris == 0) {
              //Définit le pseudo
              $plettre = $prenom[0];
              $pseudo = $plettre . "." . $nom;
              // Vérification si pseudo existe
              $reqpseudo = $bdd->prepare("SELECT * FROM utilisateurs WHERE pseudo = ?");
              $reqpseudo->execute(array($pseudo));
              $pseudopris = $reqpseudo->rowCount();
              if($pseudopris == 0) {
                //Vérification mdp correspondent
                if($mdp == $mdprpt) {
                  //Détermine le Grade
                  $grade = $_POST['admin'];
                  if ($grade == "1") {
                    $grade = "0";
                  }
                  if ($grade == "2") {
                    $grade = "1";
                  }
                  // Création du client dans la bdd
                  $creationmembre = $bdd->prepare("INSERT INTO utilisateurs(pseudo, prenom_utilisateur, nom_utilisateur, mot_de_passe, adresse_email, administrateur) VALUES(?, ?, ?, ?, ?, ?)");
                  $creationmembre->execute(array($pseudo, $prenom, $nom, $mdp, $email, $grade));
                  //include ('inc/admin/mailmembres/mailajout.php');
                  $errors1[] = "L'utilisateur a été ajouté avec succès !";
                    } else {
                      $errors[] = "Vos mots de passe ne correspondent pas !";
                    }
                  } else {
                      $errors[] = "Votre pseudo est déjà utilisé !";
                  }
                } else {
                  $errors[] = "Votre adresse mail est déjà utilisée !";
                }
              } else {
                $errors[] = "Votre adresse e-mail est invalide";
              }
            } else {
              $errors[] = "Vos mots de passe ne correspondent pas !";
            }
          } else {
            $errors[] = "Tous les champs doivent être complétés !";
          }
        } else {

        }
?>
