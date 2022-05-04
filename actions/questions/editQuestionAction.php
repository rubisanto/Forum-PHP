<?php
require('actions/database.php');
// Quand le formulaire est envoyé 
if (isset($_POST['validate'])) {
    // Vérifier que les champs ne sont pas vides
    if (!empty($_POST['title']) and !empty($_POST['description']) and !empty($_POST['content'])) {
        $newQuestionTitle = htmlspecialchars($_POST['title']);
        // nl2br pour autoriser les sauts de lignes 
        $newQuestionDescription = nl2br(htmlspecialchars($_POST['description']));
        $newQuestionContent = htmlspecialchars($_POST['content']);

        // Modifier les informations de la question qui possède l'id rentré en paramètre dans l'URL
        $editQuestionOnWebsite = $bdd->prepare('UPDATE questions SET title = ?, description = ?, content = ? WHERE id = ?');
        $editQuestionOnWebsite->execute(array($newQuestionTitle, $newQuestionDescription, $newQuestionContent, $_GET['id']));

        // Rediriger l'utilisateur
        header('Location : myQuestion.php');
    } else {
        $errorMsg = "Veuillez compléter tous les champs";
    }
}
