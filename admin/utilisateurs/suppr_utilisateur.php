<!-- Supression d'utilisateur -->
<?php if(isset($_GET['top'])){
			  $top = htmlentities(trim($_GET['top']));

        $suppbot = $bdd->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur = ?");
        $suppbot->execute(array($top));
        $result = $suppbot->fetch();
        $emailsuppr = $result['adresse_email'];

			  $supptop = $bdd->prepare("DELETE FROM utilisateurs WHERE id_utilisateur = ? LIMIT 1");
			  $supptop->execute(array($top));
        //include ('mailmembres/mailsuppr.php');
        $errors1[] = "L'utilisateur a été supprimé avec succès !";

		  }
?>
