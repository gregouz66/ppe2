<!-- BDD -->
<?php include ('inc/bdd.php') ?>

<!-- HEADER -->
<?php include ('inc/headerindex.php') ?>

<!-- CSS DE LA PAGE -->
<link rel="stylesheet" type="text/css" href="assets/css/slidebody.css" />
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fullPage.css" />
<link rel="stylesheet" type="text/css" href="assets/css/headfoot.css" />
<link rel="stylesheet" href="assets/css/index.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.fullPage.js"></script>
<script type="text/javascript" src="assets/js/slide.js"></script>
<script type="text/javascript" src="admin/assets/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- FULLPAGE -->
<div id="fullpage">

	<!-- LOGO PAGE 3 / 4 -->
	<div id="staticImg">
			<div class="imgsContainer iconslide">
				<img src="images/lcbdpng.png" alt="logo" id="iphone-green" />
			</div>
	</div>

	<!-- CAROUSEL -->
	<div class="section " id="section0">
		<div class="bgcarousel"> <img class="imgbgcarousel" src="images/bgcarousel.png"> <img class="imgbgcarouselphone" src="images/bgcarouselphone.png"> </div>

		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		  </ol>

		  <div class="carousel-inner" role="listbox">

		    <div class="carousel-item active">
					<div class="row">
						<div class="col-sm-1 col_resp">
				      <img class="d-block img-fluid" src="images/index/imgart2.png" alt="First slide">
				    </div>
				    <div class="col">
				      <h3 class="titre_carousel1">Article 1</h3>
							<hr class="ligne_carousel">
							<blockquote class="blq_carousel1">Voici l'article second qui présentera l'avant-dernière News/article en date crée par les administrateurs du site !
							 Celle ci impactera les gens, attirera l'oeil car ce sera la première chose que les visiteurs verront sur le site.</blockquote>
							 <hr class="ligne_carousel">
							 <div>
							 <img class="img-fluid img1_carousel1" src="images/700x300.png" alt="First slide">
						 </div>
				    </div>
				    <div class="col col_resp">
				      <img class="d-block img-fluid img2_carousel1" src="images/300x300.png" alt="First slide">
				    </div>
				  </div>
		    </div>

		    <div class="carousel-item">
					<div class="col-sm-2 col_resp first_col">
						<img class="d-block img-fluid" src="images/index/imgart1.png" alt="Second slide">
					</div>
					<div class="col">
						<h3 class="titre_carousel1">Article 2</h3>
						<hr class="ligne_carousel">
						<blockquote class="blq_carousel1">Voici l'article troisième qui présentera l'avant-avant-dernière News/article en date crée par les administrateurs du site !
							Celle ci impactera les gens, attirera l'oeil car ce sera la première chose que les visiteurs verront sur le site.</blockquote>
						 <hr class="ligne_carousel">
						 <div>
						 <img class="img-fluid img1_carousel1" src="images/700x300.png" alt="First slide">
					 </div>
					</div>
					<div class="col col_resp">
						<img class="d-block img-fluid img2_carousel1" src="images/300x300.png" alt="First slide">
					</div>
		    </div>

				<div class="carousel-item">
					<div class="col-sm-3 col_resp first_col">
						<img class="d-block img-fluid" src="images/index/imgart3.png" alt="Third slide">
					</div>
					<div class="col">
						<h3 class="titre_carousel1">Article 3</h3>
						<hr class="ligne_carousel">
						<blockquote class="blq_carousel1">Voici l'article troisième qui présentera la dernière News/article en date crée par les administrateurs du site !
							Celle ci impactera les gens, attirera l'oeil car ce sera la première chose que les visiteurs verront sur le site.</blockquote>
						 <hr class="ligne_carousel">
						 <div>
						 <img class="img-fluid img1_carousel1" src="images/700x300.png" alt="First slide">
					 </div>
					</div>
					<div class="col col_resp">
						<img class="d-block img-fluid img2_carousel1" src="images/300x300.png" alt="First slide">
					</div>
		    </div>

		  </div>

		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
</div>
	<!-- PAGE 2 -->
	<div class="section" id="section1">
		<div class="wrap page2">

			<div class="imgsContainer">
				<img src="images/index/nike.png" alt="iphone2" id="iphone2" />
				<img src="images/index/lacoste.png" alt="iphone3" id="iphone3" />
				<img src="images/index/ralph.png" alt="iphone4" id="iphone4" />
			</div>

			<div class="imgsContainer2">
				<div class="row">
					<div class="col">
						<img src="images/index/nike_resp.png" alt="nike_resp" id="nike_resp" />
					</div>
					<div class="col">
						<img src="images/index/lacoste_resp.png" alt="lacoste_resp" id="lacoste_resp" />
					</div>
					<div class="col">
						<img src="images/index/ralph_resp.png" alt="ralph_resp" id="ralph_resp" />
					</div>
				</div>
			</div>

			<div class="box">
				<h2>Les plus grandes marques !</h2>
				<p><strong>LCBD</strong>  vous réuni toutes les plus grandes marques y compris leurs dernières collections ! Un large choix basé sur les critères de shopping des français.</p>
			</div>

		</div>
	</div>

	<!-- PAGE 3 -->
	<div class="section moveDown" id="section2">
		<div class="wrap page2">

			<div class="imgsContainer">
				<img src="images/index/pack1.png" alt="iphone-yellow" id="iphone-yellow" />
				<img src="images/index/pack2.png" alt="iphone-red" id="iphone-red" />
				<img src="images/index/pack3.png" alt="iphone-blue" id="iphone-blue" />
			</div>

			<div class="imgsContainer2">
				<div class="row">
					<div class="col">
						<img src="images/index/pack1.png" alt="pack1_resp" id="pack1_resp" />
					</div>
					<div class="col">
						<img src="images/index/pack2.png" alt="pack2_resp" id="pack2_resp" />
					</div>
				</div>
			</div>

			<div class="box">
				<h2>Besoin d'idées de cadeaux ?</h2>
				Chez <strong>LCBD</strong> ce n'est pas ce qu'il manque ! Des packs de diverses vêtements pour différentes occasions vous seront proposé pour satisfaire vos envies.
			</div>
		</div>
	</div>

	<!-- PAGE 4 -->
	<div class="section moveDown" id="section3">
		<div class="wrap">

				<img class="d-block img-fluid img1_section3" src="images/index/outlet.png" alt="Second slide">
		</div>
		<div class="imgsContainer">
			<img src="images/index/iphone-two.png" alt="iphone-two" id="iphone-two" />
		</div>
	</div>
</div>

<?php include ('inc/footerindex.php') ?>

  <script type="text/javascript" language="Javascript" src="assets/js/loader.js"></script>

</body>
</html>
