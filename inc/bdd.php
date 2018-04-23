<?php
session_start();
try

{

	$bdd = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'root', '');

}

catch (Exception $e)

{

        die('<b>Il y a un probl&egrave;me sur notre site, revenez plus tard ! </b><br/><br/>' . $e->getMessage());

}



if(isset($_SESSION['id_utilisateur'])) {
   $getid = intval($_SESSION['id_utilisateur']);
   $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE id_utilisateur = ?');
   $req->execute(array($getid));
   $userinfo = $req->fetch();
   $_SESSION['id_utilisateur'] = $userinfo['id_utilisateur'];
   $_SESSION['prenom_utilisateur'] = $userinfo['prenom_utilisateur'];
   $_SESSION['adresse_email'] = $userinfo['adresse_email'];
   $_SESSION['administrateur'] = $userinfo['administrateur'];
}

?>
