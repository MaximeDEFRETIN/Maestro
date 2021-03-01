<?php
class user extends dataBase {

    public $id = 0;
    public $lastName = '';
    public $firstName = '';
    public $pseudo = '';
    public $password = '';
    public $mail = '';
    public $pathPartition = '';
    public $pathAvatar = '';
    public $keyUser = 0;
    public $search = '';
    

    public function __construct() {
        parent::__construct();
    }

    /**
     * Permet d'ajouter un utilisateur
     * 
     * @param string $lastName
     * @param string $firstName
     * @param string $mail
     * @param string $pseudo
     * @param string $password
     * @param integer $keyUser
     * @return object
     */
    public function addUser($lastName, $firstName, $mail, $pseudo, $password, $keyUser) {
        // On insère les un nouvel utilisateur
        $requestQuery = $this->db->prepare('INSERT INTO `'.self::prefix.'Users` (`lastName`, `firstName`, `mail`, `pseudo`, `password`, `keyUser`) VALUES (:lastName, :firstName, :mail, :pseudo, :password, :keyUser)');
        //Avec bindValue on associe le paramètre à la valeur à associer et on indique le type de valeur. PDO:: est une constante
        $requestQuery->bindValue(':lastName', $lastName, PDO::PARAM_STR);
        $requestQuery->bindValue(':firstName', $firstName, PDO::PARAM_STR);
        $requestQuery->bindValue(':mail', $mail, PDO::PARAM_STR);
        $requestQuery->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $requestQuery->bindValue(':password', $password, PDO::PARAM_STR);
        $requestQuery->bindValue(':keyUser', $keyUser, PDO::PARAM_INT);
        // On éxécute la requête
        return $requestQuery->execute();
    }

    /*
     * Permet de savoir si un pseudo est déjà pris
     */
    public function checkPseudoUnique() {
        // On compte le nombre de fois que le pseudo a été trouvé
        $query = 'SELECT COUNT(`pseudo`) AS countPseudo FROM `'.self::prefix.'Users` WHERE `pseudo` = :pseudo';
        // On prépare la requête
        $checkPseudoUnique = $this->db->prepare($query);
        // Avec bindValue on associe le paramètre à la valeur à la valeur à associer et on indique le type de valeur. PDO:: est une constante
        $checkPseudoUnique->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        // Si la requête est exécutée
        if ($checkPseudoUnique->execute()) {
            // On envoie le resultat
            $checkPseudoUniqueResult = $checkPseudoUnique->fetch(PDO::FETCH_OBJ);
            return $checkPseudoUniqueResult->countPseudo;
        } else {
            return false;
        }
    }
    
    /*
     * Permet de savoir si une adresse mail est déjà prise
     */
    public function checkMailUnique() {
        // On compte le nombre de fois que le mail a été trouvé
        $query = 'SELECT COUNT(`mail`) AS countMail FROM `'.self::prefix.'Users` WHERE `mail` = :mail';
        // On prépare la requête
        $checkMailUnique = $this->db->prepare($query);
        // Avec bindValue on associe le paramètre à la valeur à la valeur à associer et on indique le type de valeur. PDO:: est une constante
        $checkMailUnique->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        // Si la requête est exécutée
        if ($checkMailUnique->execute()) {
            // On envoie le resultat
            $checkMailUniqueResult = $checkMailUnique->fetch(PDO::FETCH_OBJ);
            return $checkMailUniqueResult->countMail;
        } else {
            return false;
        }
    }
    
    /*
     * Permet de rechercher les partitions terminées
     */
    public function searchPartition($search) {
        // On crée un tableau
        $searchPartitionResult = array();
        // On conditionne la requête
        $searchPartition = $this->db->prepare('SELECT `namePartition`, `'.self::prefix.'Partitions`.`id`, `pathPartition` FROM `'.self::prefix.'Partitions`INNER JOIN `'.self::prefix.'statusPartition` ON `'.self::prefix.'Partitions`.`id_'.self::prefix.'statusPartition` = `'.self::prefix.'statusPartition`.`id` WHERE `'.self::prefix.'Partitions`.`id_'.self::prefix.'statusPartition` = 1 AND `namePartition` LIKE :search');
        // On attribut au paramètre :search la valeur entrée dans la barre de recherche
        $searchPartition->bindValue(':search', '%'.$search.'%', PDO::PARAM_STR);
        // Si la requête est exécutée, on retourne ce qui est sélectionné par la requête
        if ($searchPartition->execute()){
            // On renvoie lse résultats
           return $searchPartitionResult = $searchPartition->fetchAll(PDO::FETCH_OBJ);
        }
    }
    
    /*
     * Permet de récupérer toutes les informations de l'utilisateur.
     */
    public function connection($pseudo) {
        $exists = false;
        // On prépare la requête
        $requestQuery = $this->db->prepare('SELECT `lastName`, `firstName`, `mail`, `password`, `id`, `pseudo`  FROM `'.self::prefix.'Users` WHERE `pseudo` = :pseudo');
        // On attribut le pseudo à la variable initialisé
        $requestQuery->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        // On exécute la requête
        if ($requestQuery->execute()) {
            // Si la requête est un objet, alors toutes les informations qu'elle contient sont stockées dans $queryResult
            if (is_object($requestQuery)) {
                $queryResult = $requestQuery->fetch(PDO::FETCH_OBJ);
                // On attribut le mot de passe récupéré par la requête à la variable initialisé dans le modèle
                $this->password = $queryResult->password;
                $this->id = $queryResult->id;
                $this->firstName = $queryResult->firstName;
                $this->lastName = $queryResult->lastName;
                $this->mail = $queryResult->mail;
                $this->pseudo = $queryResult->pseudo;
                // Si la condition est remplie et le code exécuté alors $exists devient true
                return $exists = true;
            }
        }
    }
    
    /*
     * Permet de récupérer le pseudo et le mot de passe de l'utilisateur pour le connecter
     */
    public function getHashByPseudo($pseudo) {
        $exists = false;
        // On prépare la requête
        $requestHash = $this->db->prepare('SELECT `password` FROM `'.self::prefix.'Users` WHERE `pseudo` = :pseudo');
        // Avec bindValue on associe le paramètre à la valeur à associer et on indique le type de valeur. PDO:: est une constante
        $requestHash->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        // Si la requête est exécutée
        if ($requestHash->execute()) {
            // Et que la requête est un objet
            if (is_object($requestHash)) {
                if($queryHashResult = $requestHash->fetch(PDO::FETCH_OBJ)) {
                    $this->password = $queryHashResult->password;
                    return $exists = true;
                }
            }
        }
    }
        
    /**
     * Permet à un utilisateur de récupérer son mot de passe
     * 
     * @param string $mail
     * @param string $password
     */
    public function replacePassword($mail, $password) {
        // La requête modifie le mot de passe en fonction de l'adresse mail
        // On prépare la requête
        $requestReplacePassword = $this->db->prepare('UPDATE `'.self::prefix.'Users` SET `password` = :password  WHERE `mail` = :mail');
        //Avec bindValue on associe le paramètre à la valeur à associer et on indique le type de valeur.
        //PDO:: est une constante
        $requestReplacePassword->bindValue(':mail', $mail, PDO::PARAM_STR);
        $requestReplacePassword->bindValue(':password', $password, PDO::PARAM_STR);
        // On éxécute la requête
        $requestReplacePassword->execute();
    }
    
    /**
     * Permet de sélectionner l'id de l'utilisateur via son addresse mail lors de la récupération du mot de passe
     * 
     * @param string $mail
     * @return object
     */
    public function getKeyByMail($mail) {
        // On prépare la requête
        $requestGetKey = $this->db->prepare('SELECT `keyUser` FROM `'.self::prefix.'Users` WHERE `mail` = :mail');
        //Avec bindValue on associe le paramètre à la valeur à associer et on indique le type de valeur. PDO:: est une constante
        $requestGetKey->bindValue(':mail', $mail, PDO::PARAM_STR);
        // SI la méthode est exécutée
        if($requestGetKey->execute()) {
            // On récupère la clé de l'utilisateur
            return $key = $requestGetKey->fetch(PDO::FETCH_OBJ);
        }
    }
    
    /**
     * Permet de vérifier l'adresse mail de l'utilisateur lors de la récupération du mot de passe
     * 
     * @param integer $keyUser
     * @return integer
     */
    public function verifyMailByKey($keyUser) {
        // On sélectionne l'adresse mail en fonction de la clé de l'utilisateur
        $queryKey = 'SELECT `mail` FROM `'.self::prefix.'Users` WHERE `keyUser` = :keyUser';
        // On prépare la requête
        $requestMail = $this->db->prepare($queryKey);
        // Avec bindValue on associe le paramètre à la valeur à associer et on indique le type de valeur. PDO:: est une constante
        $requestMail->bindValue(':keyUser', $keyUser, PDO::PARAM_STR);
        // On éxécute la requête
        if ($requestMail->execute()) {
            return $mailByKey = $requestMail->fetch(PDO::FETCH_OBJ);
        }
    }

    /*
     * Permet à l'utilsiateur de modifier ses informations
     */
    public function updateProfile($id, $lastName, $firstName, $pseudo, $mail) {
        // On prépare la requête
        $requestUpdateProfil = $this->db->prepare('UPDATE `'.self::prefix.'Users` SET `lastName` = :lastName, `firstName` = :firstName, `pseudo` = :pseudo, `mail` = :mail WHERE `id` = :id');
        //Avec bindValue on associe le paramètre à la valeur à associer et on indique le type de valeur. PDO:: est une constante
        $requestUpdateProfil->bindValue(':id', $id, PDO::PARAM_INT);
        $requestUpdateProfil->bindValue(':lastName', $lastName, PDO::PARAM_STR);
        $requestUpdateProfil->bindValue(':firstName', $firstName, PDO::PARAM_STR);
        $requestUpdateProfil->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $requestUpdateProfil->bindValue(':mail', $mail, PDO::PARAM_STR);
        // On éxécute la requête
        return $requestUpdateProfil->execute();
    }
    
    /*
     * Permet à l'utilisateru de modifier son mot de passe
     */
    public function updatePassword($id, $password) {
        // On modifie le mot de passe d'un utilisateur en fonction de son id
        $queryUpdatePassword = 'UPDATE `'.self::prefix.'Users` SET `password` = :password  WHERE `id` = :id';
        // On prépare la requête
        $requestUpdatePassword = $this->db->prepare($queryUpdatePassword);
        // Avec bindValue on associe le paramètre à la valeur à associer et on indique le type de valeur. PDO:: est une constante
        $requestUpdatePassword->bindValue(':password', $password, PDO::PARAM_STR);
        $requestUpdatePassword->bindValue(':id', $id, PDO::PARAM_INT);
        // On éxécute la requête
        return $requestUpdatePassword->execute();
    }

    /*
     * Permet à un utilisateur de supprimer son profil
     */
    public function deleteProfilById($id) {
        $requestDeleteProfil = $this->db->prepare('DELETE FROM `'.self::prefix.'Users` WHERE `id` = :id');
        $requestDeleteProfil->bindValue(':id', $id, PDO::PARAM_INT);
        // On exécute la requête
        return $requestDeleteProfil->execute();
    }
    
    public function __destruct() {
        parent::__destruct();
    }
}