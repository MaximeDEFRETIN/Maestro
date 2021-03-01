<?php
$userConnection = new user();
// $connectionMessage sert à stocker les erreurs
$connectionMessage = array();
$regexName = '/^[A-ZÉÈÀÊÀÙÎÏÜË]{1}[a-zéèàêâùïüë]+[-]{0,}[A-ZÉÈÀÊÀÙÎÏÜË]{0,1}[a-zéèàêâùïüë]{0,}/';
// Si on clique sur connection
if (isset($_POST['connection'])) {
    // Et si le champ correspondant au pseudo n'est pas vide
    if (!empty($_POST['pseudoConnection'])) {
        // On vérifie que le pseudo rentré est correcte
        if(preg_match($regexName, $_POST['pseudoConnection'])) {
            $userConnection->getHashByPseudo($_POST['pseudoConnection']);
        } else {
            // Si le pseudo n'est pas correcte, on envoie un message d'erreur
            $connectionMessage['wrongPseudo'] = 'Le pseudo que tu as écrit n\'est pas correct';
        }
    // Si aucun pseudo n'est donné, on envoie un message d'erreur
    } else {
        $connectionMessage['emptyPseudo'] = 'Tu n\'as pas écris ton pseudo.';
    }
    
    // On vérifie si le champs correspondant au mot de passer n'est pas vide
    if (!empty($_POST['passwordConnection'])) {
        // On vérifie si le mot de passe entré correspon au mot de passe dans la base de donnée
        if (password_verify($_POST['passwordConnection'], $userConnection->password)) {
            // Si il n'y a aucune erreur, alors on crée une session après avoir récupéré les informations sur l'utilisateur
            if (count($connectionMessage) == 0) {
                // On appel la méthode connection() pour récupérer les informations sur l'utilisateur
                $userConnection->connection($_POST['pseudoConnection']);
                var_dump($userConnection);

                // session_start() permet de démarrer une session
                session_start();
                // $_SESSION permet de garder les informations lié à un utilisateur lorsqu'il est connecté
                $_SESSION['id'] = $userConnection->id;
                $_SESSION['pseudo'] = $userConnection->pseudo;
                $_SESSION['password'] = $userConnection->password;
                $_SESSION['lastName'] = $userConnection->lastName;
                $_SESSION['firstName'] = $userConnection->firstName;
                $_SESSION['mail'] = $userConnection->mail;
                
                var_dump($_SESSION);
                // header() redirige vares la page indiquée
                header('Location: Profil');
                // exit termine le script
                exit;
            }
        // Si le mot de passe ne correspond pas à celui entré dans la base de donnée, on envoie un message d'erreur
        } else {
            $connectionMessage['wrongPassword'] = 'Le mot de passe que tu as donné n\'est pas correcte.';
        }
      // Si le champ du mot de passe est vide, on affiche un mot de passe
    } else if (empty($_POST['passwordConnection'])){
        $connectionMessage['emptyPassword'] = 'Il faut donner un mot de passe.';
    }
}