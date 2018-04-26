<?php
if (isset($_POST['achat_gratuit'])){

  date_default_timezone_set('Europe/Madrid');
  $date_commande = date("Y.m.d H:i:s");
  $etat_commande = 0; // 0=NONPRISENCOMPTE / 1=PRISENCOMPTE / 2= ENCOURSDELIVRAISON / 3=LIVRER
  $type_livraison = $_POST['option_livr'];
  $id_client = $_SESSION['id_client'];
  // ID ADR FACT
  $type_regl = 'GRATUIT'; // CARTE CREDIT-DEBIT / PAYPAL / GRATUIT
  $methode_regl = 1; // (1 ou plusieurs fois)

  //VAR QUI SERVIRA POUR LE CALC DU PRIX TOTAL DES PROD HT
  $prod_panier = '';
  // REQUETE POUR VOIR LES ARTICLES DANS LE PANIER DU CLIENT
  $monpanier = $bdd->prepare("SELECT * FROM panier WHERE id_client = ?");
  $monpanier->execute(array($id_client));
  $result = $monpanier->fetchAll();
  foreach($result as $row0) { // ON AFFICHE A LA CHAINE TOUT LES PROD TROUVER
    $id_prod = $row0['id_produit'];
    $req_prod = $bdd->prepare('SELECT * FROM produits WHERE id_produit = ?');
    $req_prod->execute(array($id_prod));
    $result_prod = $req_prod->fetchAll();
    foreach($result_prod as $row) { // ON AFFICHE 1 PAR 1 CHAQUE ARTICLES
      //VAR QUI SERVIRA POUR LE CALC DU PRIX TOTAL DES PROD
      $prod_panier .= $row["id_produit"].',';
     }
  }
  //CALCUL TOTAL PRODUIT HT
  $prod_panier = substr($prod_panier, 0, -1);
  //Lire la liste des photos du produit
  $req_total = $bdd->query('SELECT SUM(prixunitaireHT_produit) FROM produits WHERE id_produit IN ('.$prod_panier.')');
  // On récupère le resultat
  $total = $req_total->fetch();
  //PRIX TOTAL PROD HT
  $totalHT = $total['SUM(prixunitaireHT_produit)'];

  //PRIX TOTAL TTC
  if($type_livraison == '24h'){
    $fraisport = 10;
    $totalTTC = $totalHT + $fraisport;
  } else if($type_livraison == 'Standard'){
    $fraisport = 0;
    $totalTTC = $totalHT;
  }

  // ID ADR LIVR
  // REQUETE POUR AVOIR L'ID DE L'ADRESSE DE LIVRAISON DU CLIENT
  $req_adrlivr = $bdd->prepare("SELECT id_adresseclient FROM adresseclient WHERE id_client = ?");
  $req_adrlivr->execute(array($id_client));
  $result_livr = $req_adrlivr->fetch();
  //ID de l'adresse de livraison
  $adr_livraison = $result_livr['id_adresseclient'];

  //AJOUTER LA COMMANDE DANS LA TABLE COMMANDE SANS LE NUM COMMANDE ET FACTURE
  $creationcommande = $bdd->prepare("INSERT INTO commande(datetime_commande, etat_commande, totalTTC, totalHT, fraisportHT, id_client, id_adresse_livraison, type_livraison, type_reglement, methode_reglement) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $creationcommande->execute(array($date_commande, $etat_commande, $totalTTC, $totalHT, $fraisport, $id_client, $adr_livraison, $type_livraison, $type_regl, $methode_regl));
  $result_com = $creationcommande->rowCount();

  if($result_com == 1){

    $UID = $bdd -> lastInsertId(); //Recup ID de la commande
    $numcommande = 'COM'.$UID;
    $numfacture = 'FACT'.$UID;

    //Ajout des num fact et com
    $ajoutfactcom = $bdd->prepare("UPDATE commande SET num_commande = ?, num_facture = ? WHERE id_commande = ? LIMIT 1");
    $ajoutfactcom->execute(array($numcommande, $numfacture, $UID));
    $result_factcom = $ajoutfactcom->rowCount();

    if($result_factcom == 1){
      //Suppression du panier qui vient d'être commandé
      $deletecom = $bdd->prepare("DELETE FROM panier WHERE id_client = ? ");
      $deletecom->execute(array($id_client));
      header("Location: mercicommande.php");
    } else {
      $errors[] = 'Problème lors du traitement de la commande !';
      //Suppression de la commande qui n'a aucun num facture ni commande
      $deletecom = $bdd->prepare("DELETE FROM commande WHERE id_commande = ? LIMIT 1");
      $deletecom->execute(array($UID));
      var_dump($ajoutfactcom->errorInfo());
    }
  } else {
    $errors[] = 'Problème lors du traitement de la commande !';
    var_dump($creationcommande->errorInfo());
  }
}
?>
