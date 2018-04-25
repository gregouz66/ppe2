<?php
if (isset($_POST['achat_gratuit'])){

  date_default_timezone_set('Europe/Madrid');
  $date_commande = date("Y.m.d");
  $etat_commande = 0; // 0=NONPRISENCOMPTE / 1=PRISENCOMPTE / 2= ENCOURSDELIVRAISON / 3=LIVRER
  // TOTAL HT
  // TOTAL TTC (CALCUL AVEC TOTALTVA)
  $id_client = $_SESSION['id_client'];
  // ID ADR FACT
  // ID ADR LIVR
  // NUM COMANDE = ID COMMANDE
  // NUM FACTURE
  $type_regl = 3; // 1=CARTE CREDIT/DEBIT / 2=PAYPAL / 3=GRATUIT
  $methode_regl = 1; // (1 ou plusieurs fois)
}
?>
