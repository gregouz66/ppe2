<?php
$linkpdp = "";
require ('admin/produits/ajout_produit.php');
require ('admin/produits/modif_produit.php');
require ('admin/produits/suppr_produit.php');
require ('admin/produits/ajout_image.php');

//Lire la liste de produit
$req = $bdd->prepare('SELECT * FROM produits ');
$req->execute();
// On récupère le resultat
$result = $req->fetchAll();
?>

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
    <h1 class="h2">Gestion des produits</h1>
  </div>


  <div class="table-responsive">
    <?php
    if($result) {
        // debut du tableau
        echo '<table class="table table-striped table-sm">';
            echo '<thread>';
            // on affiche les titres
            echo '<tr>';

            echo '<th>ID</th>';

						echo '<th>Code produit</th>';

						echo '<th>Marque</th>';

            echo '<th>Nom du produit</th>';

            echo '<th>Prix (€)</th>';

						echo '<th>Promo (%)</th>';

						echo '<th>Couleur</th>';

            echo '<th>Catégorie</th>';

            echo '<th>Modifier</th>' ;

            echo '<th>Supression</th>' ;

        // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.

        foreach($result as $row) {

            echo '<tr>';

            echo '<td>'.$row["id_produit"].'</td>';

						echo '<td>'.$row["code_produit"].'</td>';

						echo '<td>'.strtoupper($row["libelle_marque"]).'</td>';

            echo '<td>'.$row["nom_produit"].'</td>';

            echo '<td>'.$row["prixunitaireHT_produit"].'</td>';

						echo '<td>'.$row["promo_produit"].'</td>';

						echo '<td>'.strtoupper($row["couleur_produit"]).'</td>';

            echo '<td>'.strtoupper($row['libelle_categorie']).'</td>';

            echo '<td><a href="admin.php?selector=5&modif='. $row["id_produit"].'"><button type="submit" class="btn btn-warning btnsuppr">Modif</button></a></td>';

            echo '<td><a href="admin.php?selector=3&top='. $row["id_produit"].'"><button type="submit" class="btn btn-danger btnsuppr">Suppr</button></a></td>';

            echo '</tr>';

        }
            echo '</tbody>';
            echo '</table>';
            // fin du tableau.
    }
    else echo 'Pas d\'enregistrements dans cette table...';
    ?>
  </div>

  <br>
  <hr>

  <!-- Ajout d'un produit HTML -->
  <h3> Ajout d'un produit </h3>

  <br>
  <h4> Première étape : </h4>

  <form  method="post" enctype="multipart/form-data" action="#">
      <div>
        <label for="pdp">Ajouter une photo (max. 0.5Mo)</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="530000">
        <input class="form-control" type="file" name="avatar" id="image">
      </div>
      <br>
      <p> Votre image téléchargée est : <b>
        <?php if ($linkpdp != ""){
        echo $fichier;
      }else { echo "Aucune";
      } ?> </b>
      </p>
      <button type="submit" value="Envoyer le fichier" class="btn btn-primary" name="envoyer">Upload</button>
    </form>

    <br>
    <hr>
    <h4> Deuxième étape : </h4>

  <form method="post" action="admin.php?selector=3&&ajoutproduit=<?php echo $linkpdp ?>">
		<div>
			<label for="categorie">*Catégorie</label>
			<br>
			<select name="categorie">
		<option value=""> ----- Choisir ----- </option>
		<option value="1"> Tee-shirt </option>
		<option value="2"> Pull </option>
		<option value="3"> Pantalon </option>
		<option value="4"> Jogging </option>
		<option value="5"> Chaussures </option>
		<option value="6"> Cadeaux </option>
		</select>
		</div>

		<br>

		<div>
			<label for="marque">*Marque</label>
			<br>
			<select name="marque">
		<option value=""> ----- Choisir ----- </option>
		<option value="1"> Nike </option>
		<option value="2"> Adidas </option>
		<option value="3"> Coq Sportif </option>
		<option value="4"> Ralph Lauren </option>
		<option value="5"> Tommy hilfiger </option>
		</select>
		</div>

		<br>

    <div>
      <label for="name">*Nom du produit</label>
      <input type="text" name="name" maxlength="255" class="form-control" id="name">
    </div>

    <div>
      <label for="prix">*Prix (€)</label>
      <input type="text" name="prix" class="form-control" id="prix">
    </div>

		<div>
      <label for="promo">Promo (%)</label>
      <input type="text" name="promo" class="form-control" id="promo">
    </div>

    <div>
      <label for="description">*Description (max. 255)</label>
      <textarea type="text" name="description" maxlength="255" class="form-control" id="Description"></textarea>
    </div>

		<div>
	    <label for="couleur">*Couleur</label>
	    <br>
	    <select name="couleur">
	  <option value=""> ----- Choisir ----- </option>
		<option value="1"> Beige </option>
	  <option value="2"> Blanc </option>
	  <option value="3"> Bleu </option>
		<option value="4"> Gris </option>
		<option value="5"> Jaune </option>
	  <option value="6"> Noir </option>
		<option value="7"> Rose </option>
	  <option value="8"> Rouge </option>
	  <option value="9"> Vert </option>
	  </select>
	  </div>

  <br>

    <button type="submit" name="ajout_produit" href="admin.php?selector=3&&ajoutproduit=<?php echo $linkpdp ?>" class="btn btn-primary">Ajouter</button>
  </form>

	<br>
</main>
