<?php
session_start();
// Rediriger l'utilisateur vers la connexion si il n est pas connecté
if (!isset($_SESSION['auth'])) {
    header('Location: ../../login.php');
}

require('../database.php');

if (isset($_GET['id']) and !empty($_GET['id'])) {


    // Vérifier si l'identifiant entré existe 
    $idOfTheQuestion = $_GET['id'];
    // Séléctionner avec l'id 
    $checkIfQuestionExists = $bdd->prepare('SELECT id_author  FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfTheQuestion));

    // Vérifier si des données ont été récupérées
    if ($checkIfQuestionExists->rowCount() > 0) {
        // Récupérer toutes les données lors de la requete
        $userInfos = $checkIfQuestionExists->fetch();
        // Vérifier si l'utilisateur est l'auteur de la question

        if ($userInfos['id_author'] == $_SESSION['id']) {
            // Supprimer la question qui possède le bon ID
            $deleteThisQuestion = $bdd->prepare('DELETE FROM questions WHERE id = ?');
            $deleteThisQuestion->execute(array($idOfTheQuestion));
            // Redirection après suppression 
            header('Location: ../../myQuestions.php');
        } else {
            echo "Vous n'avez pas le droit de supprimer cette question";
        }
    } else {
        echo "Aucune question n a ete trouvée";
    }
} else {
    echo 'Aucune question n a été trouvée';
}
