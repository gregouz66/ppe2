<?php include ('inc/bdd.php'); ?>

<?php
  if(isset($_SESSION['id_utilisateur'])) {
    header('Location: index.php');
    exit;
  }
?>

<?php
// Traitement du formulaire s'il a bien été envoyé
if(isset($_POST['forminscription'])) {
	// Déclaration des variables sécurisées
  	$prenom = htmlentities(trim($_POST['prenom']));
		$nom = htmlentities(trim($_POST['nom']));
		$email = htmlentities(trim($_POST['email']));
		$mdp = sha1($_POST['mdp']);
		$mdprpt = sha1($_POST['mdprpt']);

    //Convertion maj to min
    $prenom = strtolower($prenom);
    $nom = strtolower($nom);

	if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['mdprpt'])) {

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
  									$creationmembre = $bdd->prepare("INSERT INTO client(prenom_client, nom_client, nom_affichage, mot_de_passe, email_client, datecreation_client) VALUES(?, ?, ?, ?, ?, ?)");
  									$creationmembre->execute(array($prenom, $nom, $nomaffich, $mdp, $email, $date));
                    $result_inscription = $creationmembre->rowCount();

                    if($result_inscription == 1){

      								header( "refresh:3;url=connexion.php" );
    		              $erreur = "<font color='green'>Vous êtes maintenant inscrit ! Redirection en cours...</font>";
                    } else {
                      $erreur = "Un problème est survenue, réessayez !";
                    }

									} else {
										$erreur = "Vos mots de passe ne correspondent pas !";
									}

								} else {
									$erreur = "Votre adresse mail est déjà utilisée !";
								}
							} else {
								$erreur = "Votre adresse e-mail est invalide";
							}
						} else {
							$erreur = "Vos mots de passe ne correspondent pas !";
						}
      		} else {
      			$erreur = "Tous les champs doivent être complétés !";
      		}
      	}
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
                 if(isset($erreur)) {
                    echo '<font color="red">'.$erreur."</font>";
            }
            ?>

            <section id="category-banner-wrapper" class="sect_titre">

              <h1 class="style_titre">Inscrivez-vous</h1>

              <form  method="POST" action="">
              	<fieldset>

                  <table >
                      <tr>
                         <td align="right">
                              <label for="prenom">Prenom :</label>
                          </td>
                       <td>
                              <input type="text" placeholder="prenom" id="prenom" name="prenom" value="" />
                          </td>
                      </tr>
                       <tr>
                          <td align="right">
                              <label for="nom">Nom :</label>
                          </td>
                          <td>
                              <input type="text" placeholder="Votre nom" id="nom" name="nom" value="" />
                          </td>
                      </tr>
                      <tr>

                          <td align="right">
                              <label for="email">Mail :</label>
                          </td>
                          <td>
                              <input type="email" placeholder="Votre mail" id="email" name="email" value="" />
                          </td>
                      </tr>


                      <tr>
                          <td align="right">
                              <label for="mdp">Mot de passe :</label>
                          </td>
                          <td>
                              <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                          </td>
                      </tr>
                      <tr>
                          <td align="right">
                              <label for="mdprpt">Confirmation du mot de passe :</label>
                          </td>
                          <td>
                              <input type="password" placeholder="Confirmez votre mdp" id="mdprpt"  name="mdprpt" />
                          </td>
                      </tr>
                      <tr>
                          <td></td>
                          <td align="center">
                              <br />

                          </td>
                      </tr>
                  </table>
              </fieldset>



                  </table>

                  <input style="color: black!important;" type="submit" name="forminscription" value="Je m'inscris" />
              </form>

            </section>
            <div class="primary">
              <div class="prod">
                <section class="for_phone">


                </section>
              </div>
            </div>
          </article>
          <!-- FOOTER -->
          <?php include ('inc/footer.php') ?>
