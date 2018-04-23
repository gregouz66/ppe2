<?php include ('inc/bdd.php'); ?>

<?php
  if(isset($_SESSION['id_utilisateur'])) {
    header('Location: index.php');
    exit;
  }
?>

<?php
if(isset($_POST['connexion'])) {
   $mail = htmlspecialchars($_POST['email']);
   $mdp = sha1($_POST['mdp']);
   if(!empty($mail) AND !empty($mdp)) {
      $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE adresse_email = ? AND mot_de_passe = ?");
      $req->execute(array($mail, $mdp));
      $userexiste = $req->rowCount();
      if($userexiste == 1) {
         $userinfo = $req->fetch();
         $_SESSION['id_utilisateur'] = $userinfo['id_utilisateur'];
         header( "refresh:3;url=index.php" );
         $erreur = "<font color='green'>Vous êtes maintenant connecté ! Redirection en cours...</font>";
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   }else {
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

              <h1 class="style_titre">Connectez-vous</h1>

              <form  method="POST" action="#">
                <fieldset>

                  <table >

                      <tr>

                          <td align="right">
                              <label for="email">Mail :</label>
                          </td>
                          <td>
                              <input type="email" placeholder="Votre mail" id="email" name="email" value="<?php if(isset($mail)) { echo $mail; } ?>" />
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
                          <td></td>
                          <td align="center">
                              <br />

                          </td>
                      </tr>
                  </table>
              </fieldset>



                  </table>

                  <input style="color: black!important;" type="submit" name="connexion" value="Se connecter " />
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
