<?php

// Traitement du formulaire s'il a bien été envoyé
if(isset($_POST['ajout_utilisateur'])) {
// Déclaration des variables sécurisées
  $prenom = htmlentities(trim($_POST['prenom']));
  $nom = htmlentities(trim($_POST['nom']));
  $email = htmlentities(trim($_POST['email']));
  $mdp = sha1($_POST['mdp']);
  $mdprpt = sha1($_POST['mdprpt']);
  $grade = htmlentities(trim($_POST['admin']));

  //Convertion maj to min
  $prenom = strtolower($prenom);
  $nom = strtolower($nom);

if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['mdprpt']) AND !empty($_POST['admin'])) {

        $nomaffich = $prenom;
        // Vérification si les deux mdp correspondent
        if ($mdp == $mdprpt) {
          // Vérification e-mail valide ou non
          if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $reqemail = $bdd->prepare("SELECT * FROM client WHERE email_client = ?");
            $reqemail->execute(array($email));
            $mailpris = $reqemail->rowCount();
            // Vérification si e-mail existe
            if($mailpris == 0) {
                //Vérification mdp correspondent
                if($mdp == $mdprpt) {
                  // Détermine date de création
                  date_default_timezone_set('Europe/Madrid');
                  $date = date("Y.m.d");
                  // Création du client dans la bdd
                  $creationmembre = $bdd->prepare("INSERT INTO client(prenom_client, nom_client, nom_affichage, mot_de_passe, email_client, datecreation_client, administrateur) VALUES(?, ?, ?, ?, ?, ?, ?)");
                  $creationmembre->execute(array($prenom, $nom, $nomaffich, $mdp, $email, $date, $grade));
                  $result_inscription = $creationmembre->rowCount();
                  //include ('inc/admin/mailmembres/mailajout.php');
                  if($result_inscription == 1){

                    $errors1[] = "L'utilisateur a été ajouté avec succès !";
                  } else {
                    $errors[] = "Problème lors de l'ajout, réessayez !";
                  }
                } else {
                  $errors[] = "Vos mots de passe ne correspondent pas !";
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
      }
?>
