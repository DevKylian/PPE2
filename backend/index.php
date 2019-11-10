<?php

session_start();

require './db_inc.php';
require './user_class.php';

$user = new User();

try {
    // Query
} catch (Exception $e) {
    /* Récupération de l'exception, et DIE */
    echo $e->getMessage();
    die();
}