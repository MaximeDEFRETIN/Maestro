<?php
// Temporise les données afin qu'elle ne soient pas envoyé immédiatement
ob_start();

// On instancie un objet
$partitionPiano = new partition();
// On crée un tableau dans lequel on met les messages destiné à l'utilisateur
$messagePartitionPiano = array();

//On appelle la classe FPDF pour générer un fichier au format PDF
$pdf = new FPDF();
//On crée une nouvelle page 
$pdf->AddPage();
if (!empty($_POST['namePartitionPiano'])) {
    $regexName = '/^[A-ZÉÈÀÊÀÙÎÏÜË]{1}[a-zéèàêâùïüë]+[-]{0,}[A-ZÉÈÀÊÀÙÎÏÜË]{0,1}[a-zéèàêâùïüë]{0,}/';
    (preg_match($regexName, $_POST['namePartitionPiano']))?$namePartition = strip_tags($_POST['namePartitionPiano']):$messagePartitionPiano['errorName'] = 'Nom de partition incorrecte.';
    // On met un titre au fichier, qui sera visible dans les propriétés du fichier
    $pdf->SetTitle($namePartition, true);
    //On met des mots clés au fichier, qui sera visible dans les propriétés du fichier
    $pdf->SetKeywords($_SESSION['firstName'] . ' ' . $_SESSION['lastName'] . ' ' . $namePartition . ' Maestro', true);
    // On crée l'en-tête du fichier. Il contient le nom donné par l'utilisateur et son nom et son prénom
    $pdf->HeaderPartition($namePartition, $_SESSION['firstName'], $_SESSION['lastName']);
    // On met le nom et le prénom de l'utisateur comme nom de l'auteur du fichier, qui sera visible dans les propriétés du fichier
    $pdf->SetAuthor($_SESSION['firstName'] . ' ' . $_SESSION['lastName']);
    // On met le nom et le prénom de l'utisateur comme nom du créateur du fichier, qui sera visible dans les propriétés du fichier
    $pdf->SetCreator($_SESSION['firstName'] . ' ' . $_SESSION['lastName']);
}
if(!empty($_POST['valueMusicalNotePiano'])) {
    $valuesRecovery = $_POST['valueMusicalNotePiano'];
    $arrayMusicalNotePiano = explode(",", $valuesRecovery);
    
    // On attribut une police au reste du fichier
    $pdf->SetFont('Arial', 'I', 10);
    foreach($arrayMusicalNotePiano as $displayMusicalNote) {
        $yPos = 36;
        $x = 12.125;
        
        switch ($displayMusicalNote) {
            case 'C3':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', chr(149));
                break;
            case 'C3s':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', chr(36), '');
                break;
            case 'D3':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', chr(149), '');
                break;
            case 'D3s':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', chr(36), '', '');
                break;
            case 'E3':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', chr(149), '', '');
                break;
            case 'F3':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', chr(149), '', '', '');
                break;
            case 'F3s':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', chr(36), '', '', '', '');
                break;
            case 'G3':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', chr(149), '', '', '', '');
                break;
            case 'G3s':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', chr(36), '', '', '', '', '');
                break;
            case 'A3':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', chr(149), '', '', '', '', '');
                break;
            case 'A3s':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', '', '', '', '', '', chr(36), '', '', '', '', '', '');
                break;
            case 'B3':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', '', '', '', '', '', chr(149), '', '', '', '', '', '');
                break;
            case 'C4':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', '', '', '', '', chr(149), '', '', '', '', '', '', '');
                break;
            case 'C4s':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', '', '', '', chr(36), '', '', '', '', '', '', '', '');
                break;
            case 'D4':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', '', '', '', chr(149), '', '', '', '', '', '', '', '');
                break;
            case 'D4s':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', '', '', chr(35), '', '', '', '', '', '', '', '', '');
                break;
            case 'E4':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', '', '', chr(149), '', '', '', '', '', '', '', '', '');
                break;
            case 'F4':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', '', chr(35), '', '', '', '', '', '', '', '', '', '');
                break;
            case 'F4s':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', '', chr(149), '', '', '', '', '', '', '', '', '', '');
                break;
            case 'G4':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', '', chr(149), '', '', '', '', '', '', '', '', '', '', '');
                break;
            case 'G4s':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', chr(35), '', '', '', '', '', '', '', '', '', '', '', '');
                break;
            case 'A4':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', '', chr(149), '', '', '', '', '', '', '', '', '', '', '', '');
                break;
            case 'A4s':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', chr(35), '', '', '', '', '', '', '', '', '', '', '', '', '');
                break;
            case 'B4':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', '', chr(149), '', '', '', '', '', '', '', '', '', '', '', '', '');
                break;
            case 'C5':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', '', chr(149), '', '', '', '', '', '', '', '', '', '', '', '', '', '');
                break;
            case 'C5s':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', chr(35), '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
                break;
            case 'D5':
                    $pdf->setColumnPiano($yPos, '', '', '', '', '', chr(149), '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
                break;
            case 'D5s':
                    $pdf->setColumnPiano($yPos, '', '', '', '', chr(35), '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
                break;
            case 'E5':
                    $pdf->setColumnPiano($yPos, '', '', '', '', chr(149), '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
                break;
            case 'F5':
                    $pdf->setColumnPiano($yPos, '', '', '', chr(149), '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
                break;
            case 'F5s':
                    $pdf->setColumnPiano($yPos, '', '', chr(35), '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
                break;
            case 'G5':
                    $pdf->setColumnPiano($yPos, '', '', chr(149), '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
                break;
            case 'G5s':
                    $pdf->setColumnPiano($yPos, '', chr(35), '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
                break;
            case 'A5':
                    $pdf->setColumnPiano($yPos, '', chr(149), '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
                break;
            case 'A5s':
                    $pdf->setColumnPiano($yPos, chr(35), '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
                break;
            case 'B5':
                    $pdf->setColumnPiano($yPos, chr(149), '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
                break;
        }
        
    }
}
//149 -> point, 124 -> barre oblique
    
if (isset($_POST['submitPartitionPiano'])) {
    if (empty($_POST['namePartitionPiano'])) {
        $messagePartitionPiano['noName'] = 'Ta partition n\'as pas de nom';
    } else {
        $pathUser = 'partitions/' . $_SESSION['id'];
        $pathPartition = $pathUser . '/' . $namePartition . '.pdf';
        (!file_exists($pathUser))?mkdir($pathUser, 0777, true):'';
           // On crée le fichier au format .pdf, qui sera redirigé dans le dossier partitions/ et aura comme nom le nom de l'utilisateur avec son nom et son prénom
        $pdf->Output('F', $pathPartition, true);
        // Et qu'il correspond à finished
        if (isset($_POST['statusPiano'])) {
            // et qu'il correspond à finished
            if ($_POST['statusPiano'] == 'Terminée') {
                // 1 correspond à une partition finie
                $id_asfbcvj_statusPartition = 1;
                // et qu'il correspond à unfinished
            } else if ($_POST['statusPiano'] == 'En cours') {
                // 2 correspond à une partition qui n'est pas encore finie
                $id_asfbcvj_statusPartition = 2;
            }
        } else {
            $messagePartitionPiano['noStatus'] = 'Choisis un status.';
        }

        // Si il n'ya aucune erreur
        if (count($messagePartitionPiano) == 0) {
            // On insert le chemin du fichier PDF dans la base de donnée
            $partitionPiano->insertPartition($_SESSION['id'], $pathPartition, $id_asfbcvj_statusPartition, 2, $namePartition);
            $messagePartitionPiano['success'] = 'Ta partition est bien envoyée.';
        }
    }
}
// Envoie les données temporisées et met fin fin à la temporisation des données
ob_end_flush();