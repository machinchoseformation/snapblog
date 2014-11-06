<?php

    namespace Controller;

    use \PHPMailer; //phpMailer n'utilise pas les namespaces... il est donc défini dans l'espace global
    use \Config;

    class Mailer {

        //récupère le contenu d'un template et le retourne
        protected function get_include_contents($filename, array $variablesToMakeLocal = array()) {
            extract($variablesToMakeLocal);
            $filename = "mails/".$filename;
            if (is_file($filename)) {
                ob_start();
                include $filename;
                return ob_get_clean();
            }
            return false;
        }

        protected function getDefaultMail(){
            $mail = new PHPMailer();        //Crée un nouveau message (Objet PHPMailer)

            //INFOS DE CONNEXION
            $mail->isSMTP();                        //On utilise SMTP
            $mail->Username = Config::MAILER_USER;  //nom d'utilisateur
            $mail->Password = Config::MAILER_PASS;  //mot de passe
            $mail->Host = 'smtp.mandrillapp.com';               //smtp.gmail.com pour gmail
            $mail->Port = 587;                                  //Le numéro de port
            $mail->SMTPAuth = true;                             //On utilise l'authentification SMTP ?
            //$mail->SMTPSecure = 'tls';                        //décommenter pour gmail

            $mail->isHTML(true);                                // Contenu du message au format HTML

            $mail->setFrom('contact@snapblog.com', 'The SnapBlog Team');    //qui envoie ce message ? (email, noms)
            $mail->addReplyTo('contact@snapblog.com', 'The SnapBlog Team'); //à qui répondre si on clique sur "reply" (email, noms)
            
            return $mail;
        }

        public function sendThankYou($username, $email, $type){
            
            $mail = $this->getDefaultMail();            
            $mail->addAddress($email, $username);   //destinataire
            
            $mail->Subject = 'Merci pour votre participation sur SnapBlog !';  //le sujet

            $data =  array(
                "username" => $username,
                "email" => $email,
                "type" => $type
            );

            $mail->Body = $this->get_include_contents("thankYouComment.php", $data);                    //le message

            //envoie le message
            return $mail->send();
        }

    }