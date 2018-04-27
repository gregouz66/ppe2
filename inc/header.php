<html>
<head>
  <title>Boutique</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <META NAME="description" CONTENT="Magasin de diverses vêtements de marque et de nouveaux créateurs.">
  <META NAME="keywords" CONTENT="marque vetements lcbd le coin bledard vente magasin outlet promos">
  <HTTP-EQUIV="Content-Language" CONTENT="fr">
  <META NAME="robots" CONTENT="index">
  <META NAME="REVISIT-AFTER" CONTENT="7 days">

  <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
  <!-- Bootstrap core CSS -->
  <link href="admin/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="assets/css/footer.css" />
  <link rel="stylesheet" href="assets/css/header.css" />
  <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
  <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

</head>

<body>

  <div id="chrome-header">
    <header data-reactroot="">

      <div class="body_header headroom-wrapper" style="height: 47px;">
        <div id="chrome-sticky-header" class="headroom headroom--unfixed">
          <div class="top_header">
            <div class="top_header2" data-testid="header">

              <?php include ('inc/modalheader.php') ?>

              <a class="_25irHcd" href="index.php" data-testid="lcdblogo">
                <img class="logoheader zoom" src="images/lcbdpng.png">
              </a>

              <div class="search_header">
                <div class="search_overlay_header" aria-hidden="true" data-testid="search-overlay-shadow"></div>

                <form action="recherche.php" method="get" class="search_form_header" data-testid="search-form">
                  <div class="search_divfield_header" data-testid="search-field">
                    <label for="chrome-search">
                      <span class="search_span_header">Rechercher des articles, des marques et de l'inspiration</span>
                      <input type="search" maxlength="35" id="chrome-search" name="q" role="combobox" class="search_input_header" autocomplete="off" placeholder="Rechercher" data-testid="search-input" aria-autocomplete="both" aria-controls="search-results" aria-expanded="false">
                    </label>
                    <button class="search_button_header" type="submit" data-testid="search-button-inline">
                      <svg viewBox="0 0 17 17">
                        <title>Rechercher</title>
                        <path fill="currentColor" fill-rule="nonzero" d="M7.65 15.3a7.65 7.65 0 1 1 5.997-2.9c-.01.012 3.183 3.297 3.183 3.297l-1.22 1.18s-3.144-3.283-3.154-3.275A7.618 7.618 0 0 1 7.65 15.3zm0-2a5.65 5.65 0 1 0 0-11.3 5.65 5.65 0 0 0 0 11.3z"></path>
                      </svg>
                    </button>
                    <section class="search_othersection_header">
                    </section>
                  </div>
                </form>

              </div>
              <ul class="ul_icon_header" data-testid="widgets">

                <li class="li_icon_header li2_icon_header">
                  <a type="a" data-toggle="modal" data-target="#myModal" icon="accountUnfilled" data-testid="accountIcon" class="a_icon_header a2_icon_header" aria-label="Mon compte">
                    <span class="span_icon_header">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill="#fff" d="M14 6a4 4 0 1 0-8 0 4 4 0 0 0 8 0zm2 0A6 6 0 1 1 4 6a6 6 0 0 1 12 0zm-6 9c-3.068 0-5.67 1.223-7.035 3h14.07c-1.365-1.777-3.967-3-7.035-3zm10 5H0c.553-4.006 4.819-7 10-7s9.447 2.994 10 7z"></path>
                      </svg>
                    </span>
                  </a>
                </li>

                <!-- <li class="li_icon_header">
                  <a type="a" href="#" icon="heartUnfilled" data-testid="savedItemsIcon" class="a_icon_header a2_icon_header" aria-label="Articles Sauvegardés">
                    <span class="span_icon_header">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 18">
                        <path fill="#FFF" fill-rule="nonzero" d="M10.618 15.474a21.327 21.327 0 0 0 3.137-2.076c2.697-2.166 4.249-4.619 4.245-7.299-.003-2.284-1.757-4.101-3.881-4.099-1.016 0-1.97.417-2.69 1.158l-1.43 1.467-1.432-1.463a3.748 3.748 0 0 0-2.695-1.151C3.749 2.013 1.998 3.837 2 6.12c.003 2.677 1.559 5.123 4.256 7.281a21.32 21.32 0 0 0 3.756 2.39c.191-.096.394-.202.606-.318zM9.996 1.763l.203-.2A5.726 5.726 0 0 1 14.116 0c3.246-.004 5.88 2.725 5.884 6.097C20.01 13.845 10.014 18 10.014 18S.01 13.87 0 6.124C-.003 2.752 2.624.014 5.87.01A5.733 5.733 0 0 1 9.79 1.564l.205.199z"></path>
                      </svg>
                    </span>
                  </a>
                </li> -->

                <li class="li_icon_header">
                  <div>
                    <a type="a" href="monpanier.php" icon="bagUnfilled" data-testid="bagIcon" class="a_icon_header a2_icon_header" aria-label="Panier">
                      <span class="span_icon_header">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <path fill="#FFF" fill-rule="nonzero" d="M18 17.987V7H2v11l16-.013zM4.077 5A5.996 5.996 0 0 1 10 0c2.973 0 5.562 2.162 6.038 5H20v14.986L0 20V5h4.077zm9.902-.005C13.531 3.275 11.86 2 10 2 8.153 2 6.604 3.294 6.144 4.995c.92 0 7.654.03 7.835 0z"></path>
                        </svg>
                      </span>
                      <span class="span_panier_icon_header"></span>
                    </a>
                  </div>
                </li>

                <?php
                  if(isset($_SESSION['id_client'])) {
                  ?>
                <li class="li_icon_header"> <div>
                  <a type="a" href="logout.php" icon="bagUnfilled" data-testid="bagIcon" class="a_icon_header a2_icon_header" aria-label="Panier">
                    <span class="span_icon_header">
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="187.338px" height="187.338px" viewBox="0 0 187.338 187.338" style="enable-background:new 0 0 187.338 187.338;" xml:space="preserve">
                        <g>
                        	<g>
                        		<path d="M125.393,95.594c-1.629-1.183-4.344,0.387-4.153,2.383c0.652,6.86,1.787,13.168,1.565,20.185    c-0.251,7.964-1.063,15.911-1.226,23.877c-14.855,0.447-29.671-0.884-44.524-0.893c0.548-32.136,0.552-64.361,0.547-96.382    c0-2.468-2.462-3.305-4.204-2.567c-0.007-0.009-0.009-0.019-0.016-0.028c-6.534-8.158-20.93-12.415-30.032-17.155    C33.066,19.658,23.02,13.634,14.366,5.905c15.627,1.086,31.122,3.332,46.744,4.475c20.147,1.476,40.181-2.192,60.287,0.449    c0.518,6.438,0.365,12.828-0.014,19.278c-0.349,5.936-1.441,12.691,0.889,18.304c1.24,2.988,5.073,2.447,5.488-0.743    c0.849-6.529,0.191-13.542,0.533-20.172c0.301-5.837,0.205-11.53-1.437-17.124c1.855-1.582,2.002-4.969-1.022-5.523    c-17.917-3.283-36.129-1.422-54.217-1.02C50.938,4.288,30.471-1.66,9.832,0.759C9.667,0.778,9.545,0.849,9.398,0.89    C8.471-0.162,6.583-0.124,5.871,1.638c-9.284,23.017-5.076,49.963-3.882,74.09c1.189,24.004-2.432,48.698,3.473,72.267    c0.334,1.331,1.294,1.836,2.277,1.791c16.22,17.971,41.909,25.269,62.465,36.951c1.38,0.784,2.673,0.392,3.536-0.462    c1.089,0.029,2.159-0.679,2.215-2.184c0.469-12.607,0.787-25.254,1.027-37.913c15.939,2.026,31.894,3.255,47.981,2.666    c1.931-0.071,3.39-1.52,3.453-3.454c0.336-9.966,1.327-19.894,1.514-29.866C130.046,109.53,130.9,99.59,125.393,95.594z     M34.15,26.722c11.063,6.375,24.699,15.941,36.992,19.295c0.197,0.054,0.373,0.051,0.553,0.061    c-0.014,1.85-0.069,3.715-0.113,5.575c-7.436-7.919-18.397-13.08-27.733-18.077C31.759,27.104,19.698,21.24,8.643,13.029    c0.195-1.863,0.379-3.724,0.635-5.595C15.703,15.826,24.955,21.424,34.15,26.722z M7.324,51.238    c21.446,9.495,42.479,19.029,61.443,33.057c0.655,0.485,1.36,0.408,1.942,0.066c-0.11,3.016-0.222,6.032-0.333,9.051    C49.454,81.06,27.935,69.847,7.444,56.701C7.397,54.876,7.358,53.057,7.324,51.238z M7.514,59.39    c19.922,13.94,40.71,27.935,62.701,38.383c-0.044,1.224-0.091,2.446-0.135,3.671C50.492,87.807,29.879,75.583,8.315,65.333    c-0.225-0.107-0.439-0.098-0.629-0.038C7.626,63.321,7.569,61.354,7.514,59.39z M8,75.724c-0.082-2.952-0.173-5.887-0.264-8.812    c21.234,11.539,41.176,24.927,61.032,38.668c0.404,0.279,0.792,0.345,1.161,0.326c-0.067,1.998-0.145,3.994-0.205,5.992    C49.528,99.635,28.578,88.526,8.016,76.89C8.006,76.5,8.009,76.113,8,75.724z M8.046,78.971    c20.365,12.666,40.318,26.282,61.537,37.479c-0.025,0.942-0.065,1.885-0.087,2.827c-20.348-11.091-41.51-20.35-61.335-32.464    C8.147,84.203,8.096,81.586,8.046,78.971z M8.176,94.673c0.003-1.933-0.006-3.868-0.012-5.802    C27,102.615,48.156,114.129,69.379,123.634c-0.016,0.787-0.05,1.576-0.063,2.363C50.406,113.002,27.132,107.816,8.176,94.673z     M69.266,130.413c-0.02,1.792-0.055,3.586-0.061,5.377c-18.427-13.134-40.962-21.228-60.778-31.947    c-0.09-0.049-0.176-0.06-0.263-0.082c0.002-2.277,0.004-4.56,0.009-6.838C26.42,111.314,49.709,117.929,69.266,130.413z     M8.161,106.113c19.908,11.609,40.451,23.03,61.07,33.3c0.007,3.096,0.01,6.191,0.069,9.281    c-17.275-15.029-41.408-20.417-61.05-31.812C8.185,113.294,8.166,109.704,8.161,106.113z M8.532,126.822    c-0.129-2.669-0.165-5.338-0.226-8.008c19.454,13.142,42.913,19.459,61.147,34.445c0.088,3.045,0.151,6.094,0.303,9.13    c-7.177-6.963-19.645-11.459-27.82-15.807c-6.886-3.662-13.787-7.301-20.613-11.072c-2.491-1.377-12.221-5.467-12.788-8.685    C8.534,126.824,8.532,126.824,8.532,126.822z M8.778,131.046c4.503,5.154,16.964,10.73,19.459,12.164    c13.767,7.913,27.702,16.472,41.762,23.762c0.146,2.371,0.307,4.738,0.499,7.103c-13.046-7.478-26.073-15.375-38.38-23.961    c-6.087-4.246-14.773-13.3-22.979-13.956C8.99,134.452,8.888,132.749,8.778,131.046z M10.315,147.036    c-0.001-0.132,0.036-0.248,0.016-0.387c-0.368-2.51-0.649-5.021-0.908-7.529c19.462,14.265,40.189,27.678,61.438,39.104    c0.06,0.642,0.104,1.287,0.169,1.929C50.956,168.578,29.429,160.404,10.315,147.036z M70.843,80.656    C52.738,65.248,29.286,57.289,7.292,49.086c-0.057-3.758-0.066-7.508-0.028-11.257C24.981,54,49.067,63.198,71.114,72.063    C71.023,74.929,70.945,77.787,70.843,80.656z M71.26,67.478C49.593,57.517,26.313,50.845,7.708,35.277    c-0.122-0.102-0.251-0.166-0.381-0.211c0.055-3.044,0.169-6.091,0.316-9.14c11.434,8.338,23.643,15.322,36.084,22.069    c3.103,1.683,22.356,13.161,27.657,13.339C71.333,63.386,71.32,65.424,71.26,67.478z M58.576,51.28    C41.028,44.145,23.378,34.262,7.773,23.465c0.154-2.663,0.347-5.331,0.593-8.004c9.424,7.264,19.688,13.28,29.918,19.337    c11.443,6.774,21.946,14.825,33.198,21.744c-0.001,0.025-0.001,0.05-0.002,0.075C67.538,54.14,62.145,52.73,58.576,51.28z"/>
                        		<path d="M186.672,67.146c0.001-0.265-0.047-0.542-0.156-0.827c-2.648-6.908-11.393-11.621-17.345-15.427    c-7.979-5.102-16.516-9.296-25.331-12.745c-1.145-0.448-1.922,0.29-2.141,1.224c-1.102,0.211-2.082,0.907-2.326,2.146    c-0.893,4.533-0.5,9.896,0.111,14.831c-3.729-0.728-8.163-0.393-10.825-0.419c-9.845-0.096-20.042,0.211-29.815,1.468    c-1.29,0.166-2.022,1.404-1.794,2.425c-0.041,0.14-0.103,0.261-0.12,0.422c-0.484,4.515-0.821,9.043-0.843,13.586    c-0.013,2.87-0.267,6.711,1.239,9.323c-0.312,0.253-0.656,0.461-0.933,0.764c-0.272,0.3-0.281,0.731,0,1.029    c4.491,4.77,13.291,2.335,19.231,1.977c8.359-0.505,17.362-0.525,25.682-2.127c-0.439,2.177-0.244,4.681-0.393,6.783    c-0.227,3.216-0.579,6.422-0.763,9.644c-0.204,3.562,4.549,4.038,6.004,1.469c0.036-0.001,0.062,0.017,0.098,0.015    c17.658-1.079,31.463-18.599,40.526-32.122C187.646,69.289,187.419,68.036,186.672,67.146z M163.861,55.155    c5.979,3.706,11.047,9.07,16.828,12.889c-0.536,0.775-1.136,1.575-1.696,2.362c-11.289-7.171-21.724-15.591-33.163-22.517    c0.002-1.423-0.04-2.831-0.189-4.186C151.597,47.699,157.767,51.378,163.861,55.155z M102.568,80.902    c0.103-1.621-0.149-3.333-0.358-4.983c1.374,1.139,2.717,2.315,4.123,3.414c0.486,0.38,0.991,0.783,1.492,1.181    C106.036,80.532,104.244,80.601,102.568,80.902z M115.625,80.454c-0.892,0.062-1.86,0.072-2.859,0.07    c-1.279-0.798-2.581-1.571-3.791-2.421c-2.426-1.706-4.756-3.543-7.068-5.401c-0.212-3.068-0.521-6.133-0.835-9.195    c5.711,6.068,12.39,11.976,19.356,16.516C118.814,80.188,117.208,80.344,115.625,80.454z M124.926,79.54    c-0.066-0.074-0.113-0.156-0.2-0.221c-7.742-5.911-15.636-11.344-23.14-17.55c2.024,0.357,4.109,0.528,6.209,0.633    c3.713,3.412,7.458,6.784,11.317,10.032c2.376,2,5.375,5.018,8.517,6.822C126.728,79.351,125.825,79.441,124.926,79.54z     M132.57,78.816c-0.01-0.012-0.006-0.024-0.017-0.035c-2.799-3.077-7.259-5.215-10.62-7.671c-3.801-2.777-7.5-5.695-11.193-8.616    c1.811,0.024,3.621-0.002,5.412-0.036c0.047,0.172,0.129,0.342,0.297,0.499c5.914,5.538,12.161,10.686,18.482,15.748    C134.145,78.747,133.361,78.757,132.57,78.816z M146.878,96.914c0.149-2.632,0.227-5.931-0.099-8.766    c2.528,2.018,5.042,4.055,7.533,6.117C151.943,95.431,149.471,96.346,146.878,96.914z M157.651,92.413    c-3.705-3.569-7.665-6.812-11.733-9.917c0.469-1.554-0.58-3.564-2.569-3.744c-0.846-0.077-1.712-0.06-2.566-0.091    c-7.275-5.302-14.697-10.42-21.571-16.259c0.988-0.021,1.993-0.046,2.956-0.058c1.717-0.022,3.433-0.012,5.148,0.007    c9.618,10.466,21.054,19.909,32.095,28.856C158.825,91.611,158.253,92.041,157.651,92.413z M161.996,89.319    c-8.965-10.214-21.072-17.636-31.14-26.888c1.225,0.035,2.449,0.057,3.676,0.116c2.118,0.101,4.368,0.81,6.542,1.057    c4.943,3.155,9.655,6.604,14.208,10.363c2.534,2.093,4.987,4.29,7.414,6.507c1.485,1.357,2.919,3.208,4.856,3.861    C165.782,86.111,163.934,87.792,161.996,89.319z M169.357,82.453c-1.457-4.3-8.836-8.642-12.058-11.102    c-3.845-2.936-7.915-6.063-12.307-8.417c0.669-0.567,1.057-1.41,0.708-2.371c-0.191-0.526-0.475-0.976-0.795-1.391    c0.069-0.505,0.13-1.041,0.197-1.558c3.904,3.839,7.914,7.588,11.91,11.32c3.805,3.553,8.819,9.593,14.105,10.738    c0.338,0.073,0.657-0.054,0.919-0.248C171.164,80.448,170.278,81.466,169.357,82.453z M172.344,78.08    c-2.979-4.526-9.089-7.718-13.218-11.257c-4.603-3.944-8.995-8.174-13.688-12.014c0.143-1.361,0.244-2.741,0.317-4.119    c10.475,7.418,20.229,15.841,30.978,22.863c-1.391,1.852-2.85,3.705-4.38,5.515C172.516,78.775,172.573,78.428,172.344,78.08z"/>
                        	</g>
                        </g>
                      </svg>
                    </span>
                    <span class="span_panier_icon_header"></span>
                    </a>
                    </div>
                    </li>
                  <?php } ?>

                <a class="dropdown_button_header" href="#menu" aria-label="Ouvrir le menu de navigation"></a>
              </ul>
            </div>
          </div>

          <div>
            <div class="pos-f-t nav_categories_header" id="groupe">

              <div class="collapse" id="cat_vetements" data-parent="#groupe">
                <div class="bg-inverse p-4">
                  <h4 class="text-white">Les vêtements</h4>
                  <a href="categorie.php?cat=tshirt"><img class="img_cat4" sizes="" src="images/header/tshirt.jpg"></a>
                  <a href="categorie.php?cat=pull"><img class="img_cat4" sizes="" src="images/header/pull.jpg"></a>
                  <a href="categorie.php?cat=pantalon"><img class="img_cat4" sizes="" src="images/header/jean.jpg"></a>
                  <a href="categorie.php?cat=jogging"><img class="img_cat4" sizes="" src="images/header/jogging.jpg"></a>
                </div>
              </div>

              <div class="collapse" id="cat_chaussures" data-parent="#groupe">
                <div class="bg-inverse p-4">
                  <h4 class="text-white">Les chaussures</h4>
                  <a href="categorie.php?cat=chaussures&marque=nike"><img class="img_cat5" sizes="" src="images/header/chaussurenike.jpg"></a>
                  <a href="categorie.php?cat=chaussures&marque=coqsportif"><img class="img_cat5" sizes="" src="images/header/chaussurecoq.jpg"></a>
                  <a href="categorie.php?cat=chaussures&marque=ralphlauren"><img class="img_cat5" sizes="" src="images/header/chaussureralph.jpg"></a>
                  <a href="categorie.php?cat=chaussures&marque=adidas"><img class="img_cat5" sizes="" src="images/header/chaussureadidas.jpg"></a>
                  <a href="categorie.php?cat=chaussures&marque=tommyhilfiger"><img class="img_cat5" sizes="" src="images/header/chaussuretommy.jpg"></a>
                </div>
              </div>

              <div class="collapse" id="cat_marques" data-parent="#groupe">
                <div class="bg-inverse p-4">
                  <h4 class="text-white">Les marques</h4>
                  <a href="categorie.php?marque=nike"><img class="img_cat5" sizes="" src="images/header/logonike.jpg"></a>
                  <a href="categorie.php?marque=adidas"><img class="img_cat5" sizes="" src="images/header/logoadidas.jpg"></a>
                  <a href="categorie.php?marque=ralphlauren"><img class="img_cat5" sizes="" src="images/header/logoralph.jpg"></a>
                  <a href="categorie.php?marque=coqsportif"><img class="img_cat5" sizes="" src="images/header/logocoq.jpg"></a>
                  <a href="categorie.php?marque=tommyhilfiger"><img class="img_cat5" sizes="" src="images/header/logotommy.png"></a>
                </div>
              </div>

              <nav class="navbar navbar-inverse bg-inverse" style="display: inline-block; width: 100%; height: 4.72em;" data-testid="primarynav-large-men">

                <?php if(isset($_SESSION['administrateur']) AND $_SESSION['administrateur'] > 0) {?>
                <div style="margin-left: auto; margin-right: auto; width: 52em;">
                <?php } else { ?> <div style="margin-left: auto; margin-right: auto; width: 45em;"> <?php } ?>

                <a href="nouveaute.php" style="float: left;">
                  <button class="button_categories_header" data-testid="primarynav-button">
                    <span class=""><span>Nouveautés</span></span>
                  </button>
                </a>

                <a href="#" style="float: left;">
                  <button class="button_categories_header" type="button" data-toggle="collapse" data-target="#cat_vetements" aria-controls="cat_vetements" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""><span>Vêtements</span><div class="fleches_cat">&darr;</div></span>
                  </button>
                </a>

                <a href="#" style="float: left;">
                  <button class="button_categories_header" type="button" data-toggle="collapse" data-target="#cat_chaussures" aria-controls="cat_chaussures" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""><span>Chaussures</span><div class="fleches_cat">&darr;</div></span>
                  </button>
                </a>

                <a href="categorie.php?cat=cadeaux" style="float: left;">
                  <button class="button_categories_header" data-testid="primarynav-button">
                    <span class=""><span>Cadeaux</span></span>
                  </button>
                </a>

                <a href="outlet.php" style="float: left;">
                  <button class="button_categories_header" data-testid="primarynav-button">
                    <span class="red_categories_header"><span>Outlet</span></span>
                  </button>
                </a>

                <a href="promo.php" style="float: left;">
                  <button class="button_categories_header" data-testid="primarynav-button">
                    <span class=""><span>Promos</span></span>
                  </button>
                </a>

                <a href="#" style="float: left;">
                  <button class="button_categories_header" type="button" data-toggle="collapse" data-target="#cat_marques" aria-controls="cat_marques" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""><span>Toutes les marques</span> <div class="fleches_cat">&darr;</div></span>
                  </button>
                </a>

                <?php if(isset($_SESSION['administrateur']) AND $_SESSION['administrateur'] > 0) { ?>
                <a href="admin.php" style="float: left;">
                  <button class="button_categories_header" data-testid="primarynav-button">
                    <span class=""><span>Administration</span></span>
                  </button>
                </a>
              <?php } ?>

              </div>
              </nav>

            </div>

          </div>
        </div>
      </div>
    </header>
  </div>

  <!-- Menu -->
  <section id="menu" class="dropdown_header">
  <!-- Search -->
   <section>
       <form class="search" action="recherche.php" method="get">
           <input type="text" maxlength="35" name="q" placeholder="Search" />
       </form>
   </section>

  <!-- Links -->
   <section class="sct_dropdown">

     <div class="titre_section_dropdown_first">
       <details class="details_dropdown" data-testid="footer-links">
         <summary class="summary_dropdown" role="menu"><h3 class="style_titre_dropdown">Toutes les marques</h3></summary>
         <a class="link_details2" href="categorie.php?marque=nike" role="menuitem"><h3 class="zoom">Nike</h3></a>
         <a class="link_details2" href="categorie.php?marque=coqsportif" role="menuitem"><h3 class="zoom">Coq Sportif</h3></a>
         <a class="link_details2" href="categorie.php?marque=ralphlauren" role="menuitem"><h3 class="zoom">Ralph Lauren</h3></a>
         <a class="link_details2" href="categorie.php?marque=adidas" role="menuitem"><h3 class="zoom">Adidas</h3></a>
         <a class="link_details2" href="categorie.php?marque=tommyhilfiger" role="menuitem"><h3 class="zoom">Tommy Hilfiger</h3></a>
       </details>
     </div>

     <div class="titre_section_dropdown">
       <details class="details_dropdown" data-testid="footer-links">
         <summary class="summary_dropdown" role="menu"><h3 class="style_titre_dropdown">Les vêtements</h3></summary>
         <a class="link_details2" href="categorie.php?cat=tshirt" role="menuitem"><h3 class="zoom">T-shirt</h3></a>
         <a class="link_details2" href="categorie.php?cat=pull" role="menuitem"><h3 class="zoom">Pull</h3></a>
         <a class="link_details2" href="categorie.php?cat=pantalon" role="menuitem"><h3 class="zoom">Pantalon</h3></a>
         <a class="link_details2" href="categorie.php?cat=jogging" role="menuitem"><h3 class="zoom">Jogging</h3></a>
       </details>
     </div>

     <div class="titre_section_dropdown">
       <details class="details_dropdown" data-testid="footer-links">
         <summary class="summary_dropdown" role="menu"><h3 class="style_titre_dropdown">Les chaussures</h3></summary>
         <a class="link_details2" href="categorie.php?cat=chaussures&marque=nike" role="menuitem"><h3 class="zoom">Nike</h3></a>
         <a class="link_details2" href="categorie.php?cat=chaussures&marque=coqsportif" role="menuitem"><h3 class="zoom">Coq Sportif</h3></a>
         <a class="link_details2" href="categorie.php?cat=chaussures&marque=ralphlauren" role="menuitem"><h3 class="zoom">Ralph Lauren</h3></a>
         <a class="link_details2" href="categorie.php?cat=chaussures&marque=adidas" role="menuitem"><h3 class="zoom">Adidas</h3></a>
         <a class="link_details2" href="categorie.php?cat=chaussures&marque=tommyhilfiger" role="menuitem"><h3 class="zoom">Tommy Hilfiger</h3></a>
       </details>
     </div>

     <div class="titre_section_dropdown linkdirect_outlet">
       <a class="link_details zoom" href="nouveaute.php"> <h3 class="style_titre_dropdown">Nouveautés</h3> </a>
     </div>

     <div class="titre_section_dropdown linkdirect_cadeaux">
       <a class="link_details zoom" href="categorie.php?cat=cadeaux"> <h3 class="style_titre_dropdown">Cadeaux</h3> </a>
     </div>

     <div class="titre_section_dropdown linkdirect_outlet">
       <a class="link_details zoom" href="outlet.php"> <h3 class="style_titre_dropdown2">Outlet</h3> </a>
     </div>

     <div class="titre_section_dropdown linkdirectlast">
       <a class="link_details zoom" href="promos.php"> <h3 class="style_titre_dropdown2">Promos</h3> </a>
     </div>

   </section>

       <!-- Actions -->
   <section class="sct_dropdown2">
       <ul class="actions vertical">

         <?php if(isset($_SESSION['administrateur']) AND $_SESSION['administrateur'] > 0) { ?>
         <li><a href="admin.php" class="button big fit">Administration</a></li>
       <?php } ?>

         <?php
           if (isset($_SESSION['id_client'])) { ?>
               <li>
                 <a href="profil.php" class="">Mon compte</a></li>
               <li><a href="logout.php" class="">Déconnexion</a></li>
           <?php } else { ?>
               <li><a href="connexion.php" class="">Connexion</a></li>
               <li><a href="inscription.php" class="">Inscription</a></li>
           <?php } ?>
       </ul>
   </section>

   <section style="padding-top: 1em;">
        <details class="details_dropdown" data-testid="footer-links">
          <summary class="summary_dropdown" role="menu">Aide &amp; Information</summary>
          <a class="link_details" href="faq.php" role="menuitem">FAQ</a>
          <a class="link_details" href="contact.php" role="menuitem">Contactez-nous</a>
        </details>
   </section>

  </section>
