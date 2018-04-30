<!-- Supression d'utilisateur -->
<?php if(isset($_GET['top'])){
			  $top = htmlentities(trim($_GET['top']));

				$supptopphoto = $bdd->prepare("DELETE FROM photoproduit WHERE id_produit = ?");
			  $supptopphoto->execute(array($top));
			  $supptop = $bdd->prepare("DELETE FROM produits WHERE id_produit = ? LIMIT 1");
			  $supptop->execute(array($top));

				$errors1[] = "Le produit a été supprimé avec succès !";
		  }
?>
