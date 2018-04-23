<!-- Supression d'utilisateur -->
<?php if(isset($_GET['top'])){
			  $top = htmlentities(trim($_GET['top']));

        $suppbot = $bdd->prepare("SELECT * FROM client WHERE id_client = ?");
        $suppbot->execute(array($top));
        $result = $suppbot->fetch();
        $emailsuppr = $result['email_client'];

			  $supptop = $bdd->prepare("DELETE FROM client WHERE id_client = ? LIMIT 1");
			  $supptop->execute(array($top));
        //include ('mailmembres/mailsuppr.php');
        $errors1[] = "L'utilisateur a été supprimé avec succès !";

		  }
?>
