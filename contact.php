<?php
$error1 = "";
if (isset($_POST['sendmail'])){
  $recipient = "gregory.cascales@gmail.com";
  $fmtMail= implode("", file("contactmail/mail.htt"));

  foreach($_POST as $key=> $val) {
  $fmtMail= str_replace("<$key>", $val, $fmtMail);
  }

  if ($_POST["access"] == "stopspam") {
    mail($recipient, $_POST["subject"], $fmtMail);
    $error1 = "Merci de nous avoir contacté !";

  } else {
    $error1 = "problème lors de l'envoi du formulaire, veuillez réessayer !";
  }
}
?>


<!-- HEADER -->
<?php include ('inc/header.php') ?>

<!-- CSS DE LA PAGE -->
<link rel="stylesheet" href="assets/css/main.css" />

    <!-- Wrapper -->
    <div id="wrapper">

      <!-- Main -->
      <div id="main">

        <article class="post">

          <!-- AFFICHAGE ERREUR -->
          <?php if($error1 != ""){
            echo $error1 . "<hr>";
          }?>

        <h1>Formulaire de contact(Go spam c'est l'adresse de greg) :</h1>

        <form action="#" method="POST">
          <input type="hidden" name="subject" value="Formulaire de contact">
          <input type="hidden" name="access" value="stopspam">
          <textarea name="message" cols="60" rows="20" wrap="PHYSICAL" id="saisie"></textarea>
          <input type="submit" name="sendmail" value="Envoyer">
        </form>

      </article>

        <!-- Footer -->
        <?php include('inc/footer.php') ?>
