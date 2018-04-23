
<?php include ('inc/bdd.php'); ?>
<?php
         // info client
if (isset($_POST['valider'])){
  $Titre=htmlentities(trim($_POST['Titre']));
 $Mail=htmlentities(trim($_POST['Mail']));

  $Prenom=htmlentities(trim($_POST['Prenom']));
 $Nom=htmlentities(trim($_POST['Nom']));


  $Date2=htmlentities(trim($_POST['Date']));



  //adresse livraison
 $Prenom2=htmlentities(trim($_POST['Prenom2']));


  $Nom2=htmlentities(trim($_POST['Nom2']));
 $Societe=htmlentities(trim($_POST['Societe']));


  $Adresse=htmlentities(trim($_POST['Adresse']));
 $CP=htmlentities(trim($_POST['Cp']));


  $Ville=htmlentities(trim($_POST['Ville']));
 $Pays=htmlentities(trim($_POST['Pays']));

  $Tel=htmlentities(trim($_POST['Tel']));



	            // Création adresse livraison du client anonyme
                  $AdresseLivraison = $bdd->prepare("INSERT INTO Commandeanonymes(Titre,Mail,Prenom,Nom,Date,Prenom2,Nom2,Societe,adresse,Cp,Ville,Pays,Tel) VALUES(?, ?, ?,?,?,?, ?, ?,?,?,?,?,?)");
               $AdresseLivraison->execute(array($Titre, $Mail, $Prenom,$Nom,$Date,$Prenom2, $Nom2 , $Societe,$Adresse,$CP,$Ville,$Pays,$Tel));
}
?>


<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<link rel="stylesheet" type="text/css" href="./css/ticket.css">
	<title> Commande </title>
</head>

<header id="header">
	<?php include './inc/header.php' ?>

</header>

	<article class="post">
<div id="wrapper">
<body>

<div id="main">
<h1>Votre Commande</h1>

<h2>Compte</h2>

<form id="cadre" method="POST" action="#">

    <label>Titre</label><select name="titre">
				<option value ="M.">M.</option>
				<option value ="Mme">Mme</option>

			</select>
    		  <label>Mail</label><input type="text" name="Mail" placeholder="mail"/>
                <label>Prenom</label>  <input type="text" name="Prenom" placeholder="Prenom"/>
    		  <label>Nom</label><input type="text" name="Nom" placeholder="Nom"/>
                <label>Date de naissance</label>  <input type="date" name="Date" placeholder="date"/>

                <h2>Adresse de livraison</h2>

               <label>Prenom</label>   <input type="text" name="Prenom2" placeholder="Prenom"/>
    		  <label>Nom</label><input type="text" name="Nom2" placeholder="Nom"/>
                 <label>Societe(optionel)</label> <input type="text" name="Societe" placeholder="Société"/>
    		  <label> Adresse</label><input type="text" name="Adressse" placeholder="Adresse"/>
                 <label>Code Postal</label> <input type="text" name="Cp" placeholder="Code Postal"/>
    		  <label>Ville</label><input type="text" name="Ville" placeholder="Ville"/>
                    <label>Pays</label><select name="Pays">
				<option value ="France">France</option>
				<option value ="Canada">Canada</option>

			</select>
               <label>Téléphone mobile</label>   <input type="text" name="Tel" placeholder="Téléphone Mobile"/>

               </br>
               <input style="font-size: 22px;" type="submit" name="valider"/>

		</article>
</form>

</body>

</html>
