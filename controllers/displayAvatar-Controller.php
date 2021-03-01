<?php
$avatarProfile = new avatar();
    
if (isset($_SESSION['id'])) {
    $avatarDisplayed = $avatarProfile->getAvatarById($_SESSION['id']);
}