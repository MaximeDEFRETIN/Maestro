<?php
// On crée un tableau pour y mstocker les messages d'erreur
$formMessageModification = array();
$regexName = '/^[A-ZÉÈÀÊÀÙÎÏÜË]{1}[a-zéèàêâùïüë]+[-]{0,}[A-ZÉÈÀÊÀÙÎÏÜË]{0,1}[a-zéèàêâùïüë]{0,}/';
// On isntancie un nouvel objet
$userUpdate = new user();

// Si l'utilisateur clique sur l bouton d'envoie
if (isset($_POST['updateSubmit'])) {
    // Si l'utilisateur est connecté
     if (isset($_SESSION['id'])) {
        (filter_var($_SESSION['id'], FILTER_VALIDATE_INT))?$id = $_SESSION['id']:$formMessageModification['errorId'] = 'Tu n\'es pas connecté.';
     }
    // Si le champs correspondant au nom n'est pas vide, on attribut la valeur entrée dans le champs
    if (!empty($_POST['lastName'])) {
        (preg_match($regexName, $_POST['lastName']))?$lastName = strip_tags($_POST['lastName']):$formMessageModification['lastName'] = 'Le nom n\'est pas écris correctement.';
    } else {
        $formMessageModification['lastName'] = 'Le nom n\'a pas pu être modifier.';
    }

    // Si le champs correspondant au prénom n'est pas vide, on attribut la valeur entrée dans le champs
    if (!empty($_POST['firstName'])) {
        (preg_match($regexName, $_POST['firstName']))?$firstName = strip_tags($_POST['firstName']):$formMessageModification['firstName'] = 'Le prénom n\'est pas écris correctement.';
    } else {
        $formMessageModification['firstName'] = 'Le prénom n\'a pas pu être modifier.';
    }

    // Si le champs correspondant au pseudo n'est pas vide, on attribut la valeur entrée dans le champs
    if (!empty($_POST['pseudo'])) {
        (preg_match($regexName, $_POST['pseudo']))?$pseudo = strip_tags($_POST['pseudo']):$formMessageModification['pseudo'] = 'Le pseudo n\'est pas écris correctement.';
    } else {
        $formMessageModification['pseudo'] = 'Le pseudo n\'a pas pu être modifier.';
    }

    // Si le champs correspondant au mail n'est pas vide, on attribut la valeur entrée dans le champs
    if (!empty($_POST['mail'])) {
        $userUpdate->mail = $_POST['mail'];
        (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))?$mail = $_POST['mail']:$formMessageModification['mail'] = 'Ce n\'est pas une adresse mail correcte.';
    } else {
        $formMessageModification['mail'] = 'L\'adresse mail n\'a pas pu être modifier.';
    }

    // Si il n'y a aucune erreur
    if (count($formMessageModification) == 0) {
        ($userUpdate->updateProfile($id, $lastName, $firstName, $pseudo, $mail))?:$formMessageModification['errorUpProfil'] = 'Erreur lors de la modification du nom du profil.';
    }
}

// On crée la variable insertSuccess pour s'aasurer de la réussite de la modification du profil
//$insertSuccessUpdatePassword = false;
// On instanice un nouvlel objet
$updatePassword = new user();
// On crée tableau contenant les messages d'erreurs
$formErrorPassword = array();
$id = 0;
$password = '';

// Lorsque l'utilisateur clique sur le bouton 
if (isset($_POST['updateSubmitPassword'])) {
    // Si l'utilisateur est connecté
     if (isset($_SESSION['id'])) {
        (filter_var($_SESSION['id'], FILTER_VALIDATE_INT))?$id = $_SESSION['id']:$formMessageModification['errorId'] = 'Tu n\'es pas connecté.';
     } else {
        $formErrorPassword['id'] = 'Pas de session.';
    }
    // Si le champs correspondant au mot de passe n'est pas vide, on attribut la valeur entrée dans le champs.
    // Le mot de passe est hashé, ce qui permet de le sécuriser
    if (!empty($_POST['password'])) {
        // Indique que n'importe quel caractère peut être choisis tant que le mot de passe a entre 4 et 8 caractères
        $regexPassword = '/^(.){4,8}$/';
        
        (preg_match($regexPassword, $_POST['password']))?$password = password_hash($_POST['password'], PASSWORD_BCRYPT):$password=false; $formErrorPassword['password'] = 'Le mot de passe ne correspond pas à ce qui est attendu.';
      // Si le champ est vide, on envoie un message d'erreur
    } else {
        $formErrorPassword['password'] = 'Le mot de passe n\'a pas pu être modifier.';
    }
}

// Si il n'y a aucune erreur
if (count($formErrorPassword) == 0) {
    ($updatePassword->updatePassword($id, $password))?$formErrorPassword['updatePassword'] = 'Mot de passe modifié.':$formErrorPassword['updatePassword'] = 'Erreur lors de la modification du mot de passe.';
}