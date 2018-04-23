<?php
require ('admin/utilisateurs/ajout_utilisateur.php');
require ('admin/utilisateurs/suppr_utilisateur.php');

  //Lire la liste d'utilisateur
  $req = $bdd->prepare('SELECT * FROM utilisateurs ');
  $req->execute();
  // On récupère le resultat
  $result = $req->fetchAll();
?>

<!-- Partie HTML -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

<?php
     if (empty($errors) === false) {
        echo '<ul>';
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger alert-dismissible fade show'> $error
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </div>";
        }
        echo '</ul>';
    } else if (empty($errors1) === false) {
       echo '<ul>';
       foreach ($errors1 as $error1) {
           echo "<div class='alert alert-success alert-dismissible fade show'> $error1
           <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
             <span aria-hidden='true'>&times;</span>
           </div>";
       }
       echo '</ul>';
   }
    ?>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Gestion des utilisateurs</h1>
  </div>


  <div class="table-responsive">

<!-- Si nous avons du contenu dans la table "utilisateur"-->
    <?php
    if($result) {
        // debut du tableau
        echo '<table class="table table-striped table-sm responsive">';
            echo '<thread>';
            // on affiche les titres
            echo '<tr>';

            echo '<th>ID</th>';

            echo '<th>Pseudo</th>';

            echo '<th>Mot de passe</th>';

            echo '<th>Adresse e-mail</th>';

            echo '<th>Grade</th>' ;

            echo '<th>Supression</th>' ;

            echo '</tr>';

            echo '</thread>';

            echo '<tbody>';

        // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.

        foreach($result as $row) {

            echo '<tr>';

            echo '<td>'.$row["id_utilisateur"].'</td>';

            echo '<td>'.$row["pseudo"].'</td>';

          echo '<td>'.$row["mot_de_passe"].'</td>';

            echo '<td>'.$row["adresse_email"].'</td>';

          echo '<td>'.$row["administrateur"].'</td>';

          echo '<td><a href="admin.php?selector=2&top='. $row["id_utilisateur"].'"><button type="submit" class="btn btn-danger btnsuppr">Suppr</button></a></td>';

          echo '</tr>'."\n";

        }
    echo '</tbody>';
        echo '</table>'."\n";
        // fin du tableau.
    }
    //Si il n'y a pas de contenu, alors retourner un message
    else echo 'Pas d\'enregistrements dans cette table...';
    ?>

  </div>

<br>
<hr>

<!-- Ajout d'utilisateur HTML -->
<h3> Ajout d'un utilisateur </h3>

<br>

<form method="post" action="#">
  <div>
    <label for="prenom">Prénom</label>
    <input type="text" name="prenom" class="form-control" id="prenom">
  </div>

  <div>
    <label for="nom">Nom</label>
    <input type="text" name="nom" class="form-control" id="nom">
  </div>

  <div>
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" id="email">
  </div>

  <div>
  <label for="mdp">Mot de passe</label>
  <input type="password" name="mdp" class="form-control" id="mdp">
  </div>

  <div>
  <label for="mdprpt">Confirmation mot de passe</label>
  <input type="password" name="mdprpt" class="form-control" id="mdprpt">
  </div>

  <div>
    <label for="admin">Grade</label>
    <br>
    <select name="admin">
      <option value=""> ----- Choisir ----- </option>
      <option value="1"> Membre </option>
      <option value="2"> Administrateur </option>
    </select>
  </div>

  <br>

  <button type="submit" name="ajout_utilisateur" class="tn btn-lg btn-success buttonlogin">Ajouter</button>
</form>

<br>

</main>
