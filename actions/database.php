<?php
try {
    // Inclure dès le départ le session start 
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', 'root', 'root');
} catch (Exception $e) {
    die('Une erreur a été trouvée : ' . $e->getMessage());
}
