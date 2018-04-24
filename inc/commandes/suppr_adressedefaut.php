<?php
if (isset($_POST['suppr'])){
  $id_client = $_SESSION['id_client'];
  $suppradr = $bdd->prepare("DELETE FROM adresseclient WHERE id_client = ? AND adressedefaut_adresseclient = 1 LIMIT 1");
  $suppradr->execute(array($id_client));
  $result_suppr = $suppradr->rowCount();
  if($result_suppr == 1) {
    $errors1[] = "L'adresse par défaut a bien été supprimée !";
  } else {
    $errors[] = "Une erreur est survenue lors de la suppression de l'adresse par défaut";
    var_dump($suppradr->errorInfo());
  }
}
?>
