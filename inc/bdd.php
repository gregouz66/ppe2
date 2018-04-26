<?php
session_start();
try

{

	$bdd = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'root', 'root');

}

catch (Exception $e)

{

        die('<b>Il y a un probl&egrave;me sur notre site, revenez plus tard ! </b><br/><br/>' . $e->getMessage());

}

if(isset($_SESSION['id_client'])) {
   $getid = intval($_SESSION['id_client']);
   $req = $bdd->prepare('SELECT * FROM client WHERE id_client = ?');
   $req->execute(array($getid));
   $userinfo = $req->fetch();
   $_SESSION['id_client'] = $userinfo['id_client'];
   $_SESSION['prenom_client'] = $userinfo['prenom_client'];
   $_SESSION['nom_client'] = $userinfo['nom_client'];
   $_SESSION['email_client'] = $userinfo['email_client'];
   $_SESSION['nom_affichage'] = $userinfo['nom_affichage'];
	 $_SESSION['administrateur'] = $userinfo['administrateur'];
}

?>
