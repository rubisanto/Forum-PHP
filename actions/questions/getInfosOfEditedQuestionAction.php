<?php
require('actions/database.php');


// Vérifier si l'id de la question est bien passé en paramètre dans l'url
if (isset($GET['id']) && !empty($GET['id'])) {

    $idOfQuestion = $_GET['id'];
    // Vérifier si la question existe
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

    if ($checkIfQuestionExists->rowCount() > 0) {
        // récupérer l'ensemble des infos en tableau avec fetch
        $questionInfos = $checkIfQuestionExists->fetch();
        if ($questionInfos['id_author'] == $_SESSION['id']) {
            //code...
            $questionTitle = $questionInfos['title'];
            $qestionDescription = $questionInfos['description'];
            $questionContent = $questionInfos['content'];


            // enlever les caractères "<br> dans le rendu avec str_replace
            $questionDescription = str_replace('<br />', '', $questionDescription);
            $questionContent = str_replace('<br />', '', $questionContent);
        } else {
            $errorMsg = "Vous n'êtes pas l'auteur de cette question";
        }
    } else {
        $errorMsg = "Aucune question n'a été trouvée";
    }
} else {
    $errorMsg = "Aucune question n'a été trouvée.";
}
