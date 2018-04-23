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

            //set body
            $mail->Body = "Votre compte à été supprimé de GLPI MIRROR 2018 <br/> <br/>
                          Si vous pensez qu'il s'agit d'une erreur, veuillez contacter notre équipe depuis l'index du site.";

            //add attachment
            //$mail->addAttachment('attachment/fbcover.png', 'Facebook cover.png');

            //nom qui s'affiche
            $mail->setFrom('glpi.mirror@gmail.com', 'Supression GLPI');

            //adresse de celui qui vas recevoir
            $mail->addAddress($emailsuppr);

            $mail->SMTPDebug = 0;
            //send an email
            if ($mail->send())
			         header ('Refresh:0; admin.php?selector=2');

            exit();
?>
