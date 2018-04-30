<?php

$id_commande = $_GET['com'];
$req = $bdd->prepare('SELECT * FROM commande WHERE id_commande = ? LIMIT 1');
$req->execute(array($id_commande));
// On récupère le resultat
$result = $req->fetch();
if($result) {

  $produits = explode(",", $result["produits_commande"]); //Array avec tt les prod de la commande
  $nbreprod = count($produits); //nbre produits commande

  //RECUP INFOS CLIENT
  $id_client = $result["id_client"];
  $req_client = $bdd->prepare('SELECT * FROM client WHERE id_client = ? LIMIT 1');
  $req_client->execute(array($id_client));
  // On récupère le resultat
  $result_client = $req_client->fetch();

  //RECUP ADRESSE ARCHIVE COMMANDE
  $id_adrlivr = $result["id_adresse_livraison"];
  $req_livr = $bdd->prepare('SELECT * FROM adressearchive WHERE id_adresseclient = ? LIMIT 1');
  $req_livr->execute(array($id_adrlivr));
  // On récupère le resultat
  $result_livr = $req_livr->fetch();
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Commande numéro <?php echo $result["num_commande"] ?></h1>
  </div>

  <div class="row">
    <div class="col-md-5 col-sm-6" style="border-right:solid;">
      <h4 class="">Information client</h4>
      <hr>
      <div class="table-responsive">
          <?php
            // debut du tableau
            echo '<table class="table table-striped table-sm">';
                echo '<thread>';
                // on affiche les titres
                echo '<tr>';

                echo '<th>Nom complet</th>';

                echo '<th>Email</th>';

                echo '<th>Téléphone</th>';


            // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.

                echo '<tr>';

                echo '<td>'.strtoupper($result_client['nom_client']).' '.$result_client['prenom_client'].'</td>';

                echo '<td>'.$result_client['email_client'].'</td>';

                if(isset($result_client['telephone_client'])){
                  if(!empty($result_client['telephone_client'])){
                    echo '<td>'.$result_client["telephone_client"].'</td>';
                  } else {
                    echo '<td>Aucun numéro</td>';
                  }
                } else {
                  echo '<td>Aucun numéro</td>';
                }

                echo '</tr>';

        echo '</tbody>';
            echo '</table>';
            // fin du tableau.
            ?>
          </div>
          <hr>

        </div>
        <div class="col-md-7 col-sm-6">
          <h4 class="">Information commande</h4>
          <hr>
          <div class="table-responsive">
              <?php
                // debut du tableau
                echo '<table class="table table-striped table-sm">';
                    echo '<thread>';
                    // on affiche les titres
                    echo '<tr>';

                    echo '<th>Etat</th>';

                    echo '<th>Date</th>';

                    echo '<th>total TTC</th>';

                    echo '<th>Num. commande</th>';

                    echo '<th>Num. facture</th>';


                // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.

                    echo '<tr>';

                    echo '<td>'.$result["etat_commande"].'</td>';

                    $myDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $result["datetime_commande"]);
                    $date = $myDateTime->format('d-m-Y');
                    echo '<td>'.$date.'</td>';

                    echo '<td>'.$result["totalTTC"].'€</td>';

                    echo '<td>'.$result["num_commande"].'</td>';

                    echo '<td>'.$result["num_facture"].'</td>';

                    echo '</tr>';

            echo '</tbody>';
                echo '</table>';
                // fin du tableau.
                ?>
              </div>
              <hr>
              <div class="table-responsive">
                  <?php
                    // debut du tableau
                    echo '<table class="table table-striped table-sm">';
                        echo '<thread>';
                        // on affiche les titres
                        echo '<tr>';

                        echo '<th>Code produit</th>';

                        echo '<th>Nom produit</th>';

                        foreach ($produits as $row) {
                          $req_prod = $bdd->prepare('SELECT * FROM produits WHERE id_produit = ? LIMIT 1');
                          $req_prod->execute(array($row));
                          // On récupère le resultat
                          $result_prod = $req_prod->fetch();

                          echo '<tr>';

                          echo '<td>'.$result_prod["code_produit"].'</td>';

                          echo '<td>'.$result_prod["nom_produit"].'</td>';

                          echo '</tr>';
                        }

                echo '</tbody>';
                    echo '</table>';
                    // fin du tableau.
                    ?>
                  </div>
                  <hr>
              <div class="row">
                <div class="col-md-6 col-sm-6" style="border-right:solid;">
                  <h5>Adresse de livraison</h5>
                  <input type="text" value="<?php echo $result_livr["nomcomplet_adresseclient"] ?>" disabled/> </br></br>
                  <input type="text" value="<?php echo $result_livr["pays_adresseclient"] ?>" disabled/> </br></br>
                  <textarea type="text" disabled><?php echo $result_livr["libelle_adresseclient"] ?></textarea> </br></br>
                  <input type="text" value="<?php echo $result_livr["etatprovince_adresseclient"] ?>" disabled/> </br></br>
                  <input type="text" value="<?php echo $result_livr["codepostal_adresseclient"] ?>" disabled/> </br></br>
                  <input type="text" value="<?php echo $result_livr["ville_adresseclient"] ?>" disabled/>
                </div>
                <div class="col-md-6 col-sm-6">
                  <h5>Adresse de facturation</h5>
                  <input type="text" value="Pas encore disponible" disabled/> </br></br>
                  <input type="text" value="Pas encore disponible" disabled/> </br></br>
                  <input type="text" value="Pas encore disponible" disabled/> </br></br>
                  <input type="text" value="Pas encore disponible" disabled/> </br></br>
                  <input type="text" value="Pas encore disponible" disabled/> </br></br>
                  <input type="text" value="Pas encore disponible" disabled/>
                </div>
              </div>
              <hr>
        </div>
      </div>
    </main>

    <?php } else { ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Commande inexistante !</h1>
        </div>
      </main>
      <?php } ?>
