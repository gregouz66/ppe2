<?php
//Verif si un produit a été séléctionné
if(isset($_GET['modif']))
{
//On récupère le GET
$idproduit = $_GET['modif'];

//TRAITEMENT modif de la Photo
require ('admin/produits/modif_image.php');
//TRAITEMENT modif de la fiche produit
require ('admin/produits/modif_produit.php');

//Lire le produit en question
$req = $bdd->prepare('SELECT * FROM produits WHERE id_produit = ? LIMIT 1');
$req->execute(array($idproduit));
// On récupère le resultat
$result = $req->fetch();
//On récupère chaque info nécessaire
$marque = strtoupper($result['libelle_marque']);
$nom = $result['nom_produit'];
$prix = $result['prixunitaireHT_produit'];

$promo = $result['promo_produit'];
$description = $result['description_produit'];
$categorie = strtoupper($result['libelle_categorie']);
$couleur = strtoupper($result['couleur_produit']);

// TROUVER LA PHOTO PAR DEFAUT
$reqphoto = $bdd->prepare('SELECT photo_produit FROM photoproduit WHERE id_produit = ? AND pardefaut_photoproduit = 1');
$reqphoto->execute(array($idproduit));
// On récupère le resultat
$resultphoto = $reqphoto->fetch();
$photopardefaut = $resultphoto['photo_produit'];

} else {
  //Si aucun prod est selectionner alors la var = 0
  $idproduit = "0";
}
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

<?php //SI AUCUN PRODUIT N'A ETE SELECTIONNER
  if ($idproduit == 0){
    echo '<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Aucun produit n\'a été séléctionné !</h1>
    </div>';
  } else {
?>


<?php //ERREUR MISE EN PLACE
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
    <h1 class="h2">Modification d'un produit</h1>
  </div>

  <br>
  <h4> Photo du produit :</h4>

  <form  method="post" enctype="multipart/form-data" action="#">
      <div>
        <img src="<?php echo $photopardefaut ?>" class="img-circle">
        <br>
        <br>
        <label for="pdp">Changer la photo (max. 0.5Mo)</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="530000">
        <input class="form-control" type="file" name="avatar" id="image">
      </div>
      <br>
      <button type="submit" value="Envoyer la photo" class="btn btn-primary" name="edit_photo">Upload</button>
    </form>

    <br>
    <hr>
    <h4> Fiche du produit :</h4>

  <form method="post" action="#">
    <div>
      <label for="categorie">Catégorie</label>
      <br>
      <select name="categorie">
    <option value="<?php echo $categorie ?>"><?php echo $categorie ?></option>
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
			<label for="marque">Marque</label>
			<br>
			<select name="marque">
		<option value="<?php echo $marque ?>"><?php echo $marque ?></option>
		<option value="1"> Nike </option>
		<option value="2"> Adidas </option>
		<option value="3"> Coq Sportif </option>
		<option value="4"> Ralph Lauren </option>
		<option value="5"> Tommy hilfiger </option>
		</select>
		</div>

		<br>

    <div>
      <label for="name">Nom du produit</label>
      <input type="text" value="<?php echo $nom ?>" name="name" maxlength="255" class="form-control" id="name">
    </div>

    <div>
      <label for="prix">Prix (€)</label>
      <input type="text" value="<?php echo $prix ?>" name="prix" class="form-control" id="prix">
    </div>

    <div>
      <label for="promo">Promo (%)</label>
      <input type="text" value="<?php echo $promo ?>" name="promo" maxlength="2" class="form-control" id="promo">
    </div>

    <div>
	    <label for="couleur">Couleur</label>
	    <br>
	    <select name="couleur">
	  <option value="<?php echo $couleur ?>"><?php echo $couleur ?></option>
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

    <div>
      <label for="description">Description (max. 255)</label>
      <textarea type="text" name="description" maxlength="255" class="form-control" id="Description"><?php echo $description ?></textarea>
    </div>


  <br>

    <button type="submit" name="edit_produit" href="#" class="btn btn-primary">Modifier</button>
  </form>

	<br>

<?php } ?>
</main>
