<?php
// On instancie un objet
$mailRecovery = new user();
// On crée un tableau dans lequel on mets les messages destinés à l'utilisateur
$message = array();
// La regex sert à vérifier que l'utilisateur rentre bien une addresse mail
$regexMail = '/[a-zA-Z0-9_\-.]{1,}[@]{1}[a-zA-Z0-9_\-.]{1,}[.]{1}[a-zA-Z]{1,}/';

// Si l'utilisateur clique sur le bouton
if(isset($_POST['recoverySubmit'])) {
    // Et qu'il renter une addresse mail
    if (!empty($_POST['mailRecovery'])) {
        // Si l'addresse mail n'est pas correcte, alors on envoie un message à l'utilisateur
        if(filter_var($_POST['mailRecovery'], FILTER_VALIDATE_EMAIL) == false) {
            $message['wrongMail'] = 'Le mail que tu as écrit n\'est pas correct';
        } else {
            // On attribut à mail l'addresse mail entrée par l'utilisateur
//            (filter_var($_POST['mailRecovery'], FILTER_VALIDATE_INT))?$mail = $_POST['mailRecovery']: $message['wrongMail'] = 'L\'adresse mail qu tu as indiquée n\'est pas écrit correctment.';
            // Avec la méthode, on récupère la clé de l'utilisateur via son addresse mail
            var_dump($_POST['mailRecovery']);
            $key = $mailRecovery->getKeyByMail($_POST['mailRecovery']);
            var_dump($key);
            // Si la méthode ne renvoie pas false, alors on envoie un mail à l'utilsiateur pour qu'il puisse modifier son mot ed passe
            // Sinon on envoie un message d'erreur
            if ($key == true) {
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $headers .= 'From: Maxime <no-reply@Maestro.fr>' . "\r\n";
                $subject = 'Réinitialisation du mot de passe';
                $messageSend = 'Bonjour !' . "\r\n" . 'Voici un <a href="maestro/Recuperation-mot-de-passe-' . $key->keyUser . '">lien</a> te permettant de modifier ton mot de passe.';

                mail($_POST['mailRecovery'], $subject, $messageSend, $headers);

                $message['successMail'] = 'Un email a été envoyé. Tu vas recevoir un lien qui te permettera de modifier ton mot de passe.';
            } else {
                $message['noMail'] = 'L\'addresse mail que tu as donné ne correspond pas à celui d\'un utilisateur.';
            }
        }
    } else {
        $message['emptyMail'] = 'Il faut que tu mettes une addresse mail.';
    }
}