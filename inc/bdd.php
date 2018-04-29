<?php
$host = 'localhost';
$dbname = 'shop';
$user = 'root';
$mdp = 'root';

session_start();
try


{

	$bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', ''.$user.'', ''.$mdp.'');

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
