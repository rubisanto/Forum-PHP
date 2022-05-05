<?php
require('actions/users/securityAction.php');
require('actions/database.php');

// Quand le bouton valider est appuyé
if (isset($_POST['validate'])) {
    // Vérifier que tous les champs sont remplis 
    if (!empty($_POST['title']) and !empty($_POST['description']) and !empty($_POST['content'])) {
        $questionTitle = htmlspecialchars($_POST['title']);
        // NL2BR permet de convertir les sauts de ligne dans la case en balise br
        $questionDescription = nl2br(htmlspecialchars($_POST['description']));
        $questionContent = nl2br(htmlspecialchars($_POST['content']));
        // Récupérer la date
        $questionDate = date('d/m/Y');
        // Récupérer identifiant auteur
        $questionIdAuthor = $_SESSION['id'];
        $questionPseudoAuthor = $_SESSION['pseudo'];
        // Insérer les post dans la BDD
        $insertQuestionsOnWebsite = $bdd->prepare('INSERT INTO questions(title, description, content, id_author, pseudo_author, date_publication) VALUES (?,?,?,?,?,?)');
        $insertQuestionsOnWebsite->execute(array($questionTitle, $questionDescription, $questionContent, $questionIdAuthor, $questionPseudoAuthor, $questionDate));

        //Variable de succès du post dans la BDD
        $successMsg = "Votre question a bien été publiée sur le site";
    } else {
        $errorMsg = 'Veuillez compléter tous les champs';
    }
}
