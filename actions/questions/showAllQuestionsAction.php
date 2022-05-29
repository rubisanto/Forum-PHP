<?php
require('actions/database.php');

// afficher les questions par défaut sans la recherche

// récupérer toutes les données par ordre de dernier post 
$getAllQuestions = $bdd->query('SELECT id, id_author, title, description, pseudo_author, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');

// vérifier qu'aucune recherche n a été lancée
if (isset($_GET['search']) and !empty($_GET['search'])) {

    $userSearch = $_GET['search'];

    // sélection les titres qui ressemblent à la recherche
    $getAllQuestions = $bdd->query('SELECT id, id_author, title, description, pseudo_author, date_publication FROM questions WHERE title LIKE "%' . $userSearch . '%" ORDER BY id DESC');
}
