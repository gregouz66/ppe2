<!-- LIGNE 5/16/24 - COM -->
<!-- LIGNE 25 à 30 -->
<!-- FOREACH PRODUITS 47 à 55 -->
<!-- LIGNE 56 / 60 / 64 -->


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Facture COM<?php echo 'oui'?></title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo_lcbd.png">
      </div>
      <h1>COMMANDE COM<?php echo 'oui' ?></h1>
      <div id="company" class="clearfix">
        <div>Le coin du blédard</div>
        <div>Lycée Jean Lurçat,<br /> 66000, Perpignan.</div>
        <div>06.66.16.66.16</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
        <div><span>COMMANDE</span> <?php echo 'oui' ?></div>
        <div><span>CLIENT</span> <?php echo 'oui' ?></div>
        <div><span>ADDRESS</span> <?php echo 'oui' ?></div>
        <div><span>EMAIL</span> <a href="mailto:<?php echo 'oui' ?>"><?php echo 'oui' ?></a></div>
        <div><span>DATE</span> August 17, 2015</div>
        <div><span>DUE DATE</span> <?php echo 'oui' ?></div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">PHOTO</th>
            <th class="desc">PRODUIT</th>
            <th>PRIX UNITAIRE</th>
            <th>QUANTITE</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <!-- FOREACH PRODUITS -->
          <tr>
            <td class="service">Design</td>
            <td class="desc">Creating a recognizable design solution based on the company's existing visual identity</td>
            <td class="unit">$40.00</td>
            <td class="qty">26</td>
            <td class="total">$1,040.00</td>
          </tr>
          <!-- FIN FOREACH -->
          <tr>
            <td colspan="4">TOTAL HT</td>
            <td class="total"><?php echo '$5,200.00' ?></td>
          </tr>
          <tr>
            <td colspan="4">FRAIS DE PORT</td>
            <td class="total"><?php echo '$1,300.00' ?></td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">TOTAL TTC</td>
            <td class="grand total"><?php echo 'TOTAL TTC' ?></td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div class="notice">L'équipe LCBD espère vous revoir bientôt !</div>
      </div>
    </main>
    <footer>
      Escompte pour paiement anticipé : néant. Règlement à la commande sauf sur accord tactile. </br>
      Tout retard de paiement entraînera des intérêts égal au taux de refinancement de la Banque centrale européenne(BCE) majoré de 10 points.</br>
      En cas de recouvrement, une indemnité forfaitaire de 40€ sera appliquée.</br>
      SIRET 0606060606060606 - Code NAF 6666 Z - N° TVA : FR 66 666 666 666
    </footer>
  </body>
</html>
