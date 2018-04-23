<?php

    //include PHPMailerAutoload.php
    require 'phpmailer/PHPMailerAutoload.php';

            $mail = new PHPMailer();

            //set a host
            $mail->Host = "smtp.gmail.com";

            //enable SMTP
            $mail->isSMTP();
            //set authentication to true
            $mail->SMTPAuth = true;

            //set login details for Gmail account
            $mail->Username = "glpi.mirror@gmail.com";
            $mail->Password = "Glpimirror66";

            //set type of protection
            $mail->SMTPSecure = "ssl"; //or we can use TLS

            //set a port
            $mail->Port = 465; //or 587 if TLS

            //set subject
            $mail->Subject = "Contact GLPI";

            //set HTML to true
            $mail->isHTML(true);

            //Définit le grade
            if ($grade == "1") {
              $gradedef = "Membre";
            }
            else {
              if ($grade == "2") {
                $gradedef = "Technicien";
              }
              if ($grade == "3") {
                $gradedef = "Administrateur";
              }
            }

            //set body
            $mail->Body = "Vous avez été ajouté en tant que $gradedef sur GLPI Mirror 2018 <br/>
                          Votre identifiant est : $pseudo <br/>
                          Votre mot de passe est : $mdpclair  <br/> <br/>
                          Nous vous conseillons de changer votre mot de passe depuis votre espace personnel GLPI.";

            //add attachment
            //$mail->addAttachment('attachment/fbcover.png', 'Facebook cover.png');

            //nom qui s'affiche
            $mail->setFrom('glpi.mirror@gmail.com', 'Inscription GLPI');

            //adresse de celui qui vas recevoir
            $mail->addAddress($email);

            $mail->SMTPDebug = 0;
            //send an email
            if ($mail->send())
                header('Location: admin.php?selector=2&sent');


            //ancien test avec variables
            //mail('gregory.cascales@gmail.com','Contact Ghand','$message','From: ' . $email);
            //header('Location: index.php?sent');
            exit();
?>
