<?php
// Traitement du formulaire s'il a bien été envoyé EDITPDP
if(isset($_POST["edit_photo"])) {
  if (isset($_FILES['avatar'])) {
    $dossier = 'images/produits/';
    $fichier = basename($_FILES['avatar']['name']);
    $taille_maxi = 530000;
    $taille = filesize($_FILES['avatar']['tmp_name']);
    $extensions = array('.png', '.jpg', '.jpeg');
    $extension = strrchr($_FILES['avatar']['name'], '.');

    //Début des vérifications de sécurité...
    //Si l'extension n'est pas dans le tableau
    if(in_array($extension, $extensions)){

    if($taille<$taille_maxi){

      //On formate le nom du fichier ici...
      $fichier = strtr($fichier,
      'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
      'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
      $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

      //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
      if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)){
        //on met le chemin dans la var
        $linkpdp = $dossier . $fichier;
        //Ajout de la photo au produit en question dans la bdd
        $editphoto = $bdd->prepare("UPDATE photoproduit set photo_produit = ? WHERE id_produit = ? AND pardefaut_photoproduit = 1 LIMIT 1");
        $editphoto->execute(array($linkpdp, $idproduit));

        $errors1[] = 'La photo a bien été enregistrée !';

      } else { //Sinon (la fonction renvoie FALSE).
      $errors[] = "Problème lors de l'envoi du fichier, réessayer !";
      }
    } else {
      $errors[] = "La taille du fichier dépasse la taille maximale !";
    }
    } else {
      $errors[] = "L'extension du fichier n'est pas valide !";
    }
  } else {
    $errors[] = "Ajouter une image avant d'upload !";
  }
}
?>
