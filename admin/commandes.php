<?php

$req = $bdd->prepare('SELECT * FROM commande');
$req->execute();
// On récupère le resultat
$result = $req->fetchAll();
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Gestion des commandes</h1>
  </div>


  <div class="table-responsive">
    <?php
    if($result) {
        // debut du tableau
        echo '<table class="table table-striped table-sm">';
            echo '<thread>';
            // on affiche les titres
            echo '<tr>';

            echo '<th>Date</th>';

            echo '<th>Etat</th>';

            echo '<th>total TTC</th>';

            echo '<th>Client</th>';

            echo '<th>Num. commande</th>';

            echo '<th>Num. facture</th>';

            echo '<th>Afficher</th>';


        // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.

        foreach($result as $row) {

            echo '<tr>';

            $myDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $row["datetime_commande"]);
            $date = $myDateTime->format('d-m-Y');
            echo '<td>'.$date.'</td>';

            echo '<td>'.$row["etat_commande"].'</td>';

            echo '<td>'.$row["totalTTC"].'</td>';

            echo '<td>'.$row["id_client"].'</td>';

            echo '<td>'.$row["num_commande"].'</td>';

            echo '<td>'.$row["num_facture"].'</td>';

            echo '<td><a href="admin.php?selector=6&com='. $row["id_commande"].'"><button type="submit" class="btn btn-warning btnsuppr">Afficher</button></a></td>';

            echo '</tr>';

        }
    echo '</tbody>';
        echo '</table>';
        // fin du tableau.
    }
    else echo 'Pas d\'enregistrements dans cette table...';
    ?>
  </div>
</main>
