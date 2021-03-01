<?php
// On instancie un objet
$partitionName = new partition();

// Si l'utilisateur à recherché une partition
if (isset($_GET['id'])) {
    // On récupère l'id de la partition recherchée
    (filter_var($_GET['id'], FILTER_VALIDATE_INT))?$id = $_GET['id']:'';
    // On sélectionne la partition pour l'afficher
    $partitionOtherUser = $partitionName->getPartitionById($id);
}

// On instancie un objet
$pseudo = new partition();

// Si l'utilisateur à recherché une partition
if (isset($_GET['id'])) {
    // On récupère l'id de la partition recherchée
    $pseudo->id = $_GET['id'];
    // On sélectionne le pseudo pour l'afficher
    $pseudoUser = $pseudo->getPseudoById();
}

// On instancie un objet
$commentUser = new comment();
$messageComment = array();

// Si l'utilisateur à recherché une partition
if (isset($_POST['submitComment'])) {
    // Si l'utilisateur commente
    if (!empty($_POST['commentPartition'])) {
        (filter_var($_GET['id'], FILTER_VALIDATE_INT))?$idPartitions = $_GET['id']:$messageComment['errorIdPartition'] = 'La bonne partition \'a pas été récupérée.';
        (!empty($_POST['commentPartition']))?$commentPartition = strip_tags($_POST['commentPartition']):$messageComment['errorCommentPartition'] = 'Tu n\'as pas écrit de commentaire.';
        // On insert le commentaire avec l'id de l'utilisateur et la date  qui commente
        // et l'id de la partition commentée
        (count($messageComment) == 0)?$commentUser->insertComment($commentPartition, $_SESSION['id'], $idPartitions) && $messageComment['success'] = 'Ton commentaire à été pris en comtpe.':'';
    }
}

// On instancie un nouvel objet
$displayComments = new comment();

// Si l'utilisateur à recherché une partition
if ($_GET['id']) {
    (filter_var($_GET['id'], FILTER_VALIDATE_INT))?$idPartitions = $_GET['id']:$messageComment['errorIdPartition'] = 'La bonne partition \'a pas été récupérée.';
    // On utilise la méthode pour afficher les commentaires des utilisateurs
    // par rapport l'id de la parrtition commentée et l'id de l'utilisateur
    $commentList = $displayComments->displayComments($idPartitions);
}