<?php include ('inc/bdd.php'); ?>

        <!-- HEADER -->
        <?php include ('inc/header.php') ?>

        <!-- CSS DE LA PAGE -->
        <link rel="stylesheet" href="assets/css/index.css" />

        <!-- Wrapper -->
        <div id="wrapper">
        <!-- Main -->
        <div id="main">
          <article class="post">

            <?php
            //  si il y a une recherche
            if(!empty($_GET['q'])){

              $q=$_GET['q'];
              $p=explode(" ",$q);
              $reqsql = 'select * from produits';
              $i=0;
              foreach($p as $mot) {
                if($i==0){
                  $reqsql .= ' where nom_produit like \'%'.$mot.'%\' or marque_produit like \'%' .$mot.'%\' or description_produit like \'%' .$mot. '%\'';
                }else{
                  $reqsql .= ' or nom_produit like \'%'.$mot.'%\' or marque_produit like \'%' .$mot.'%\' or description_produit like \'%' .$mot. '%\'';
                }
                $i++;
              }

              $search = $bdd->prepare($reqsql);
              $search->execute();
              $result = $search->fetchAll();
              $nbreresult = count($result);
              ?>

              <section id="category-banner-wrapper" class="sect_titre">

                <!-- ICI METTEZ LE TITRE DES PRODUITS CONCERNER -->
                <h1 class="style_titre">Résultat de <?php echo $q ?></h1>
              </section>
              <div class="primary">
                <p data-auto-id="styleCount" class="resultp styleCount"><?php echo $nbreresult; ?> styles trouvés</p>
                <div class="prod">
                  <section class="for_phone">

                    <?php include ('inc/produits/affichageproduits.php'); ?>

                  </section>
                </div>

            <?php }else{ ?>

              <section id="category-banner-wrapper" class="sect_titre">

                <!-- ICI METTEZ LE TITRE DES PRODUITS CONCERNER -->
                <h1 class="style_titre">Aucune recherche !</h1>
              </section>
              <div class="primary">

            <?php } ?>


            </div>
          </article>
          <!-- FOOTER -->
          <?php include ('inc/footer.php') ?>
