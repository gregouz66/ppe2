<?php

$req = $bdd->prepare('SELECT * FROM machines ');
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

            echo '<th>ID</th>';

            echo '<th>IP</th>';

            echo '<th>Adresse MAC</th>';

            echo '<th>Nom de la machine</th>';

            echo '<th>Host name</th>';

            echo '<th>Libellé de la machine</th>';

            echo '<th>ID de la salle</th>';


        // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.

        foreach($result as $row) {

            echo '<tr>';

            echo '<td>'.$row["id_machine"].'</td>';

            echo '<td>'.$row["ip_machine"].'</td>';

            echo '<td>'.$row["mac_machine"].'</td>';

            echo '<td>'.$row["nom_machine"].'</td>';

            echo '<td>'.$row["host_name_machine"].'</td>';

            echo '<td>'.$row["libelle_machine"].'</td>';

            echo '<td>'.$row["id_salle"].'</td>';

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
