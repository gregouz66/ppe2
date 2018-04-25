<!-- Supression de prod du panier -->
<?php if(isset($_GET['suppr'])){
			  $top = htmlentities(trim($_GET['suppr']));
        $idclient = $_SESSION['id_client'];

			  $supptop = $bdd->prepare("DELETE FROM panier WHERE id_client = ? AND id_produit = ?");
			  $supptop->execute(array($idclient, $top));
        $result_suppr = $supptop->rowCount();

        if($result_suppr == 1){
          $errors1[] = "Le produit a été retiré du panier !";
        } else {
          $errors[] = "Problème lors de la suppression du produit !";
        }

		  }
?>
