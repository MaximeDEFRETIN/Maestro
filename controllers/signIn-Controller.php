<?php
if (isset($_POST['checkPseudo'])) {
    session_start();
    include_once '../models/dataBase.php';
    include_once '../models/user.php';
    $pseudoUnique = new user();
    
    $pseudoUnique->pseudo = strip_tags($_POST['checkPseudo']);
    $checkPseudo = $pseudoUnique->checkPseudoUnique();
    if ($checkPseudo !== false) {
        if ($checkPseudo == 1) {
            $_SESSION['formError'] = true;
        }
        echo json_encode($checkPseudo);
    }
} else if (isset($_POST['checkMail'])) {
    include_once '../models/dataBase.php';
    include_once '../models/user.php';
    $mailUnique = new user();
    $mailUnique->mail = strip_tags($_POST['checkMail']);
    $checkMail = $mailUnique->checkMailUnique();
    // On vérifie que $checkMail est différent de false mais pas de 0 ou 1
    if ($checkMail !== false) {
        echo json_encode($checkMail);
    }
} else {
    // On creée un objet $user
    $user = new user();
    // Les regex servent à vérifier les information entrées dans le formulaire
    // La regex donne comme pattern n'importe quel lettre en majuscule comme 1ère lettre, suivis de n'importe quel lettre minuscule quel que soit leur nombre
    // avec un tiret possible et n'importe quelle lettre majuscule et n'importe quel lettre minuscule
    $regexName = '/^[A-ZÉÈÀÊÀÙÎÏÜË]{1}[a-zéèàêâùïüë]+[-]{0,}[A-ZÉÈÀÊÀÙÎÏÜË]{0,1}[a-zéèàêâùïüë]{0,}/';
    // Indique que n'importe quel caractère peut être choisis tant que le mot de passe a entre 4 et 8 caractères
    $regexPassword = '/^(.){4,8}$/';
    // $insertSuccees sert à afficher un message lorsque l'utilisateur est bien enregistré
    $insertUserSuccess = false;
    // $addUserError sert à stocker les erreurs
    $addUserError = array();
    // Lorsque l'on clique sur signIn et qu'il n'y a aucune erreur, le formulaire es validé
    if (isset($_POST['signIn'])) {
        if(empty($_POST['lastName']) && empty($_POST['firstName']) && empty($_POST['firstName']) && empty($_POST['mail']) && empty($_POST['pseudo']) && empty($_POST['password']) && empty($_POST['passwordConfirm'])){
            $addUserError['emptyFormSignIn'] = 'Il faut remplir entièrement le formulaire pour s\'inscrire.';
        } else {
        // On vérifie que les informations entrées dans le formulaire correcpondent à celles qui sont attendues
        if (!empty($_POST['lastName'])) {
            $lastName = strip_tags($_POST['lastName']);
            (!preg_match($regexName, $lastName))?$addUserError['lastName'] = 'Le nom n\'est pas correct.':'';
        } else {
            $addUserError['emptyLastName'] = 'Le nom n\'est pas donné.';
        }
        if (!empty($_POST['firstName'])) {
            $firstName = strip_tags($_POST['firstName']);
            (!preg_match($regexName, $firstName))?$addUserError['firstName'] = 'Le prenom n\'est pas correct.':'';
        } else {
            $addUserError['emptyFirstName'] = 'Le prénom n\'est pas donné.';
        }
        if (!empty($_POST['mail'])) {
            $mail = strip_tags($_POST['mail']);
            (!filter_var($mail, FILTER_VALIDATE_EMAIL))?$addUserError['mail'] = 'L\'adresse mail n\'est pas correcte.':'';
        } else {
            $addUserError['emptyMail'] = 'L\'addresse mail n\'est pas donné.';
        }
        if (!empty($_POST['pseudo']) ) {
            $pseudo = strip_tags($_POST['pseudo']);
            (!preg_match($regexName, $pseudo))?$addUserError['pseudo'] = 'Le pseudo n\'est pas correcte.':'';
        } else {
            $addUserError['emptyPseudo'] = 'Le pseudo n\'est pas donné.';
        }
        if (!empty($_POST['password'])) {
            (!preg_match($regexPassword, $_POST['password']))?$addUserError['password'] = 'Le mot de passe n\'est pas correcte.':$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        } else {
            $addUserError['emptyPassword'] = 'Le mot de passe n\'est pas donné.';
        }
        //On vérifie si les mots de passe son différents
        if (!empty($_POST['passwordConfirm']) && !empty($_POST['password'])) {
            ($_POST['passwordConfirm'] != $_POST['password'])?$addUserError['passwordConfirm'] = 'Les mots de passe sont différents.':'';
        }
        
        $keyUser = rand(1000, 9999);
        
        //Si $user ne correspond pas au model, alors on envoie un message d'erreur
        if (count($addUserError) == 0) {
        //On appelle la méthode
        $user->addUser($lastName, $firstName, $mail, $pseudo, $password, $keyUser);
        $insertUserSuccess = true;
        $addUserError['add'] = 'Ton inscription est réussie !';
            }
        }
    }
}