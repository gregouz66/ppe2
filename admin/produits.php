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

//Lire la liste de catégorie
$reqcat = $bdd->prepare('SELECT * FROM categories ');
$reqcat->execute();
// On récupère le resultat
$result_cat = $reqcat->fetchAll();

//Lire la liste de marques
$reqmarq = $bdd->prepare('SELECT * FROM marques ');
$reqmarq->execute();
// On récupère le resultat
$result_marq = $reqmarq->fetchAll();
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

            echo '<th>Quantité</th>';

						echo '<th>Code produit</th>';

						echo '<th>Marque</th>';

            echo '<th>Nom du produit</th>';

            echo '<th>Prix départ(€)</th>';

						echo '<th>Promo (%)</th>';

						echo '<th>Prix final(€)</th>';

            echo '<th>Catégorie</th>';

            echo '<th>Modifier</th>' ;

            echo '<th>Supression</th>' ;

        // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.

        foreach($result as $row) {

            echo '<tr>';

            echo '<td>'.$row["quantite_produit"].'</td>';

						echo '<td>'.$row["code_produit"].'</td>';

						echo '<td>'.strtoupper($row["libelle_marque"]).'</td>';

            echo '<td>'.$row["nom_produit"].'</td>';

            echo '<td>'.$row["prixdepartHT_produit"].'</td>';

						echo '<td>'.$row["promo_produit"].'</td>';

						echo '<td>'.$row["prixunitaireHT_produit"].'</td>';

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
					<?php if($result_cat) {
	          echo '<option value=""> ----- Choisir ----- </option>';
	          foreach($result_cat as $row) { ?>
			        <option value="<?php echo $row['libelle_categorie']; ?>"> <?php echo $row['libelle_categorie']; ?> </option>
		      <?php } ?>
		      <?php } else { ?>
		        <option value=""> AUCUNE CATEGORIES </option>
		      <?php } ?>
			</select>
		</div>

		<br>

		<div>
			<label for="marque">*Marque</label>
			<br>
			<select name="marque">
				<?php if($result_marq) {
					echo '<option value=""> ----- Choisir ----- </option>';
					foreach($result_marq as $row) { ?>
						<option value="<?php echo $row['libelle_marque']; ?>"> <?php echo $row['libelle_marque']; ?> </option>
				<?php } ?>
				<?php } else { ?>
					<option value=""> AUCUNE MARQUES </option>
				<?php } ?>
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
		<option value="Beige"> Beige </option>
	  <option value="Blanc"> Blanc </option>
	  <option value="Bleu"> Bleu </option>
		<option value="Gris"> Gris </option>
		<option value="Jaune"> Jaune </option>
	  <option value="Noir"> Noir </option>
		<option value="Rose"> Rose </option>
	  <option value="Rouge"> Rouge </option>
	  <option value="Vert"> Vert </option>
	  </select>
	  </div>

		<br>

		<div>
      <label for="quantite">*Quantité</label>
      <input type="text" name="quantite" class="form-control" id="quantite">
    </div>

  <br>

    <button type="submit" name="ajout_produit" href="admin.php?selector=3&&ajoutproduit=<?php echo $linkpdp ?>" class="btn btn-primary">Ajouter</button>
  </form>

	<br>
</main>
