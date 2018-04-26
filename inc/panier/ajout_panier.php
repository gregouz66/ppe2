<?php include ('../bdd.php'); ?>

<?php
if(isset($_SESSION['id_client'])){
  $idproduit = $_POST['postid'];
  $idclient = $_SESSION['id_client'];

  // Vérif si le produit existe deja dans le panier
  $exist_panier = $bdd->prepare('SELECT * FROM panier WHERE id_client = ? AND id_produit = ? LIMIT 1');
  $exist_panier->execute(array($idclient,$idproduit));
  $result_exist_panier = $exist_panier->rowCount();

  if($result_exist_panier == 0){

  // Ajout du produit dans panier du client
  $ajout_panier = $bdd->prepare("INSERT INTO panier(id_client, id_produit) VALUES(?, ?)");
  $ajout_panier->execute(array($idclient,$idproduit));
  $result_ajout_panier = $ajout_panier->rowCount();

  if($result_ajout_panier == 1){
    echo('Produit ajouté au panier');
   } else {
    echo('Problème lors de l\'ajout au panier');
   } } else {
    echo('Ce produit est déjà dans votre panier !');
     }
 } else {
   echo('<a href="connexion.php">Connectez-vous pour ajouter un article au panier</a>');
 }
?>
