<?php
// Temporise les données afin qu'elle ne soient pas envoyé immédiatement
ob_start();
$partition = new partition();
$messagePartitionEdited = array();
// On appelle la classe FPDF pour générer un fichier au format PDF
$pdf = new FPDF();
// On crée une nouvelle page 
$pdf->AddPage();
// Si un nom est donné
if (!empty($_POST['namePartition'])) {
    $regexName = '/^[A-ZÉÈÀÊÀÙÎÏÜË]{1}[a-zéèàêâùïüë]+[-]{0,}[A-ZÉÈÀÊÀÙÎÏÜË]{0,1}[a-zéèàêâùïüë]{0,}/';
    (preg_match($regexName, $_POST['namePartition']))?$namePartition = strip_tags($_POST['namePartition']):$messagePartitionEdited['errorName'] = 'Nom de partition incorrecte.';
    // On met un titre au fichier, qui sera visible dans les propriétés du fichier
    $pdf->SetTitle($namePartition, true);
    // On met des mots clés au fichier, qui sera visible dans les propriétés du fichier
    $pdf->SetKeywords($_SESSION['firstName'] . ' ' . $_SESSION['lastName'] . ' ' . $namePartition . ' Maestro', true);
    // On crée l'en-tête du fichier. Il contient le nom donné par l'utilisateur et son nom et son prénom
    $pdf->HeaderPartition($namePartition, $_SESSION['firstName'], $_SESSION['lastName']);
    // On met le nom et le prénom de l'utisateur comme nom de l'auteur du fichier, qui sera visible dans les propriétés du fichier
    $pdf->SetAuthor($_SESSION['firstName'] . ' ' . $_SESSION['lastName']);
    // On met le nom et le prénom de l'utisateur comme nom du créateur du fichier, qui sera visible dans les propriétés du fichier
    $pdf->SetCreator($_SESSION['firstName'] . ' ' . $_SESSION['lastName']);
}
// Si des notes sont stockées dans l'input valueMusicalNote
if(!empty($_POST['valueMusicalNote'])) {
    // On initialise une variable avec les notes comme valeur
    $valuesRecovery = $_POST['valueMusicalNote'];
    // On transforme chasue note en chaine de caractère
    $arrayMusicalNote = explode(",", $valuesRecovery);
    
    // On attribut une police au reste du fichier
    $pdf->SetFont('Arial', 'I', 10);
    foreach($arrayMusicalNote as $displayMusicalNote) {
        // On attribut une position sur l'axe des ordonées aux colonnes
        $yPos = 35;
        // Donne une position sur l'axe des abscisses aux colonnes
        $x = 12.125;
        
        // À chaque note, on génère une colonne auquel une note est mise à la place correspondant à la note
        switch ($displayMusicalNote) {
            case 'do':
                    $pdf->setColumn($yPos, '', '', '', '', '', '', '', '', '', '', chr(149));
                break;
            case 're':
                    $pdf->setColumn($yPos, '', '', '', '', '', '', '', '', '', chr(149), '');
                break;
            case 'mi':
                    $pdf->setColumn($yPos, '', '', '', '', '', '', '', '', chr(149), '', '');
                break;
            case 'fa':
                    $pdf->setColumn($yPos, '', '', '', '', '', '', '', chr(149), '', '', '');
                break;
            case 'sol':
                    $pdf->setColumn($yPos, '', '', '', '', '', '', chr(149), '', '', '', '');
                break;
            case 'la':
                    $pdf->setColumn($yPos, '', '', '', '', '', chr(149), '', '', '', '', '');
                break;
            case 'si':
                    $pdf->setColumn($yPos, '', '', '', '', chr(149), '', '', '', '', '', '');
                break;
            case 'do1':
                    $pdf->setColumn($yPos, '', '', '', chr(149), '', '', '', '', '', '', '');
                break;
            case 're1':
                    $pdf->setColumn($yPos, '', '', chr(149), '', '', '', '', '', '', '', '');
                break;
            case 'mi1':
                    $pdf->setColumn($yPos, '', chr(149), '', '', '', '', '', '', '', '', '');
                break;
            case 'fa1':
                    $pdf->setColumn($yPos, chr(149), '', '', '', '', '', '', '', '', '', '');
                break;
        }
    }
}

// Au clic sur le boutton
if (isset($_POST['submitEditPartition'])) {
    // Si il n'y a aucun nom entré, alors on envoie un message d'erreur
    if (empty($_POST['namePartition'])) {
        $messagePartitionEdited['noName'] = 'Ta partition n\'a pas de nom.';
    } else {
        $pathUser = 'partitions/' .  $_SESSION['id'];
        (!file_exists($pathUser . '/'))?mkdir($pathUser . '/', 0777, true):'';
        $pathPartition = 'partitions/' .  $_SESSION['id'] . '/' . $namePartition . '.pdf';
        //On crée le fichier au format .pdf, qui sera redirigé dans le dossier partitions/ et aura comme nom le nom de l'utilisateur avec son nom et son prénom
        $pdf->Output('F', $pathPartition, true);
        // On modifie les permissions pour que le fichier puisse être lus et exécuté
        chmod($pathPartition, 0777);
        // Si il y a un status
        if (isset($_POST['status'])) {
            // et qu'il vaut finished
            if ($_POST['status'] == 'Terminée') {
                // On attribut 1, qui correspond à une partition finie
                $id_asfbcvj_statusPartition = 1;
                // Et qu'il vaut unfinished
            } else if ($_POST['status'] == 'En cours') {
                // 2 correspond à une partition qui n'est pas encore finie
                $id_asfbcvj_statusPartition = 2;
            }
        } else {
            $messagePartitionEdited['noStatus'] = 'Choisis un status.';
        }
        // Si il n'y a aucune erreur
        if (count($messagePartitionEdited) == 0) {
            // On insert le chemin du fichier PDF dans la base de donnée
            $partition->insertPartition($_SESSION['id'], $pathPartition, $id_asfbcvj_statusPartition, 1, $namePartition);
            // Et on envoie un message
            $messagePartitionEdited['success'] = 'Ta partition est bien envoyée.';
        }
    }
}
//// Envoie les données temporisées et met fin fin à la temporisation des données
ob_flush();

// On instancie un objet
$formSendPartition = new partition();
// On crée un tabelau pour y mettre tous lse messages d'erreurs
$messagePartition = array();

// Au clic sur le bouton submitPartition
if (isset($_POST['submitPartition'])) {
    // Si il y a un ficher et qu'il n'y a aucune erreur
    if(!empty($_FILES['partitionFile']['name']) && $_FILES['partitionFile']['error'] == 0) {
        // On vérifie si le fichier ne dépasse pas 20MO
        if ($_FILES['partitionFile']['size'] <= 20000000) {
            // On retourne les information sur le fichier envoyé 
            $partition = pathinfo($_FILES['partitionFile']['name']);
            // On récupère l'extension du fichier envoyé
            $extension_upload = $partition['extension'];
            // On met dans un tableau les format autorisés
            $extensions_allow = array('pdf');
            // Si le fichier a bien une extension autorisée, on le stocke. Sinon u=on envoie un message d'erreur
            if (in_array($extension_upload, $extensions_allow)) {
                $pathUser = 'partitions/' .  $_SESSION['id'];
                $pathPartition = $pathUser . '/' . $_FILES['partitionFile']['name'];
                // On vérifie si l'utilisateur a déjà un dossier pour y mettre ses partitions
                (!file_exists($pathUser))?mkdir($pathUser, 0777, true):'';
                // On peut valider le fichier et le stocker définitivement
                move_uploaded_file($_FILES['partitionFile']['tmp_name'], $pathPartition);
                // On modifie les permissions pour que le fichier puisse être lus et exécuté
                chmod($pathPartition, 0777);
                $formSendPartition->insertPartition($_SESSION['id'], $pathPartition, 1, 4, $_FILES['partitionFile']['name']);
                $messagePartition['sendFile'] = 'L\'envoi a bien été effectué !';
            } else {
                $messagePartition['noSendFile'] = 'L\'envoi n\'a pas pu être effectué !';
            }
        }
    } else {
         $messagePartition['sizeFile'] = 'Le fichier est trop lourd';
    }
}