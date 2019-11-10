<?php

/* Nom d'Hôte */
$host = 'localhost';

/* Nom d'utilisateur, par défaut souvent root */
$user = 'root';

/* Mot de passe, avec Xamp laisser vide */
$passwd = '';

/* Nom de la base de données */
$schema = 'ppe2_database';

/* Objet PDO Null */
$pdo = NULL;

/* Chaine de caractère de la connexion */
$dsn = 'mysql:host=' . $host . ';dbname=' . $schema;

/* TRY/Catch */
try
{
    /* Création de l'objet PDO */
    $pdo = new PDO($dsn, $user,  $passwd);

    /* Récupération des exceptions */
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
    /* Si on récupère une exception */
    echo 'Erreur lors de la connexion vers la base de données.';
    die();
}