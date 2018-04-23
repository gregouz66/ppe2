<?php 
$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u349425010_bouti;charset=utf8', 'u349425010_bouti', 'azerty66');

?>
<html>


    <head>
        <title>Boutique</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    </head>
    <body>

        <!-- Wrapper -->
        <div id="wrapper">

            <!-- Header -->
            <header id="header"> <!-- header css de la nav barre -->
                <h1><a href="http://discordapp.esy.es/ppe/">Le coin du Bledard</a></h1>

                <nav class="links">

                    <ul>






                        <div class="dropdown">
                            <button  class="dropbtn">Vêtements</button>
                            <div class="dropdown-content">


                                <lo><a href="">T-shirt</a></lo>
                                <lo><a href="">Sweat-shirt</a></lo>
                                <lo><a href="">Pull</a></lo>
                                <lo><a href="">Pantalon</a></lo>

                            </div>
                        </div>
                        <div class="dropdown">
                            <button  class="dropbtn">Chaussures</button>
                            <div class="dropdown-content">

                                <lo><a href="">sport</a></lo>
                                <lo><a href="">ville</a></lo>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button  class="dropbtn">Accessoires</button>
                            <div class="dropdown-content">

                                <lo><a href="http://mastergamer.esy.es/produits/accessoires/couvrechef/couvrechef.php">Couvre-chef</a></lo>
                                <lo><a href="http://discordapp.esy.es/ppe/produits/accessoires/gants/gants.php">gants</a></lo>
                            </div>
                        </div>

                        <li><a href="faq.php">FAQ</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>


                </nav>



                <nav class="main">
                    <ul>

                        <li class="search">
                            <a class="fa-search" href="#search">Search</a>
                            <form id="search" method="get" action="#">
                                <input type="text" name="query" placeholder="Search" />
                            </form>
                        </li>

                        <li class="menu">
                            <a class="fa-bars" href="#menu">Menu</a>
                        </li>
                    </ul>
                </nav>
            </header>

            <!-- Menu -->
            <section id="menu">

                <!-- Search -->
                <section>
                    <form class="search" method="get" action="#">
                        <input type="text" name="query" placeholder="Search" />
                    </form>
                </section>

                <!-- Links -->
                <section>
                    <ul class="links">
                        <li>
                            <a href="#">
                                <h3>Coinbledard</h3>
                                <p>découvrir le site </p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <h3>Promotion</h3>
                                <p>Pas Cher -50%</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <h3>Chaussures</h3>
                                <p>Sport </p>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <h3>accessoires</h3>
                                <p>casquettes , bonnets , lunettes ...</p>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <h3>faq </h3>
                                <p>On reponds a toutes vos questions </p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <h3>contact</h3>
                                <p>Voir nos magasin , nous contactez</p>
                            </a>
                        </li>
                    </ul>
                </section>

                <!-- Actions -->
                	<section>
                            <ul class="actions vertical">
                <?php
                if (isset($_SESSION['pseudo']) && isset($_SESSION['mail'])) {
                    echo '<li><a href="moncompte.php" class="button big fit">' .
                    strip_tags($_SESSION['pseudo']) .
                    '</a></li>'; //$_SESSION['pseudo'];
                    echo '<li><a href="logout.php" class="button big fit">Logout</a></li>';
                } else {
                    echo'<li><a href="log.php" class="button big fit">Log In</a></li>';
                    echo'<li><a href="inscription.php" class="button big fit">Create Account</a></li>';
                }
                ?>
                                
                                        
                                        
                                </ul>
                        </section> 

            </section>

            <div id="main">
                <!-- Main -->
                <article class="post">
            
    
    


  
   
   
           <h2>Nos gants : </h2> </br>
     <div id="cadre">
  

<?php
$i=0;
$reponse = $bdd->query('SELECT * FROM produit');

while ($donnees = $reponse->fetch())
{$i++
 
   
    
?>

 

     
         <div class="cadretshirt"><a href="affichageproduit/detailproduit/article<?php echo $donnees['id']; ?>.php">
                 <img src="affichageproduit/imageproduit/<?php echo $donnees['id']?>.jpg" alt="t-shirt"  ></a>
                            <p class="prixaccueil"> <?php echo  $donnees['nom']  ?>     <?php  echo $donnees['prix'] ?></p>
                        </div>
                       <?php if ($blbl>4);
                       echo'</div> <div id="cadre">';
                       $i=0;
                       ?>
        
      
     
           

<?php
}

$reponse->closeCursor();
?>
     
             
                    <!-- cadre d'accueil avec news -->
               

                    <!-- DIV avec horaire -->
<!--                    <div id="cadre">

                        <div class="horaires">
                            <h1>Horaires d'ouverture</h1>
                            <p> Lundi 8h00 - 18h00</br>Mardi 8h00 - 18h00</br>Mercredi 8h00 - 18h00</br>Jeudi 8h00 - 18h00</br>Vendredi 8h00 - 18h00</br>Samedi 8h00 - 18h00</br>Dimanche 8h00 - 12h00</br></p>
                        </div>


                        <div>
                            <h1>&emsp;&emsp;&emsp;&emsp;&emsp;SOLDES</h1>
                            <div><p>&emsp;&emsp;&emsp;découvrez nos prix imbattables</p></div>
                        </div>

                    </div>-->



                </article>

                <!-- FOOTER-->
                <section id="footer">
                    <ul class="icons">
                        <li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
                        <li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
                        <li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
                        <li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
                        <li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
                    </ul>
                </section>


                <!-- SCRIPT -->
                <script src="assets/js/jquery.min.js"></script>
                <script src="assets/js/skel.min.js"></script>
                <script src="assets/js/util.js"></script>
                <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
                <script src="assets/js/main.js"></script>

                </body>

            </div>

    </body>
</html>