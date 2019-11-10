<?php

class User
{
    /* Classes Privées */

    /* ID de l'utilisateur */
    private $userID;

    /* Prénom de l'utilisateur */
    private $userFirstName;

    /* Nom de l'utilisateur */
    private $userLastName;

    /* Nom d'utilisateur de l'utilisateur */
    private $userUsername;

    /* Email de l'utilisateur */
    private $userEmail;

    /* Rôle de l'utilisateur */
    private $userRole;

    /* Rôle de l'utilisateur */
    private $userBirthdate;

    /* TRUE si l'utilisateur est connecté */
    private $authenticated;


    /* Classes Publics (Fonctions) */

    /* Constructeur */
    public function __construct()
    {
        /* Initialisation des variables à NULL */
        $this->userID = NULL;
        $this->userFirstName = NULL;
        $this->userLastName = NULL;
        $this->userUsername = NULL;
        $this->userEmail = NULL;
        $this->userRole = NULL;
        $this->userBirthdate = NULL;
        $this->authenticated = FALSE;
    }

    /* Destructeur */
    public function __destruct()
    {

    }

    /* Fonction d'ajout d'un nouvel utilisateur */
    public function addUser(string $userUsername, string $userFirstName, string $userLastName, string $userEmail, string $userBirthdate, string $userPassword)
    {
        /* Objet PDO Global */ global $pdo;

        /* Retire les espaces */
        $userUsername = trim($userUsername);
        $userFirstName = trim($userFirstName);
        $userLastName = trim($userLastName);
        $userEmail = trim($userEmail);
        $userBirthdate = trim($userBirthdate);
        $userPassword = trim($userPassword);

        /* Check si le nom d'utilisateur est valide */
        if (!$this->isUsernameValid($userUsername)) {
            throw new Exception('Invalid user name');
        }

        /* Check si le mot de passe est valide */
        if (!$this->isPasswordValid($userPassword)) {
            throw new Exception('Invalid password');
        }

        /* Check si le nom d'utilisateur est unique */
        if (!is_null($this->getIdFromUsername($userUsername))) {
            throw new Exception('User name not available');
        }

        /* Check si l'email' est unique */
        if (!is_null($this->getIdFromEmail($userEmail))) {
            throw new Exception('Email not available');
        }

        /* Requête d'insertion en base */
        $query = 'INSERT INTO ppe2_database.users (user_firstname, user_lastname, user_username, user_email, user_birthdate, user_password) VALUES (:firstname, :lastname, :username, :email, :userBirthdate, :password)';

        /* Hash du mot de passe */
        $hash = password_hash($userPassword, PASSWORD_DEFAULT);

        /* Requête préparée */
        $values = array(':firstname' => $userFirstName, ':lastname' => $userLastName, ':username' => $userUsername, ':email' => $userEmail, ':userBirthdate' => $userBirthdate, ':password' => $hash);

        /* Execution de la requête */
        try {
            $res = $pdo->prepare($query);
            $res->execute($values);
        } catch (PDOException $e) {
            /* Récupération des exceptions */
            throw new Exception('Database query error');
        }
    }

    /* Modification d'un utilisateur en fonction de l'ID */
    public function editUser(int $userID, string $userFirstName, string $userLastName, string $userUsername, string $userEmail, string $userPassword, int $userRole, string $userBirthdate, bool $userEnabled)
    {
        /* Objet Global PDO */
        global $pdo;

        /* Retirement des espaces */
        $userUsername = trim($userUsername);
        $userPassword = trim($userPassword);

        /* Check si l'ID est correcte */
        if (!$this->isIdValid($userID))
        {
            throw new Exception('Invalid account ID');
        }

        /* Check si l'username est valide. */
        if (!$this->isUsernameValid($userUsername))
        {
            throw new Exception('Invalid user name');
        }

        /* Check si le mot de passe est valide. */
        if (!$this->isPasswordValid($userPassword))
        {
            throw new Exception('Invalid password');
        }

        /* Check si le nom d'utilisateur est déjà utilisé */
        $idFromName = $this->getIdFromUsername($userUsername);

        if (!is_null($idFromName) && ($idFromName != $userID))
        {
            throw new Exception('User name already used');
        }

        /* Requête de modification */
        $query = 'UPDATE ppe2_database.users SET user_firstname = :firstname, user_lastname = :lastname, user_username = :username, user_email = :email, user_password = :password, user_role = :role, user_birthdate = :birthdate, user_enabled = :enabled WHERE user_id = :id';

        /* Hash du mot de passe */
        $hash = password_hash($userPassword, PASSWORD_DEFAULT);

        /* 1 = utilisateur actif | 0 = utilisateur inactif */
        $intEnabled = $userEnabled ? 1 : 0;

        /* Requête préparée */
        $values = array(':firstname' => $userFirstName, ':lastname' => $userLastName, ':username' => $userUsername, ':email' => $userEmail, ':password' => $hash, ':role' => $userRole, ':birthdate' => $userBirthdate, ':enabled' => $intEnabled, ':id' => $userID);

        /* Exécution de la requête */
        try
        {
            $res = $pdo->prepare($query);
            $res->execute($values);
        }
        catch (PDOException $e)
        {
            /* Récupèration de l'exception et affichage */
            throw new Exception('Database query error');
        }
    }

    /* Supression d'un utilisateur en fonction de l'ID */
    public function deleteUser(int $userID)
    {
        /* Objet Global PDO */
        global $pdo;

        /* Check if the ID is valid */
        if (!$this->isIdValid($userID))
        {
            throw new Exception('Invalid account ID');
        }

        /* Requête de supression */
        $query = 'DELETE FROM ppe2_database.users WHERE user_id = :id';

        /* Requête préparée */
        $values = array(':id' => $userID);

        /* Exécution de la requête */
        try
        {
            $res = $pdo->prepare($query);
            $res->execute($values);
        }
        catch (PDOException $e)
        {
            /* Récupèration de l'exception et affichage */
            throw new Exception('Database query error');
        }

        /* Supression de la session liée à l'utilisateur supprimé ci-dessus */
        $query = 'DELETE FROM ppe2_database.users_sessions WHERE (user_id = :id)';

        /* Requête préparée */
        $values = array(':id' => $userID);

        /* Exécution de la requête */
        try
        {
            $res = $pdo->prepare($query);
            $res->execute($values);
        }
        catch (PDOException $e)
        {
            /* Récupèration de l'exception et affichage */
            throw new Exception('Database query error');
        }
    }

    /* Vérification du nom d'utilisateur */
    public function isUsernameValid(string $userUsername): bool
    {
        /* Initialisation de la variable sur TRUE */
        $valid = TRUE;

        /* Check si le nom d'utilisateur est compris entre 5 et 16 */
        $len = mb_strlen($userUsername);

        if (($len < 5) || ($len > 16)) {
            $valid = FALSE;
        }

        return $valid;
    }

    /* Vérification du mot de passe */
    public function isPasswordValid(string $userPassword): bool
    {
        /* Initialisation de la variable sur TRUE */
        $valid = TRUE;

        /* Check si le mot de passe est compris entre 8 et 50 */
        $len = mb_strlen($userPassword);

        if (($len < 8) || ($len > 50)) {
            $valid = FALSE;
        }

        return $valid;
    }

    /* Retourne l'ID de l'utilisateur depuis son nom d'utilisateur */
    public function getIdFromUsername(string $userUsername): ?int
    {
        /* Objet PDO Global */ global $pdo;

        /* Exception d'invalidité du nom d'utilisateur */
        if (!$this->isUsernameValid($userUsername)) {
            throw new Exception('Invalid user name');
        }

        /* Si aucun accent n'est trouvé, on retourne NULL */
        $userID = NULL;

        /* Requête de recherche d'ID */
        $query = 'SELECT user_id FROM ppe2_database.users WHERE (user_username = :username)';
        $values = array(':username' => $userUsername);

        try {
            $res = $pdo->prepare($query);
            $res->execute($values);
        } catch (PDOException $e) {
            /* Exception de requête invalide (PDO) */
            throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);

        /* Si résultat, on récupère l'ID */
        if (is_array($row)) {
            $userID = intval($row['user_id'], 10);
        }

        return $userID;
    }

    /* Retourne l'ID de l'utilisateur depuis son email */
    public function getIdFromEmail(string $userEmail): ?int
    {
        /* Objet PDO Global */ global $pdo;

        /* Exception d'invalidité de l'email */
        if (!$this->isUsernameValid($userEmail)) {
            throw new Exception('Invalid email');
        }

        /* Si aucun accent n'est trouvé, on retourne NULL */
        $userID = NULL;

        /* Requête de recherche d'ID */
        $query = 'SELECT user_id FROM ppe2_database.users WHERE (user_email = :email)';
        $values = array(':email' => $userEmail);

        try {
            $res = $pdo->prepare($query);
            $res->execute($values);
        } catch (PDOException $e) {
            /* Exception de requête invalide (PDO) */
            throw new Exception('Database query error');
        }

        $row = $res->fetch(PDO::FETCH_ASSOC);

        /* Si résultat, on récupère l'ID */
        if (is_array($row)) {
            $userID = intval($row['user_id'], 10);
        }

        return $userID;
    }

    /* Vérification de l'ID */
    public function isIdValid(int $userID): bool
    {
        /* Initialisation de la variable à TRUE */
        $valid = TRUE;

        /* l'ID doit être compris entre 1 et 1000000 */
        if (($userID < 1) || ($userID > 1000000))
        {
            $valid = FALSE;
        }

        return $valid;
    }

}
